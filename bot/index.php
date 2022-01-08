<?php

define('TOKEN', getenv('token'));
define('API','https://api.telegram.org/bot'.TOKEN.'/');

function answerBot(){
    $data = json_decode(file_get_contents('php://input'));

    $chat_id = $data->message->chat->id;
    $Text = $data->message->text;
    $first_name = $data->message->from->first_name;

    $keyboard = [
        'inline_keyboard' => [
            [
                ["text" => "Вк Создателя","url" => "https://vk.com/id212543984"]
            ]
        ]
    ];
    $encodedKeyboard = json_encode($keyboard,true);
    
    $buttons = [
        "keyboard" => [
        [
            ["text" => "Button 1_1",],
            ["text" => "Button 1_2",]
        ],
        'one_time_keyboard' => false,
        'resize_keyboard' => true,
        'selective' => true,], true
    ];
    $buttonsKeyboard = json_encode($buttons,true);



    if($Text=="/start"||$Text=='Привет'||$Text=='привет'){
        $result = file_get_contents(API.'sendMessage?'.http_build_query([
            'chat_id' => $chat_id,
            'text' => "Привет, $first_name \xF0\x9F\x91\x8B, вот команды, что я понимаю:\n/help - список команд \n/about - о нас",
            'reply_markup' => $buttonsKeyboard
        ]));
    }elseif($Text=="/help"){
        $result = file_get_contents(API.'sendMessage?'.http_build_query([
            'chat_id' => $chat_id,
            'text' => "$first_name, вот команды, что я понимаю:\n/help - список команд \n/about - о нас"
        ]));
    }elseif($Text=="/about"){
        $result = file_get_contents(API.'sendMessage?'.http_build_query([
            'chat_id' => $chat_id,
            'text' => "Этого Бота создал Программист-Красавчик Илья \xF0\x9F\x98\x81",
            'reply_markup' => $encodedKeyboard
        ]));
    }elseif($Text=='Пока'||$Text=='пока'||$Text=='Пака'||$Text=='пака'||$Text=='ББ'
    ||$Text=='бб'||$Text=='Досвидания'||$Text=='досвидания'||$Text=='Досвидос'||$Text=='досвидос'){
        /*$result = file_get_contents(API.'sendMessage?'.http_build_query([
            'chat_id' => $chat_id,
            'text' => 'Досвидания '.$first_name."\xF0\x9F\x91\x8B"
        ]));
        */
        botApiQuery("sendMessage", ['chat_id' => $chat_id,
        'text' => 'Досвидания '.$first_name."\xF0\x9F\x91\x8B"
        ]);
    }




 function botApiQuery($method, $fields = array())
    {
        $ch = curl_init("https://api.telegram.org/bot" .API. $method);
        curl_setopt_array($ch, array(
            CURLOPT_POST => count($fields),
            CURLOPT_POSTFIELDS => http_build_query($fields),
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_TIMEOUT => 10
        ));
        $result = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $result;
}



}





?>