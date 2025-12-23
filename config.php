<?php
// Hata ayarları
/*
Geliştirme aşamasında tüm PHP hatalarının görüntülenmesi sağlanır. (Canlı ortamda display_errors kapatılmalıdır.)
*/
error_reporting(E_ALL);
ini_set('display_errors', 1);
/*
OTURUM (SESSION) YÖNETİMİ
 Kullanıcı giriş durumu ve yetkilendirme işlemleri için PHP session mekanizması başlatılır.
*/

session_start();

// MySQL Ayarları Projede kullanılan MySQL veritabanı bağlantı bilgileri.XAMPP ortamı varsayılan ayarları kullanılmıştır
define('DB_HOST', 'localhost');
define('DB_NAME', 'ai_chat');   // phpMyAdmin'deki veritabanı adın
define('DB_USER', 'root');      // XAMPP varsayılan kullanıcı
define('DB_PASS', '');          // Şifren varsa buraya yaz

/*
GOOGLE GEMINI API AYARLARI
Büyük dil modeli entegrasyonu için gerekli API anahtarı
ve kullanılacak model tanımı.
*/
define('GEMINI_API_KEY', 'AIzaSyA9mE6wk0-0RXYSlPirVXLzK430NoCinSM');

// Dokümantasyonda belirtilen Gemini model adı
define('GEMINI_MODEL', 'gemini-2.5-flash');
//Güvenlik gereksinimlerinin yüksek olduğu üretim ortamlarında API anahtarlarının doğrudan kaynak kod içinde tutulması önerilmemektedir.