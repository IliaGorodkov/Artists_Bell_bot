<?php

define('TOKEN', getenv('token'));
define('API','https://api.telegram.org/bot'.TOKEN.'/');



$data = json_decode(file_get_contents('php://input'));
$chat_id = $data->message->chat->id;
$Text = $data->message->text;
$first_name = $data->message->from->first_name;

function answerBot(){
    $data = json_decode(file_get_contents('php://input'));

    $chat_id = $data->message->chat->id;
    $Text = $data->message->text;
    $first_name = $data->message->from->first_name;

    $keyboard = [
        'inline_keyboard' => [
            [
                ['text' => 'forward me to groups', 'callback_data' => 'someString']
            ]
        ]
    ];
    $encodedKeyboard = json_encode($keyboard);

    if($Text=="/start"||$Text=='Привет'||$Text=='привет'){
        $result = file_get_contents(API.'sendMessage?'.http_build_query([
            'chat_id' => $chat_id,
            'text' => "Привет, $first_name \xF0\x9F\x91\x8B, вот команды, что я понимаю:\n/help - список команд \n/about - о нас",
            'reply_markup' => $encodedKeyboard
        ]));
    }elseif($Text=="/help"){
        $result = file_get_contents(API.'sendMessage?'.http_build_query([
            'chat_id' => $chat_id,
            'text' => "$first_name, вот команды, что я понимаю:\n/help - список команд \n/about - о нас",
            'reply_markup' => $encodedKeyboard
        ]));
    }elseif($Text=="/about"){
        $result = file_get_contents(API.'sendMessage?'.http_build_query([
            'chat_id' => $chat_id,
            'text' => "Этого Бота создал Программист-Красавчик Илья \xF0\x9F\x98\x81"
        ]));
    }elseif($Text=='Пока'||$Text=='пока'||$Text=='Пака'||$Text=='пака'||$Text=='ББ'
    ||$Text=='бб'||$Text=='Досвидания'||$Text=='досвидания'||$Text=='Досвидос'||$Text=='досвидос'){
        $result = file_get_contents(API.'sendMessage?'.http_build_query([
            'chat_id' => $chat_id,
            'text' => 'Досвидания '.$first_name."\xF0\x9F\x91\x8B"
        ]));
    }








}
answerBot();



function send($method, $data)
{
    $url = "https://api.telegram.org/bot2009982557:AAGwlzdC8DbZ9c3lRu0kFDwjbkoPn-gUz9s". "/" . $method;
    
    $data = json_decode(file_get_contents('php://input'));
    $chat_id = $data->message->chat->id;
    $Text = $data->message->text;
    $first_name = $data->message->from->first_name;

    $result = file_get_contents(API.'sendMessage?'.http_build_query([
        'chat_id' => $chat_id,
        'text' => 'Досвидания '.$first_name."\xF0\x9F\x91\x8B",'reply_markup' => $encodedKeyboard
    ]));
    return  $result;
}







?>