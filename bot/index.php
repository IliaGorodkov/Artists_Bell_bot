<?php

//$result = file_get_contents('https://api.telegram.org/bot2009982557:AAGwlzdC8DbZ9c3lRu0kFDwjbkoPn-gUz9s/getMe');

define('TOKEN', getenv('token'));
//define('API','https://api.telegram.org/bot'.TOKEN.'/');

$query = curl_init('https://api.telegram.org/bot'.TOKEN.'/');
var_dump($query.'/-/');
curl_setopt($query, CURLOPT_RETURNTRANSFER, true);
curl_setopt($query, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($query, CURLOPT_HEADER, false);
$resultCURL = curl_exec($query);
print_r('/-/'.$resultCURL);
curl_close($query);
print_r('/-/'.$resultCURL);


//print_r(API);
$data = json_decode(file_get_contents('php://input'));

$result = file_get_contents($resultCURL.'sendMessage?'.http_build_query([
        'chat_id' => $data->message->chat->id,
        'text' => $data->message->text
    ]));
print_r($result);
?>