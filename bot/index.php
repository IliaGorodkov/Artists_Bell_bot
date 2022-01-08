<?php

Class myBot{

function answerBot(){
    $data = json_decode(file_get_contents('php://input'));

    $chat_id = $data->message->chat->id;
    $Text = $data->message->text;
    $first_name = $data->message->from->first_name;

    $keyboard = [
        'inline_keyboard' => [
            [
                ["text" => "Его Вк","url" => "https://vk.com/id212543984"]
            ]
        ]
    ];
    $encodedKeyboard = json_encode($keyboard,true);
    
  


    if($Text=="/start"||$Text=='Привет'||$Text=='привет'){
        $this->botApiQuery("sendMessage",[
        'chat_id' => $chat_id,
        'text' => "Привет, $first_name \xF0\x9F\x91\x8B, вот команды, что я понимаю:\n/help - список команд \n/about - о нас"
        ]);
    }elseif($Text=="/help"){
        $this->botApiQuery("sendMessage",[
        'chat_id' => $chat_id,
        'text' => "$first_name, вот команды, что я понимаю:\n/help - список команд \n/about - о Создателе Бота"
        ]);
    }elseif($Text=="/about"){
        $this->botApiQuery("sendMessage",[
        'chat_id' => $chat_id,
        'text' => "Этого Бота создал Программист-Красавчик Илья \xF0\x9F\x98\x81",
        'reply_markup' => $encodedKeyboard
        ]);
    }elseif($Text=='Пока'||$Text=='пока'||$Text=='Пака'||$Text=='пака'||$Text=='ББ'
    ||$Text=='бб'||$Text=='Досвидания'||$Text=='досвидания'||$Text=='Досвидос'||$Text=='досвидос'){
        $this->botApiQuery("sendMessage",[
        'chat_id' => $chat_id,
        'text' => 'Досвидания '.$first_name."\xF0\x9F\x91\x8B"
        ]);
    }
}

function botApiQuery($method, $fields = array()){

    define('TOKEN', getenv('token'));
    define('API','https://api.telegram.org/bot'.TOKEN.'/');
    
    $data = json_decode(file_get_contents('php://input'));

    $ch = curl_init(API.$method);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ($fields));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
} 

 function actionKeyboardButton(){
    $data = json_decode(file_get_contents('php://input'));

    $chat_id = $data->message->chat->id;
    $Text = $data->message->text;
    $first_name = $data->message->from->first_name;

    $buttons = json_encode(["keyboard" => [
        ["text" => "Button 1_1"],["text" => "Button 1_2"]
        ],'one_time_keyboard' => false,
        'resize_keyboard' => true,
        'selective' => true,
        ], true);

    $this->botApiQuery("sendMessage", [
        "chat_id" => $chat_id,
        "text" => "Обработана кнопка ".$Text,
        "reply_markup" => $buttons
    ]);
}



}

$Bot = new myBot;
$Bot->answerBot();
//'reply_markup' => $encodedKeyboard
?>