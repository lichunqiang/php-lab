<?php

require __DIR__ . '/vendors/autoload.php';

$client = new GuzzleHttp\Client();

$account_info = array(
	'account' => 'light-li@hotmail.com',
	'password' => '&UJM8ik,'
);



$response = $client->get('http://www.ucai.cn');

//获取sessionid

$session_id = $response->getHeader('Set-Cookie', true)[0];
$session_id = strstr($session_id, ' ', true);

echo $session_id;

$response = $client->post('http://www.ucai.cn/index.php?app=home&mod=Public&act=doAjaxLogin',
						[
							'headers' => ['Cookie' => $session_id]
						]);

var_dump($response->getHeaders());
$cookie = $response->getHeader('Set-Cookie', true)[0];
$cookie = strstr($cookie, ' ', true);
echo $cookie;

//签到
$response = $client->post('http://www.ucai.cn/index.php?app=home&mod=Widget&act=addonsRequest&addon=V63qiandao&hook=qddo', [
		'headers' => ['Cookie' => $session_id . $cookie]
	]);

$body = $response->getBody();
echo $body;


exit;