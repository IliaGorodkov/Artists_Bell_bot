<?php

define('TOKEN', getenv('token'));
define('API','https://api.telegram.org/bot'.TOKEN.'/');


$result = file_get_contents(API.'getUpdates?');
print_r($result);

/*
    $result = file_get_contents(API.'sendMessage?'.http_build_query([
            'chat_id' => $data->message->chat->id,
            'text' => $data->message->text
    ]));
*/

?>