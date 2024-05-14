<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#">
<head>
<title>
Hey revi, what time is it for you?
</title>
<link rel="icon" href="https://r2.revicdn.net/pfp2.png">
<meta property="og:title" content="Hey revi, what time is it for you?" />
<meta property="og:description" content="A simple page that shows current date and time for revi." />
<meta property="og:image" content="https://r2.revicdn.net/pfp2.png" />
<meta property="og:url" content="https://k.revi.xyz/time.php" />
<style>
@import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Mono&family=IBM+Plex+Sans+KR:wght@300;400&family=Noto+Sans+KR&display=swap');

body {
	margin: 40px auto;
	max-width: 650px;
	line-height: 1.6;
	font-size: 16px;
	padding: 0 10px;
	overflow-wrap: break-all;
	word-break: keep-all;
	font-family:
		'IBM Plex Sans KR',
		'Noto Sans KR',
		-apple-system,
		BlinkMacSystemFont,
		'Segoe UI',
		Helvetica,
		Arial,
		sans-serif,
		'Apple Color Emoji',
		'Segoe UI Emoji';
}
.code {
	font-family:
		'IBM Plex Mono',
		'Courier New',
		monospace;
}
</style>
</head>
<body>
<?php

// Set Cache-control to no-cache, permissions-policy, and provenlol header
header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
header('Permissions-Policy: interest-cohort=(),browsing-topics=()');
header('X-Proven: proven.lol/9d2ca2');

// Create a DateTime object with Asia/Seoul timezone
$dateTimeSeoul = new DateTime('now', new DateTimeZone('Asia/Seoul'));

// Format date and time in ISO 8601 format
$date = $dateTimeSeoul->format('Y-m-d');
$time = $dateTimeSeoul->format('H:i:s');

// Create the Zonestamp link with current epoch time
$currentEpoch = time();
$zonestampLink = "https://zonestamp.toolforge.org/{$currentEpoch}";

// Display the message with formatted date, time, and Zonestamp link
echo "<p>It is {$date} {$time} in <code>Asia/Seoul</code>, where <a rel='me' href='https://revi.xyz'>revi</a> lives.<br />Check in your timezone: <a href='{$zonestampLink}'>ZoneStamp</a>.</p>";

?>
<hr>
<p><a href='https://github.com/revi/sandbox/blob/master/time.php'>Source code @ GitHub</a>. (Warning: it is far from 'clean'.) Also, please note that there is <a href='https://xkcd.com/1179/'>only one correct way to write dates</a>.</p>
<p>Also another small note: the clock here uses 24 hours notation.</p>
</body>
</html>
