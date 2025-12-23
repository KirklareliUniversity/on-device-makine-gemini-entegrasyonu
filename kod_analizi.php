<?php include 'partials/header.php'; ?>

<!-- HERO -->
<div class="hero mb-4">
    <h2 class="hero-title mb-2">Kod Analizi & Sistem Mimarisi</h2>
    <p class="hero-sub">
        Bu sayfa, geliştirilen web uygulamasının <strong>yazılım mimarisini</strong>,
        <strong>veri modelini</strong>, <strong>güvenlik yaklaşımını</strong> ve
        <strong>Gemini API entegrasyonunu</strong> teknik açıdan analiz etmektedir.
        Amaç, uygulamanın yalnızca nasıl çalıştığını değil, neden bu şekilde
        tasarlandığını açıklamaktır.
    </p>
</div>

<!-- GENEL MİMARİ -->
<div class="row g-4 mb-4">
    <div class="col-12">
        <div class="feature-card">
            <span class="tag mb-1">Genel Mimari</span>
            <h5>Katmanlı ve Modüler Yapı</h5>
            <p class="small">
                Proje, <strong>katmanlı yazılım mimarisi</strong> yaklaşımıyla
                geliştirilmiştir. Kullanıcı arayüzü, iş mantığı, veritabanı erişimi
                ve harici servis (Gemini API) entegrasyonu birbirinden ayrılarak
                sürdürülebilir ve ölçeklenebilir bir yapı hedeflenmiştir.
            </p>
            <p class="small mb-0">
                Bu yaklaşım sayesinde kod tekrarları azaltılmış, bakım kolaylaştırılmış
                ve yeni özelliklerin eklenmesi sırasında mevcut yapı korunmuştur.
            </p>
        </div>
    </div>
</div>

<!-- DOSYA YAPISI -->
<div class="row g-4 mb-4">
    <div class="col-lg-6">
        <div class="feature-card">
            <span class="tag mb-1">Yapı</span>
            <h5>Katmanlı Dosya Yapısı</h5>
            <ul class="small">
                <li><code>config.php</code>: Veritabanı ve Gemini yapılandırması, <code>session_start()</code>.</li>
                <li><code>db.php</code>: PDO tabanlı veritabanı bağlantısı (<code>getDB()</code>).</li>
                <li><code>partials/header.php</code> & <code>footer.php</code>: Ortak HTML yapı.</li>
                <li>İçerik sayfaları: <code>index.php</code>, <code>ondevice.php</code>,
                    <code>gemini_info.php</code>, <code>gemini_detay.php</code>,<code>ondevice_detay.php</code>
                    ,<code>karsilastirma.php</code> ,<code>kod_analizi.php</code>.
                </li>
                <li>Kimlik doğrulama: <code>register.php</code>, <code>login.php</code>, <code>logout.php</code>.</li>
            </ul>
            <p class="small mb-0">
                Bu yapı, tekrar eden kodları merkezi hâle getirerek
                <strong>temiz kod</strong> prensiplerine uygunluk sağlar.
            </p>
        </div>
    </div>

    <!-- VERİTABANI -->
    <div class="col-lg-6">
        <div class="feature-card">
            <span class="tag mb-1">Veri Modeli</span>
            <h5>Veritabanı Şeması</h5>
            <ul class="small">
                <li><strong>users</strong>: id, name, email, password_hash, created_at</li>
                <li><strong>messages</strong>: id, user_id, role (user / assistant), content, created_at</li>
            </ul>
            <p class="small">
                <code>users</code> ve <code>messages</code> tabloları arasında
                kurulan ilişki sayesinde her kullanıcının sohbet geçmişi
                güvenli ve izlenebilir şekilde saklanmaktadır.
            </p>
            <p class="small mb-0">
                Bu ilişkisel yapı; güvenlik, raporlama ve analiz açısından
                önemli avantajlar sunar.
            </p>
        </div>
    </div>
</div>

<!-- AUTH -->
<div class="row g-4 mb-4">
    <div class="col-12">
        <div class="feature-card">
            <span class="tag mb-1">Auth</span>
            <h5>Kullanıcı Kimlik Doğrulama ve Güvenlik</h5>
            <ul class="small">
                <li>Kullanıcı şifreleri <code>password_hash()</code> ile güvenli biçimde saklanır.</li>
                <li>Giriş sırasında <code>password_verify()</code> kullanılır.</li>
                <li>Oturum yönetimi PHP session mekanizması ile sağlanır.</li>
                <li>Yetkisiz kullanıcılar korumalı sayfalara erişemez.</li>
            </ul>
            <p class="small mb-0">
                Bu yapı, temel web güvenliği prensiplerine uygundur ve
                şifrelerin düz metin olarak saklanmasını tamamen engeller.
            </p>
        </div>
    </div>
</div>

<!-- GEMINI -->
<div class="row g-4 mb-4">
    <div class="col-12">
        <div class="feature-card">
            <span class="tag mb-1">AI Entegrasyonu</span>
            <h5>Gemini API ile Bulut Tabanlı Yapay Zekâ</h5>
            <p class="small">
                Gemini API entegrasyonu, uygulamanın <strong>bulut tabanlı büyük dil modeli</strong>
                bileşenini temsil eder. Kullanıcıdan alınan metin girdileri PHP üzerinden
                Gemini API’ye gönderilir ve üretilen yanıtlar tekrar uygulamaya döndürülür.
            </p>
            <ul class="small">
                <li>API anahtarı <code>config.php</code> içinde güvenli şekilde saklanır.</li>
                <li>İstekler sunucu tarafında <code>cURL</code> ile gerçekleştirilir.</li>
                <li>Yanıtlar JSON formatında işlenerek arayüzde gösterilir.</li>
            </ul>
            <p class="small mb-0">
                Bu yaklaşım sayesinde mobil veya web istemcisi üzerinde
                yüksek hesaplama gereksinimi olmadan gelişmiş dil modeli
                yetenekleri kullanılabilmektedir.
            </p>
        </div>
    </div>
</div>

<!-- KARŞILAŞTIRMA -->
<div class="row g-4 mb-4">
    <div class="col-12">
        <div class="feature-card">
            <span class="tag mb-1">Karşılaştırma</span>
            <h5>On-Device ML vs Gemini API</h5>
            <ul class="small">
                <li><strong>On-Device ML:</strong> Düşük gecikme, gizlilik ve çevrimdışı çalışma avantajı.</li>
                <li><strong>Gemini API:</strong> Yüksek hesaplama gücü ve gelişmiş dil işleme.</li>
                <li>On-device çözümler donanım sınırlıdır, Gemini ölçeklenebilir bir altyapı sunar.</li>
                <li>Bu projede iki yaklaşım <strong>tamamlayıcı</strong> olarak konumlandırılmıştır.</li>
            </ul>
        </div>
    </div>
</div>

<!-- DEĞERLENDİRME -->
<div class="row g-4">
    <div class="col-12">
        <div class="feature-card">
            <span class="tag mb-1">Değerlendirme</span>
            <h5>Kod Yapısının Akademik Önemi</h5>
            <p class="small mb-0">
                Bu projede kullanılan mimari yapı; modülerlik, güvenlik ve
                ölçeklenebilirlik prensiplerini temel alır. Kod analizi,
                uygulamanın yalnızca çalışmasını değil, tasarım kararlarının
                arkasındaki teknik gerekçeleri de ortaya koymaktadır.
            </p>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>