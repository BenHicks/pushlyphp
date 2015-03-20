<?php
namespace Pushly;

function push($link, $message = '') {
	if (!preg_match('#https?://pushly.de/#', $link))
		throw new \Exception('Invalid pushly link');
	
	$options = [
		'http' => [
			'header' => "Content-Type: application/json\r\nAccept: application/json\r\n",
			'method' => 'POST',
			'content' => json_encode([
				'message' => $message,
			]),
		],
	];
	
	$context = stream_context_create($options);
	$result = file_get_contents($link, false, $context);
	$json = json_decode($result, true);
	
	if ($json === null) return false;
	return isset($json['success']) ? $json['success'] : false;
}
