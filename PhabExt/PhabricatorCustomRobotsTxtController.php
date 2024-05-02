<?php

abstract class PhabricatorRobotsPlatformController extends PhabricatorRobotsController {

	public function shouldRequireLogin() {
		return false;
  }

	public function setClientIDCookie() {
		return false;
  }

  public function processRequest() {
	$out = array();

	$out[] = '# Adapted from phabricator.wikimedia.org, we.phorge.it';
    // Version timestamp is when I started editing them.
    // Edit setLastModified at the bottom as well.
    // Calculate EpochTime via go/ZoneStamp
	$out[] = '# version: 20240502T184200+0900';
	$out[] = '# also at https://github.com/revi/sandbox.git';
	$out[] = 'User-Agent: *';
	$out[] = 'Disallow: /diffusion/';
	$out[] = 'Disallow: /source/';
	$out[] = 'Disallow: /multimeter/';
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
	// This is differential reviews
	$out[] = 'Disallow: /differential';
	$out[] = 'Disallow: /D*%24*';
	// This is Files. (F$)
	$out[] = 'Disallow: /file';
	$out[] = 'Disallow: /F*%24*';
	// This is pastes (P$)
	$out[] = 'Disallow: /paste';
	$out[] = 'Disallow: /P*%24*';
	// This is blog entries (J$)
	$out[] = 'Disallow: /phame';
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
	// While I sometimes (borderline 'rare') use LLMs (GPT, Gemini, …), I'd rather prefer LLMs not use my stuff to profit
	// Well I think my stuff is mostly out of interest for them, tho…
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
	$out[] = '# CCBot (ab)used to train LLMs';
	$out[] = '# Ref: https://darkvisitors.com/agents/ccbot';
	$out[] = 'User-agent: CCBot';
	$out[] = 'Disallow: /';
	$out[] = '# Facebook LLM Bot';
	$out[] = '# Ref: https://developers.facebook.com/docs/sharing/bot/';
	$out[] = 'User-agent: FacebookBot';
	$out[] = 'Disallow: /';
	$out[] = '# DiffBot, though this one is known to have option to ignore robotstxt';
	$out[] = '# Ref https://docs.diffbot.com/docs/why-is-my-crawl-not-crawling-and-other-uncommon-crawl-problems';
	$out[] = 'User-agent: Diffbot';
	$out[] = 'Disallow: /';
	$out[] = '# Bytespider';
	$out[] = '# Ref: https://darkvisitors.com/agents/bytespider';
	$out[] = 'User-agent: Bytespider';
	$out[] = 'Disallow: /';
	// Crawl-delay entries at the bottom
	// Ref: https://github.com/otwcode/otwarchive/pull/4411#discussion_r1044351129
	$out[] = 'User-agent: *';
	$out[] = 'Crawl-delay: 1';

	$content = implode("\n", $out)."\n";

	// ToDo: Cloudflare does not cache the robots.txt due to the presence of Set-Cookie.
	// T126
	return id(new AphrontPlainTextResponse())
		->setContent($content)
		->setCacheDurationInSeconds(phutil_units('2 hours in seconds'))
		->setCanCDN(true)
		->setLastModified(1714642920);
	}
}
