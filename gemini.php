<?php
/**
 * Gemini API ile konuşmak için yardımcı fonksiyon.
 * 
 * Kullanım:
 *   require_once 'gemini.php';
 *   $cevap = gemini_generate("TensorFlow Lite ile on-device nesne tanıma nasıl çalışır?");
 */

require_once 'config.php';

/**
 * Kullanıcıdan gelen metni Gemini API'ye gönderir ve cevabı geri döner.
 *
 * @param string $prompt Kullanıcının sorusu / mesajı
 * @return string Gemini'den gelen cevap veya anlaşılır hata mesajı
 */
function gemini_generate(string $prompt): string
{
    // 1) API anahtarı kontrolü
    if (!defined('GEMINI_API_KEY') || GEMINI_API_KEY === '') {
        return "⚠️ Gemini API anahtarı tanımlı değil.\n"
            . "Lütfen config.php dosyasındaki GEMINI_API_KEY sabitini doldurun.";
    }

    if (!defined('GEMINI_MODEL') || GEMINI_MODEL === '') {
        return "⚠️ Kullanılacak model adı (GEMINI_MODEL) tanımlı değil.\n"
            . "Örnek: gemini-1.5-flash veya gemini-2.5-flash";
    }

    // 2) Endpoint (AI Studio dokümantasyonuna uygun v1beta generateContent)
    $baseUrl = 'https://generativelanguage.googleapis.com/v1beta/models/';
    $url = $baseUrl . rawurlencode(GEMINI_MODEL) . ':generateContent';

    // 3) Gönderilecek JSON gövdesi
    // Basit kullanım: tek bir content, tek bir text-part
    $payload = [
        "contents" => [
            [
                "parts" => [
                    ["text" => $prompt]
                ]
            ]
        ]
    ];

    // 4) cURL ile HTTP isteğini hazırlama
    $ch = curl_init($url);

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'x-goog-api-key: ' . GEMINI_API_KEY,   // Anahtar header üzerinden gönderiliyor
        ],
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_TIMEOUT => 40,              // 40 sn timeout
    ]);

    $response = curl_exec($ch);

    // cURL seviyesinde hata (DNS, bağlantı v.s.)
    if ($response === false) {
        $err = curl_error($ch);
        curl_close($ch);

        return "⚠️ Gemini API çağrısında bir bağlantı hatası oluştu:\n" . $err;
    }

    // HTTP status kodunu da alalım
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // JSON'ı diziye çevir
    $data = json_decode($response, true);

    // 5) Hata durumlarını daha okunabilir hale getirelim
    if ($httpCode >= 400) {
        // Google çoğu zaman "error" alanını dolduruyor
        $rawMessage = $data['error']['message'] ?? ('HTTP ' . $httpCode . ' hata aldı.');

        // Kota / limit hatası
        if (stripos($rawMessage, 'quota') !== false || stripos($rawMessage, 'exceeded') !== false) {
            return "⚠️ Gemini API kullanım limiti aşıldı.\n\n"
                . "• Çok sık istek gönderdiniz veya ücretsiz kota doldu.\n"
                . "• Biraz bekleyip tekrar deneyin.\n\n"
                . "Teknik detay: " . $rawMessage;
        }

        // HTTP/2 stream tarzı bağlantı kesilme hataları
        if (stripos($rawMessage, 'stream') !== false || stripos($rawMessage, 'HTTP/2') !== false) {
            return "⚠️ Gemini sunucusuyla bağlantı anlık olarak kesildi.\n\n"
                . "Bu genelde sunucunun yoğun olması veya çok hızlı arka arkaya istek atılmasından kaynaklanır.\n"
                . "Lütfen aynı soruyu kısa bir süre sonra tekrar deneyin.\n\n"
                . "Teknik detay: " . $rawMessage;
        }

        // Diğer tüm hatalar
        return "⚠️ Gemini API bir hata döndürdü:\n" . $rawMessage;
    }

    // 6) Başarılı cevap: candidates[0].content.parts[0].text alanını okuyalım
    if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
        return $data['candidates'][0]['content']['parts'][0]['text'];
    }

    // Beklenmeyen cevap formatı
    return "⚠️ Gemini API'den beklenmeyen bir yanıt alındı.\n"
        . "Gelen ham veri (debug için):\n"
        . $response;
}
