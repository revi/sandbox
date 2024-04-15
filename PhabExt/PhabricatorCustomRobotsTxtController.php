<?php

final class PhabricatorRobotsController extends PhabricatorController {

  public function shouldRequireLogin() {
    return false;
  }

  public function processRequest() {
    $out = array();

    $out[] = 'User-Agent: *';
    $out[] = 'Disallow: /herald/';
    $out[] = 'Disallow: /passphrase/';
    $out[] = 'Disallow: /conduit/';
    $out[] = 'Disallow: /dashboard/';
    $out[] = 'Crawl-delay: 1';

    $content = implode("\n", $out)."\n";

    return id(new AphrontPlainTextResponse())
      ->setContent($content)
      ->setCacheDurationInSeconds(phutil_units('2 hours in seconds'))
      ->setCanCDN(true);
  }
}