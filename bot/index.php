<?php

define('TOKEN', getenv('token'));
define('API','https://api.telegram.org/bot'.TOKEN.'/');

function answerBot(){
    $data = json_decode(file_get_contents('php://input'));

    $Text = $data->message->text;

    if($Text == 'Привет'){
      /*  $result = file_get_contents(API.'sendMessage?'.http_build_query([
            'chat_id' => $data->message->chat->id,
            'text' => 'и тебе Привет'
        ]));*/
        $result = file_get_contents(API.'getMe?'.http_build_query([
            'chat_id' => $data->message->chat->id,
        ]));
        print_r($result);
    }elseif($Text != 'Привет'){
        $result = file_get_contents(API.'sendMessage?'.http_build_query([
            'chat_id' => $data->message->chat->id,
            'text' => 'Не могу понять что вы написали, напишите Привет.'
        ]));
    }

}
answerBot();

/*
    $result = file_get_contents(API.'sendMessage?'.http_build_query([
            'chat_id' => $data->message->chat->id,
            'text' => $data->message->text
    ]));
*/

?>