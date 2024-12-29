<?php
function generateQris($amount) {
    // Contoh API Request ke layanan pembayaran
    $apiUrl = "https://api.penyedia-pembayaran.com/qris";
    $apiKey = "API_KEY_ANDA";

    $data = [
        "amount" => $amount,
        "callback_url" => "http://yourwebsite.com/payment.php"
    ];

    $options = [
        "http" => [
            "header" => "Content-Type: application/json\r\n" .
                        "Authorization: Bearer $apiKey\r\n",
            "method" => "POST",
            "content" => json_encode($data),
        ],
    ];

    $context = stream_context_create($options);
    $response = file_get_contents($apiUrl, false, $context);
    return json_decode($response, true);
}

function checkPaymentStatus($invoiceId) {
    $apiUrl = "https://api.penyedia-pembayaran.com/qris/$invoiceId";
    $apiKey = "API_KEY_ANDA";

    $options = [
        "http" => [
            "header" => "Authorization: Bearer $apiKey\r\n",
            "method" => "GET",
        ],
    ];

    $context = stream_context_create($options);
    $response = file_get_contents($apiUrl, false, $context);
    $responseData = json_decode($response, true);

    return $responseData['status'] ?? 'UNPAID'; // Kembalikan status pembayaran
}

function checkPaymentStatus($invoiceId) {
    // Logika API QRIS
}

?>