<?php

abstract class PhabricatorRobotsController extends PhabricatorController {

  public function shouldRequireLogin() {
    return false;
  }

  public function processRequest() {
    $out = array();

    $out[] = '# Forked from phabricator.wikimedia.org, we.phorge.it';
    // Version timestamp is when I started editing them.
    $out[] = '# version: 20240417T011800+0900';
    $out[] = '# also at https://github.com/revi/sandbox.git';
    $out[] = 'User-Agent: *';
    $out[] = 'Disallow: /diffusion/';
    $out[] = 'Disallow: /source/';
    $out[] = 'Disallow: /multimeter/';
    $out[] = 'Disallow: /file/';
    $out[] = 'Disallow: /policy/explain';
    $out[] = 'Disallow: /auth';
    $out[] = 'Disallow: /login';
    $out[] = 'Disallow: /maniphest/transaction';
    $out[] = 'Disallow: /tag';
    $out[] = 'Disallow: /search/query/all';
    $out[] = 'Disallow: /conduit';
    $out[] = 'Disallow: /api';
    $out[] = 'Disallow: /project';
    $out[] = 'Disallow: /applications';
    $out[] = 'Disallow: /token';
    $out[] = 'Disallow: /pholio';
    $out[] = 'Disallow: /dashboard';
    $out[] = 'Disallow: /calendar';
    $out[] = 'Disallow: /herald';
    // This is commits.
    $out[] = 'Disallow: /r*';
    // This is pastes (P$)
    $out[] = 'Disallow: /P*%24*';
    $out[] = 'Disallow: /phame';
    // This is blog entries (J$)
    $out[] = 'Disallow: /J*%24*';
    // This is user list.
    // As of 2024-04-17 user list is behind auth but who knows it might change?
    $out[] = 'Disallow: /people';
    // This is user profile link.
    $out[] = 'Disallow: /p/';
    // Phorge specific entries end here.
    $out[] = '# This is cloudflare endpoint';
    $out[] = '# Ref: https://developers.cloudflare.com/fundamentals/reference/cdn-cgi-endpoint/';
    $out[] = 'Disallow: /cdn-cgi/';
    $out[] = '# Google Ads are not welcome';
    $out[] = 'User-agent: Mediapartners-Google';
    $out[] = 'Disallow: /';
    $out[] = 'User-agent: AdsBot-Google';
    $out[] = 'Disallow: /';
    $out[] = 'User-agent: AdsBot-Google-Mobile';
    $out[] = 'Disallow: /';
    $out[] = '# ChatGPT Crawlers are not welcome';
    $out[] = '# Ref: https://platform.openai.com/docs/plugins/bot';
    $out[] = 'User-agent: ChatGPT-User';
    $out[] = 'Disallow: /';
    $out[] = 'User-agent: GPTBot';
    $out[] = 'Disallow: /';
    $out[] = '# Google Gemini AI Crawlers are also not welcome';
    $out[] = '# Ref: https://developers.google.com/search/docs/crawling-indexing/overview-google-crawlers?hl=en#google-extended';
    $out[] = 'User-agent: Google-Extended';
    $out[] = 'Disallow: /';
    // Crawl-delay entries at the bottom
    // Ref: https://github.com/otwcode/otwarchive/pull/4411#discussion_r1044351129
    $out[] = 'User-agent: *';
    $out[] = 'Crawl-delay: 1';

    $content = implode("\n", $out)."\n";

    return id(new AphrontPlainTextResponse())
      ->setContent($content)
      ->setCacheDurationInSeconds(phutil_units('2 hours in seconds'))
      ->setCanCDN(true);
  }
}