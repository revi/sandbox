<?php
// Copyright (C) 2026 Hong Yongmin <https://revi.xyz/>
// SPDX-License-Identifier: Apache-2.0

/**
 * Loads the custom font stylesheet on every chrome-bearing page.
 *
 * Phorge has no hook for "add a stylesheet to every page", but the main menu
 * is built inside `PhabricatorStandardPageView::willRenderPage()`, which runs
 * before `getHead()` collects Celerity resources. Requiring the resource here
 * therefore puts our `<link>` in `<head>`, after the core stylesheets.
 *
 * We contribute no menu items; `buildMainMenus()` is only used as a hook.
 */
final class PhorgeFontsMainMenuBarExtension
  extends PhabricatorMainMenuBarExtension {

  const MAINMENUBARKEY = 'phorgefonts';

  const RESOURCE_SOURCE = 'phorgefonts';
  const RESOURCE_SYMBOL = 'phorge-fonts-css';

  public function getExtensionOrder() {
    // Run before the extensions that actually draw menu items.
    return 100;
  }

  public function shouldRequireFullSession() {
    // Logged-out visitors and users who have not finished MFA should see the
    // same fonts as everyone else.
    return false;
  }

  public function isExtensionEnabledForViewer(PhabricatorUser $viewer) {
    return true;
  }

  public function buildMainMenus() {
    if ($this->isStylesheetAvailable()) {
      require_celerity_resource(self::RESOURCE_SYMBOL, self::RESOURCE_SOURCE);
    }

    return array();
  }

  /**
   * Check that the Celerity map has been built before requiring the resource.
   *
   * `require_celerity_resource()` throws on an unknown symbol, which would
   * take down every page. The map is empty until `bin/celerity map` has been
   * run, so an install that has not completed that step should just render
   * with the default fonts instead.
   */
  private function isStylesheetAvailable() {
    try {
      $map = CelerityResourceMap::getNamedInstance(self::RESOURCE_SOURCE);
    } catch (Exception $ex) {
      return false;
    }

    return ($map->getResourceNameForSymbol(self::RESOURCE_SYMBOL) !== null);
  }

}
