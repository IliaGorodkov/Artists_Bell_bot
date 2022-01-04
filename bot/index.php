<?php

//$result = file_get_contents('https://api.telegram.org/bot2009982557:AAGwlzdC8DbZ9c3lRu0kFDwjbkoPn-gUz9s/getMe');

$query = curl_init('https://api.telegram.org/bot2009982557:AAGwlzdC8DbZ9c3lRu0kFDwjbkoPn-gUz9s/sendMessage?chat_id=1307855636&text=Hello');
curl_setopt($query, CURLOPT_RETURNTRANSFER, true);
curl_setopt($query, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($query, CURLOPT_HEADER, false);
$result = curl_exec($query);
curl_close($query);
 
print_r($result);











?>