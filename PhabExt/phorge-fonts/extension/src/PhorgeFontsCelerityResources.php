<?php
// Copyright (C) 2026 Hong Yongmin <https://revi.xyz/>
// SPDX-License-Identifier: Apache-2.0

/**
 * Registers this extension's `webroot/` as a Celerity resource source.
 *
 * `PhutilBootloader` scans `phorge/src/extensions/` recursively and registers
 * every class it finds under its parent in the class tree, so this is picked
 * up by `CelerityPhysicalResources::getAll()` with no library to load and no
 * `__phutil_library_map__.php` to maintain. `bin/celerity map` therefore
 * rebuilds our map alongside Phorge's own, and `/res/phorgefonts/...` requests
 * are routed here by the stock `CelerityPhabricatorResourceController`.
 *
 * Paths are resolved from `__DIR__` rather than `phutil_get_library_root()`,
 * because code in the extensions directory belongs to the `phorge` library and
 * has no library root of its own.
 */
final class PhorgeFontsCelerityResources extends CelerityResourcesOnDisk {

  public function getName() {
    // Celerity requires this to be lowercase latin letters and digits only.
    // It also becomes the library segment of resource URIs.
    return 'phorgefonts';
  }

  public function getPathToResources() {
    return $this->getExtensionRoot().'/webroot';
  }

  public function getPathToMap() {
    return $this->getExtensionRoot().'/resources/celerity/map.php';
  }

  private function getExtensionRoot() {
    return dirname(__DIR__);
  }

}
