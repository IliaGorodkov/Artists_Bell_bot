<?php

define('TOKEN', getenv('token'));
define('API','https://api.telegram.org/bot'.TOKEN.'/');


    $data = json_decode(file_get_contents('php://input'));

    $result = file_get_contents(API.'sendMessage?'.http_build_query([
            'chat_id' => $data->message->chat->id,
            'text' => $data->message->text
    ]));

    if($result['text'] == 'Привет'){
        return 'и тебе Привет';
    }


?>