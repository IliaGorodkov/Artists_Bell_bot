<?php

define('TOKEN', getenv('token'));
define('API','https://api.telegram.org/bot'.TOKEN.'/');

function answerBot(){
    $data = json_decode(file_get_contents('php://input'));

    $Text = $data->message->text;
    $Name = $data->message->from->first_name;
    if($Text == 'Привет'||'привет'){
        $result = file_get_contents(API.'sendMessage?'.http_build_query([
            'chat_id' => $data->message->chat->id,
            'text' => 'И тебе Привет '. $Name
        ]));
    }elseif($Text == 'Пока'||'Пака'||'бб'||'Досвидос'){
        $result = file_get_contents(API.'sendMessage?'.http_build_query([
            'chat_id' => $data->message->chat->id,
            'text' => 'Пока'
        ]));
    }

}
answerBot();

?>