<?php
// Genel yapılandırma ayarlarını (DB bilgileri vb.) dahil et
require_once 'config.php';

function getDB(): PDO
{
    static $db = null; // // Static değişken sayesinde bağlantı sadece bir kez oluşturulur
    //  // Eğer bağlantı daha önce kurulmadıysa
    if ($db === null) {
        //    // MySQL DSN (Data Source Name)
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';

        try {
            $db = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //// Hata durumlarında exception fırlat
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //// Varsayılan fetch modu: associative array
            ]);
        } catch (PDOException $e) {
            // // Bağlantı hatası durumunda işlemi durdur
            die('Veritabanı bağlantı hatası: ' . $e->getMessage());
        }
    }
    // Aynı PDO bağlantısını geri döndür
    return $db;
}
