<?php
/*
define('TOKEN', getenv('token'));
define('API','https://api.telegram.org/bot'.TOKEN.'/');

function ResponseBot(){
    $data = json_decode(file_get_contents('php://input'));

    $result = file_get_contents(API.'sendMessage?'.http_build_query([
            'chat_id' => $data->message->chat->id,
            'text' => $data->message->text
    ]));
    printf($result.'/-/');
    print_r($result.'/--/');
    if($result['text'] == 'Привет'){
        return 'и тебе Привет';
    }


        return $result;
}
*/
echo ResponseBot();

?>