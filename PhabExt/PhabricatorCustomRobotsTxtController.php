<?php
// Copyright (C) 2024 Hong Yongmin <https://revi.xyz/>
// SPDX-License-Identifier: Apache-2.0

abstract class PhabricatorRobotsController extends PhabricatorController {

	public function shouldRequireLogin() {
		return false;
	}

	// TODO: Different content for cdn domains

	public function processRequest() {
		$out = array();

		$out[] = '# Adapted from phabricator.wikimedia.org, we.phorge.it';
		// Version timestamp is when I started editing them.
		// Edit setLastModified at the bottom as well.
		// Calculate EpochTime via go/epoch
		$out[] = '# version: 20240703T230700+0900';
		$out[] = '# also at https://github.com/revi/sandbox.git';
		$out[] = 'User-Agent: *';
		$out[] = 'Disallow: /diffusion/';
		$out[] = 'Disallow: /diffusion';
		$out[] = 'Disallow: /source/';
		$out[] = 'Disallow: /source';
		$out[] = 'Disallow: /multimeter/';
		$out[] = 'Disallow: /multimeter';
		$out[] = 'Disallow: /policy/explain';
		$out[] = 'Disallow: /auth/';
		$out[] = 'Disallow: /auth';
		$out[] = 'Disallow: /login/';
		$out[] = 'Disallow: /login';
		$out[] = 'Disallow: /maniphest/transaction/';
		$out[] = 'Disallow: /maniphest/transaction';
		$out[] = 'Disallow: /tag/';
		$out[] = 'Disallow: /tag';
		$out[] = 'Disallow: /search/';
		$out[] = 'Disallow: /search';
		$out[] = 'Disallow: /conduit/';
		$out[] = 'Disallow: /conduit';
		$out[] = 'Disallow: /api/';
		$out[] = 'Disallow: /api';
		$out[] = 'Disallow: /project/';
		$out[] = 'Disallow: /project';
		$out[] = 'Disallow: /applications/';
		$out[] = 'Disallow: /applications';
		$out[] = 'Disallow: /token/';
		$out[] = 'Disallow: /token';
		$out[] = 'Disallow: /pholio/';
		$out[] = 'Disallow: /pholio';
		$out[] = 'Disallow: /dashboard/';
		$out[] = 'Disallow: /dashboard';
		$out[] = 'Disallow: /calendar';
		$out[] = 'Disallow: /herald/';
		$out[] = 'Disallow: /herald';
		// This is commits.
		$out[] = 'Disallow: /r*';
		// This is differential revisions. (D*)
		$out[] = 'Disallow: /differential/';
		$out[] = 'Disallow: /differential';
		$out[] = 'Disallow: /D*';
		// This is Files. (F*)
		$out[] = 'Disallow: /file/';
		$out[] = 'Disallow: /file';
		$out[] = 'Disallow: /F*';
		// This is pastes (P*)
		$out[] = 'Disallow: /paste/';
		$out[] = 'Disallow: /paste';
		$out[] = 'Disallow: /P*';
		// This is blog entries (J$)
		$out[] = 'Disallow: /phame/';
		$out[] = 'Disallow: /phame';
		$out[] = 'Disallow: /J*';
		// This is user list.
		// As of 2024-04-17 user list is behind auth but who knows it might change?
		$out[] = 'Disallow: /people/';
		$out[] = 'Disallow: /people';
		// This is user profile link.
		$out[] = 'Disallow: /p/';
		// Phorge specific entries end here.
		$out[] = '# This is cloudflare endpoint';
		$out[] = '# Ref: https://issuetracker.revi.xyz/u/cloudflarecdncgi';
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
		$out[] = '# Ref: https://issuetracker.revi.xyz/u/googleextended';
		$out[] = 'User-agent: Google-Extended';
		$out[] = 'Disallow: /';
		$out[] = '# Apple AI stuff';
		$out[] = '# Ref: https://support.apple.com/en-us/119829#datausage';
		$out[] = 'User-agent: Applebot-Extended';
		$out[] = 'Disallow: /';
		$out[] = '# CCBot (ab)used to train LLMs';
		$out[] = '# Ref: https://darkvisitors.com/agents/ccbot';
		$out[] = 'User-agent: CCBot';
		$out[] = 'Disallow: /';
		$out[] = '# Facebook LLM Bot';
		$out[] = '# Ref: https://developers.facebook.com/docs/sharing/bot/';
		$out[] = 'User-agent: FacebookBot';
		$out[] = 'Disallow: /';
		$out[] =
			'# DiffBot, though this one is known to have option to ignore robotstxt';
		$out[] = '# Ref https://issuetracker.revi.xyz/u/robotstxtdiffbot';
		$out[] = 'User-agent: Diffbot';
		$out[] = 'Disallow: /';
		$out[] = '# Bytespider';
		$out[] = '# Ref: https://darkvisitors.com/agents/bytespider';
		$out[] = 'User-agent: Bytespider';
		$out[] = 'Disallow: /';
		$out[] = '# See https://revi.xyz/robots.txt for rationales';
		$out[] = 'User-agent: TurnitinBot';
		$out[] = 'Disallow: /';
		$out[] = 'User-agent: NPBot';
		$out[] = 'Disallow: /';
		$out[] = 'User-agent: SlySearch';
		$out[] = 'Disallow: /';
		$out[] = 'User-agent: BLEXBot';
		$out[] = 'Disallow: /';
		$out[] = '# Block CheckMarkNetwork';
		$out[] =
			'User-agent: CheckMarkNetwork/1.0 (+https://www.checkmarknetwork.com/spider.html)';
		$out[] = 'Disallow: /';
		$out[] = 'User-agent: BrandVerity/1.0';
		$out[] = 'Disallow: /';
		$out[] = '# Block peer39';
		$out[] = 'User-agent: peer39_crawler';
		$out[] = 'User-agent: peer39_crawler/1.0';
		$out[] = 'Disallow: /';
		$out[] = '# Block PetalBot, misbehaving';
		$out[] = 'User-agent: PetalBot';
		$out[] = 'Disallow: /';
		$out[] = '# Block DotBot';
		$out[] = 'User-agent: DotBot';
		$out[] = 'Disallow: /';
		$out[] = '# Block MegaIndex';
		$out[] = 'User-agent: MegaIndex';
		$out[] = 'Disallow: /';
		$out[] = '# Block SerpstatBot';
		$out[] = 'User-agent: serpstatbot';
		$out[] = 'Disallow: /';
		$out[] = '# Block SeekportBot';
		$out[] = 'User-agent: SeekportBot';
		$out[] = 'Disallow: /';
		$out[] = '# Block SemRushBot';
		$out[] = 'User-agent: SemrushBot';
		$out[] = 'Disallow: /';
		$out[] = '# Block AhrefsBot';
		$out[] = 'User-agent: AhrefsBot';
		$out[] = 'Disallow: /';
		// Crawl-delay entries at the bottom
		// Ref: https://github.com/otwcode/otwarchive/pull/4411#discussion_r1044351129
		$out[] = '# Throttle MJ12bot';
		$out[] = 'User-agent: MJ12bot';
		$out[] = 'Crawl-delay: 10';
		$out[] = '# Throttle YandexBot';
		$out[] = 'User-agent: YandexBot';
		$out[] = 'Crawl-delay: 5';
		$out[] = '# Throttle BingBot';
		$out[] = 'User-agent: bingbot';
		$out[] = 'Crawl-delay: 5';
		$out[] = '# Throttle all other bots';
		$out[] = 'User-agent: *';
		$out[] = 'Crawl-delay: 5';

		$content = implode("\n", $out)."\n";

		return id(new AphrontPlainTextResponse())
			->setContent($content)
			->setCacheDurationInSeconds(phutil_units('2 hours in seconds'))
			// ->setClientIDCookie(false) (Doesn't work /shrug)
			->setCanCDN(true)
			->setLastModified(1720015620);
	}
}
