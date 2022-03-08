<?php
$text = "hello i'm php text";
$token = '5273214183:AAHylZXXVLXvUnyFLescpOW0ZBp6hhc1jGA';
$chat_id = '-666123220';
$url = "https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$chat_id."&text=".$text;
echo $url;
// $ch = curl_init();
// echo "<br>";
// print_r($ch);
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// $result = curl_exec($ch);
// echo "<br>";
// var_dump($result);
// curl_close($ch);
// $result = json_decode($result, true);
// echo "<pre>";
// var_dump($result);
// print_r($result);

try {
    $ch = curl_init();

    // Check if initialization had gone wrong*    
    if ($ch === false) {
        throw new Exception('failed to initialize');
    }

    // Better to explicitly set URL
    curl_setopt($ch, CURLOPT_URL, $url);
    // That needs to be set; content will spill to STDOUT otherwise
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // Set more options
    curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
    $content = curl_exec($ch);

    // Check the return value of curl_exec(), too
    if ($content === false) {
        throw new Exception(curl_error($ch), curl_errno($ch));
    }

    // Check HTTP return code, too; might be something else than 200
    $httpReturnCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    /* Process $content here */

} catch(Exception $e) {

    trigger_error(sprintf(
        'Curl failed with error #%d: %s',
        $e->getCode(), $e->getMessage()),
        E_USER_ERROR);

} finally {
    // Close curl handle unless it failed to initialize
    if (is_resource($ch)) {
        curl_close($ch);
    }
}
	
?>