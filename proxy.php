<?php
// SOLUSI ALTERNATIF
header('Content-Type: text/html; charset=UTF-8');

$url = "https://griyaflazz.xyz/ajax/request-otp.php";

// Pakai file_get_contents() jika allow_url_fopen=On
if(ini_get('allow_url_fopen')) {
    $response = @file_get_contents($url);
    if($response === false) {
        echo "ERROR: Gagal mengambil konten";
    } else {
        echo $response;
    }
}
// Pakai cURL jika tersedia
else if(function_exists('curl_init')) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    if(curl_errno($ch)) {
        echo "CURL ERROR: " . curl_error($ch);
    } else {
        echo $response;
    }
    curl_close($ch);
}
// Solusi terakhir
else {
    echo "SERVER TIDAK SUPPORT CURL ATAU URL_FOPEN";
}
?>
