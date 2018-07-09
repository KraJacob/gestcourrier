<?php
function sendsms($number, $message_body, $return = '0') {

$sender = 'SEDEMO'; // Can be customized

$smsGatewayUrl = 'http://springedge.com';

$apikey = '62q3xxxxxxxxxxxxxxxxxxxxxx'; // Need to change

$textmessage = urlencode($textmessage);

$api_element = '/api/web/send/';

$api_params = $api_element.'?apikey='.$apikey.'&sender='.$sender.'&to='.$number.'&message='.$textmessage;
$smsgatewaydata = $smsGatewayUrl.$api_params;

$url = $smsgatewaydata;

$ch = curl_init();

curl_setopt($ch, CURLOPT_POST, false);

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); $output = curl_exec($ch);

curl_close($ch);

if(!$output){ $output = file_get_contents($smsgatewaydata); }

if($return == '1'){ return $output; }else{ echo "Sent"; }

}