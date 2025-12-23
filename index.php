<?php
include 'partials/header.php';
?>

<div class="home-shell py-4">

    <div class="home-layout">

        <!-- SOL ALAN: ANA HERO (PROJE TANITIMI) -->
        <section class="home-hero">
            <!-- Proje etiketi ve kısa açıklama -->
            <div class="home-hero-kicker">
                <span class="home-chip"> Dönem Projesi</span>
                <span>Mobil &amp; AI • Flutter • TensorFlow Lite • Gemini • PHP</span>
            </div>

            <!-- Başlık -->
            <h1 class="home-hero-title">
                Flutter’da On-Device ML &amp; Gemini API<br>
                için PHP Tabanlı Araştırma Platformu
            </h1>

            <!-- Açıklama -->
            <p class="home-hero-text">
                Bu web sitesi, <strong>Flutter’da On-Device Makine Öğrenmesi (TensorFlow Lite)</strong> ve
                <strong>Google Gemini API</strong> entegrasyonunu anlatan araştırma raporunun
                PHP ile hazırlanmış sunum ve demo kısmıdır. Hem teorik başlıkları, hem de çalışan
                bir AI sohbet demosunu içerir.
            </p>

            <!-- Aksiyon butonları -->
            <div class="home-hero-actions">
                <a href="ondevice.php" class="btn-hero-primary">
                    On-Device ML’yi İncele
                </a>

                <a href="gemini_info.php" class="btn-hero-ghost">
                    Gemini API Özeti
                </a>

                <a href="chat.php" class="btn-hero-ghost">
                    Canlı Demo’ya Git
                </a>
            </div>

            <p class="home-hero-footnote">
                Üst menüden araştırma sekmelerine geçebilir, giriş yaptıktan sonra
                <strong>Canlı Demo</strong> ve <strong>Kod Analizi</strong> sayfalarına erişebilirsiniz.
            </p>
        </section>

        <!-- SAĞ: 3 PEMBE KART -->
        <section class="d-flex flex-column gap-3">


            <div class="feature-card home-side-card">
                <div class="home-side-card-title mb-1">

                    <h5 class="mb-1">Teorik İçerik</h5>
                </div>
                <small>
                    On-device ML, TensorFlow Lite mimarisi ve Gemini API; PDF rapordaki başlıklarla uyumlu olacak
                    şekilde <strong>“On-Device ML”</strong> ve <strong>“Gemini API”</strong> sayfalarına dağıtıldı.
                </small>
            </div>


            <div class="feature-card home-side-card">
                <div class="home-side-card-title mb-1">

                    <h5 class="mb-1">PHP &amp; MySQL Altyapısı</h5>
                </div>
                <small>
                    Kullanıcı kayıt/giriş sistemi, mesajların veritabanında tutulması ve güvenli
                    oturum yönetimi bu projede gösteriliyor.
                </small>
            </div>

            <!-- Demo -->
            <div class="feature-card home-side-card">
                <div class="home-side-card-title mb-1">

                    <h5 class="mb-1">Gemini Tabanlı Chatbot</h5>
                </div>
                <small>
                    Gemini API ile metin üretimi sağlayan sohbet botu, araştırma konusunun
                    pratik tarafını temsil ediyor. <strong>Canlı Demo</strong> sekmesinden
                    doğrudan deneyimleyebilirsiniz.
                </small>
            </div>

        </section>

    </div>
</div>

<?php
include 'partials/footer.php';
?>