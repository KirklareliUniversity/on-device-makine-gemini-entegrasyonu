<?php
require_once 'db.php';
include 'partials/header.php';

// sadece giriş yapanlar görsün
if (!isset($_SESSION['user'])) {
    echo '<div class="alert alert-warning">Bu içeriği görüntülemek için giriş yapmalısınız.</div>';
    echo '<a href="login.php" class="btn btn-primary btn-sm">Giriş Yap</a>';
    include 'partials/footer.php';
    exit;
}
?>

<div class="hero mb-5">
    <h2 class="hero-title mb-2">On-Device Makine Öğrenmesi & TensorFlow Lite</h2>
    <p class="hero-sub">
        Bu sayfa, mobil uygulamalarda <strong>On-Device Makine Öğrenmesi</strong> yaklaşımını ve
        <strong>TensorFlow Lite</strong> teknolojisinin Flutter ekosistemindeki rolünü
        daha detaylı bir bakış açısıyla ele almaktadır.
    </p>
</div>

<!-- KAVRAMSAL TEMEL -->
<div class="feature-card mb-4">
    <span class="tag">Kavramsal Temel</span>
    <h4>On-Device Makine Öğrenmesi Nedir?</h4>
    <p>
        On-device makine öğrenmesi, makine öğrenmesi modellerinin tüm çıkarım (inference)
        işlemlerinin doğrudan mobil cihaz üzerinde gerçekleştirilmesini esas alan bir yaklaşımdır.
        Kamera, mikrofon veya sensörlerden elde edilen veriler herhangi bir sunucuya gönderilmez;
        tüm hesaplamalar cihazın kendi donanımı üzerinde yapılır.
    </p>
    <p class="mb-0">
        Bu yaklaşım; <strong>veri gizliliği</strong>, <strong>düşük gecikme süresi</strong> ve
        <strong>internet bağımsızlığı</strong> gibi üç temel avantaj nedeniyle modern mobil
        uygulamalarda yaygın şekilde tercih edilmektedir.
    </p>
</div>

<!-- GİZLİLİK & PERFORMANS -->
<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="feature-card">
            <span class="tag">Gizlilik</span>
            <h5>Veri Güvenliği ve Kullanıcı Gizliliği</h5>
            <p>
                Bulut tabanlı makine öğrenmesi çözümlerinde kullanıcıya ait görüntü, ses veya metin
                verileri sunucuya aktarılır. Bu durum, kişisel verilerin korunması açısından
                potansiyel riskler doğurabilir.
            </p>
            <p class="mb-0">
                On-device ML yaklaşımı ise verinin cihaz dışına çıkmasını engelleyerek özellikle
                sağlık, finans ve kişisel görüntü işleme gibi hassas alanlarda güvenli bir çözüm sunar.
            </p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="feature-card">
            <span class="tag">Performans</span>
            <h5>Düşük Gecikme ve Akıcı Deneyim</h5>
            <p>
                Gerçek zamanlı kamera ve sensör tabanlı uygulamalarda milisaniyelik gecikmeler bile
                kullanıcı deneyimini olumsuz etkileyebilir.
            </p>
            <p class="mb-0">
                Hesaplamaların doğrudan cihaz üzerinde yapılması, ağ gecikmesini ortadan kaldırarak
                nesne tanıma, yüz tespiti ve hareket izleme gibi görevlerde yüksek performans sağlar.
            </p>
        </div>
    </div>
</div>

<!-- MİMARİ -->
<div class="feature-card mb-4">
    <span class="tag">Mimari</span>
    <h4>On-Device Makine Öğrenmesi Mimarisi</h4>
    <p>
        On-device ML mimarisi; veri toplama, ön işleme, modelin çalıştırılması ve çıktı üretimi
        adımlarının tamamının mobil cihaz üzerinde gerçekleştirilmesine dayanır.
    </p>
    <p class="mb-0">
        Kamera, mikrofon veya sensörlerden elde edilen veriler uygulama içinde işlenir ve model
        çıktıları doğrudan kullanıcı arayüzüne aktarılır. Bu kapalı döngü yapı, gecikmeyi minimuma
        indirerek kararlı bir çalışma ortamı sağlar.
    </p>
</div>

<!-- DONANIM & ENERJİ -->
<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="feature-card">
            <span class="tag">Donanım</span>
            <h5>CPU, GPU ve Hızlandırıcılar</h5>
            <p class="mb-0">
                Mobil cihazlardaki CPU, GPU ve NNAPI gibi yapay zekâ hızlandırıcıları,
                on-device modellerin çalıştırılmasında aktif rol oynar. Bu sayede hem performans
                artar hem de donanım kaynakları dengeli kullanılır.
            </p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="feature-card">
            <span class="tag">Enerji</span>
            <h5>Batarya Verimliliği</h5>
            <p class="mb-0">
                Optimize edilmiş modeller, kısa sürede çıkarım yaparak batarya tüketimini azaltır.
                Bu durum uzun süreli kullanım gerektiren mobil uygulamalarda kritik öneme sahiptir.
            </p>
        </div>
    </div>
</div>

<!-- TENSORFLOW LITE -->
<div class="feature-card mb-4">
    <span class="tag">TensorFlow Lite</span>
    <h4>Mobil İçin Optimize Edilmiş Makine Öğrenmesi</h4>
    <p>
        TensorFlow Lite (TFLite), Google tarafından TensorFlow modellerini mobil cihazlarda
        çalıştırmak için geliştirilmiş hafif ve optimize edilmiş bir altyapıdır.
    </p>
    <ul class="small">
        <li>Kantizasyon ile model boyutu küçültülür</li>
        <li>Pruning ile gereksiz bağlantılar kaldırılır</li>
        <li>GPU ve NNAPI desteğiyle performans artırılır</li>
    </ul>
</div>

<!-- FLUTTER ENTEGRASYON -->
<div class="feature-card mb-4">
    <span class="tag">Flutter Entegrasyonu</span>
    <h4>Flutter + TensorFlow Lite İş Akışı</h4>
    <ol class="small">
        <li>TFLite modelinin uygulamaya eklenmesi</li>
        <li>Interpreter’ın Flutter ortamında başlatılması</li>
        <li>Giriş verisinin hazırlanması</li>
        <li>Inference işleminin gerçekleştirilmesi</li>
        <li>Sonuçların Flutter arayüzüne aktarılması</li>
    </ol>
    <p class="mb-0">
        Bu yapı sayesinde Flutter tabanlı uygulamalarda platformlar arası, düşük gecikmeli ve
        gerçek zamanlı on-device ML çözümleri geliştirilebilir.
    </p>
</div>

<!-- KULLANIM ALANLARI -->
<div class="feature-card">
    <span class="tag">Kullanım Alanları</span>
    <ul class="small mb-0">
        <li>Görüntü işleme (nesne tanıma, yüz tespiti)</li>
        <li>Ses işleme (wake-word algılama)</li>
        <li>Sensör analizi (hareket, adım sayma)</li>
        <li>Hafif NLP (metin sınıflandırma, duygu analizi)</li>
    </ul>
</div>

<?php include 'partials/footer.php'; ?>