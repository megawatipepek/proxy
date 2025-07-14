<?php
// ==============================================
// FILE PROXY UNTUK MENGAMBIL KONTEN DARI SERVER LAIN
// ==============================================
header('Content-Type: text/plain; charset=utf-8');

$targetURL = "https://griyaflazz.xyz/ajax/request-otp.php";

// Inisialisasi cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $targetURL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

// Set header untuk menyamar sebagai browser
$headers = [
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
    'Accept-Language: en-US,en;q=0.5'
];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Eksekusi request
$response = curl_exec($ch);

// Handle error
if(curl_errno($ch)) {
    echo "ERROR: " . curl_error($ch);
} else {
    // Tampilkan hasil + info header
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    echo "HTTP STATUS: $httpCode\n";
    echo "=================================\n";
    echo htmlspecialchars($response);
}

curl_close($ch);
?>
