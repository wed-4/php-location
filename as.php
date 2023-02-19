<?php

function getgeo() {
    $url = "https://geolocation-db.com/json/";
 
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
 
// ファイルを書き込みモードで開く
$file_handle = fopen( "data.txt", "w");

// ファイルへデータを書き込み
fwrite( $file_handle, getgeo());

// ファイルを閉じる
fclose($file_handle);
?>
