<?php

define('TOKEN', getenv('token'));
define('API','https://api.telegram.org/bot'.TOKEN.'/');

function answerBot(){
    $data = json_decode(file_get_contents('php://input'));

    $chat_id = $data->message->chat->id;
    $Text = $data->message->text;
    $Name = $data->message->from->first_name;

    if($Text=='Привет'||$Text=='привет'){
        $result = file_get_contents(API.'sendMessage?'.http_build_query([
            'chat_id' => $chat_id,
            'text' => 'И тебе Привет '. $Name
        ]));
    }elseif($Text=='Пока'||$Text=='пока'||$Text=='Пака'||$Text=='пака'||$Text=='ББ'||$Text=='бб'||$Text=='Досвидос'){
        $result = file_get_contents(API.'sendMessage?'.http_build_query([
            'chat_id' => $chat_id,
            'text' => 'Досвидания '. $Name
        ]));
    }
}
answerBot();

$keyboard = array(
        array('text'=>'/start'),
        array('text'=>'/hi'),
);


$reply_markup = $telegram->replyKeyboardMarkup([
    'keyboard' => $keyboard, 
    'resize_keyboard' => true, 
    'one_time_keyboard' => true
]);

$response = $telegram->sendMessage([
    'chat_id' => $chat_id, 
    'text' => 'Hello World', 
    'reply_markup' => $reply_markup
]);

$messageId = $response->getMessageId();

?>