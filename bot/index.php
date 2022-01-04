<?php
 $result = file_get_contents('https://api.telegram.org/bot2009982557:AAGwlzdC8DbZ9c3lRu0kFDwjbkoPn-gUz9s/getUpdates');

print_r($result);







/*
define('TOKEN', getenv('token'));
define('API','https://api.telegram.org/bot'.TOKEN.'/');

function answerBot(){
    $data = json_decode(file_get_contents('php://input'));

    $Text = $data->message->text;

    if($Text == 'Привет'){
        $result = file_get_contents(API.'sendMessage?'.http_build_query([
            'chat_id' => $data->message->chat->id,
            'text' => 'и тебе Привет'
        ]));
    }elseif($Text != 'Привет'){
        $result = file_get_contents(API.'sendMessage?'.http_build_query([
            'chat_id' => $data->message->chat->id,
            'text' => 'Не могу понять что вы написали, напишите Привет.'
        ]));
    }

}
answerBot();
*/

?>