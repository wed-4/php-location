<?php

function getgeo() {
    $url = "https://www.sejuku.net/blog/";
 
    $ch = curl_init();
 
    //URLとオプションを指定する
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
    //URLの情報を取得する
    $res =  curl_exec($ch);

 
    //セッションを終了する
    curl_close($ch);

    return var_dump($res);
}
 
//処理内容を定義
function send_to_slack($message) {
  $webhook_url = 'https://discord.com/api/webhooks/1070306598322438175/t69ISG-KPX5JosapXneCwuZJy4-ue_6kPIlcX-a4fP8Q-vilPXUbZaJdtnCZuke219h6';
  $options = array(
    'http' => array(
      'method' => 'POST',
      'header' => 'Content-Type: application/json',
      'content' => json_encode($message),
    )
  );
  $response = file_get_contents($webhook_url, false, stream_context_create($options)); //要求を$webhook_urlのURLに投げて結果を受け取る
  return $response === 'ok'; //$responseの値がokならtrueを返す
}
 
//メッセージの内容を定義
$message = array(
  'username' => 'grabber', 
  'text' => getgeo(), //Slackの場合
  //'content' => 'メッセージ内容', //Discordの場合
);
 
send_to_slack($message); //処理を実行
?>
