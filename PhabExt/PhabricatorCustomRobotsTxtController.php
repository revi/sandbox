<?php

abstract class PhabricatorRobotsController extends PhabricatorController {

  public function shouldRequireLogin() {
    return false;
  }

  public function processRequest() {
    $out = array();

    $out[] = '# Forked from phabricator.wikimedia.org, we.phorge.it';
    $out[] = '# version: 20240416T211100+0900';
    $out[] = '# also at https://github.com/revi/sandbox.git';
    $out[] = 'User-Agent: *';
    $out[] = 'Disallow: /diffusion/';
    $out[] = 'Disallow: /source/';
    $out[] = 'Disallow: /multimeter/';
    $out[] = 'Disallow: /file/';
    $out[] = 'Disallow: /project/ sprint';
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
    $out[] = 'Disallow: /r*';
    $out[] = 'Disallow: /P*%24*';
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
    $out[] = 'User-agent: *';
    $out[] = 'Crawl-delay: 1';

    $content = implode("\n", $out)."\n";

    return id(new AphrontPlainTextResponse())
      ->setContent($content)
      ->setCacheDurationInSeconds(phutil_units('2 hours in seconds'))
      ->setCanCDN(true);
  }
}