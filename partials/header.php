<?php // Proje genel yapılandırma ayarlarının dahil edilmesi
require_once __DIR__ . '/../config.php';
?>
<!doctype html>
<html lang="tr">
<?php // Oturum başlatılmamışsa başlatılır
// Kullanıcı giriş durumu bu oturum üzerinden kontrol edilir
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<head>
    <meta charset="utf-8">
    <title>Mobil AI Araştırma Projesi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap (sadece grid ve temel yapılar için) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Özel tema CSS -->
    <link rel="stylesheet" href="assets/style.css">
</head>

<body class="app-body">

    <nav class="app-navbar">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <div class="brand-orb"></div>
                <div class="d-flex flex-column">
                    <span class="brand-title">Flutter · TFLite · Gemini API · PHP</span>

                </div>
            </div>

            <div class="d-none d-md-flex align-items-center gap-3 app-nav-links">
                <a href="index.php">Ana Sayfa</a>
                <a href="ondevice.php">On-Device ML</a>
                <a href="gemini_info.php">Gemini API</a>

                <?php if (isset($_SESSION['user'])): ?>
                    <a href="chat.php">Canlı Demo</a>
                    <a href="kod_analizi.php">Kod Analizi</a>
                    <a href="nasilyapildi.php">Nasıl Yapıldı?</a>
                <?php endif; ?>
            </div>

            <div class="d-flex align-items-center gap-2">
                <?php if (isset($_SESSION['user'])): ?>
                    <span class="user-chip">
                        <span class="dot-online"></span>
                        <?= htmlspecialchars($_SESSION['user']['name']) ?>
                    </span>
                    <a href="logout.php" class="btn-pill btn-pill-outline">Çıkış</a>
                <?php else: ?>
                    <a href="login.php" class="btn-pill btn-pill-outline">Giriş</a>
                    <a href="register.php" class="btn-pill btn-pill-primary">Kayıt Ol</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <main class="container app-main">