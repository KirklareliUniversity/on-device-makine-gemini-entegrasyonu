<?php include 'partials/header.php'; ?>

<div class="hero mb-4">
    <h2 class="hero-title mb-2">On-Device Makine Öğrenmesi &amp; TensorFlow Lite</h2>
    <p class="hero-sub">
        Bu sayfa, araştırma raporunun <strong>On-Device ML</strong> ve
        <strong>TensorFlow Lite</strong> bölümünü özetler. Amaç, cihaz üzerinde
        çalışan modellerin mantığını ve Flutter uygulamalarında neden tercih edildiğini
        teknik fakat anlaşılır bir dille açıklamaktır.
    </p>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="feature-card">
            <span class="tag mb-1">Kavram</span>
            <h5>On-Device ML Nedir?</h5>
            <p>
                On-device makine öğrenmesi, modelin tüm hesaplamalarını doğrudan
                mobil cihaz üzerinde gerçekleştiren yaklaşımdır. Veriler sunucuya
                gönderilmez; kamera, mikrofon veya sensörlerden gelen bilgiler
                telefonun içinde işlenir.
            </p>
            <ul class="small">
                <li><strong>Gizlilik:</strong> Veri cihazı terk etmediği için hassas
                    görüntü/ses verileri daha güvenlidir.</li>
                <li><strong>Düşük gecikme:</strong> Sunucuya istek atılmadığı için
                    özellikle kamera gibi gerçek zamanlı uygulamalarda tepki süresi
                    ciddi şekilde azalır.</li>
                <li><strong>Çevrimdışı çalışma:</strong> İnternet olmasa bile model
                    çalışmaya devam edebilir.</li>
            </ul>
        </div>
    </div>

    <div class="col-md-6">
        <div class="feature-card">
            <span class="tag mb-1">Motivasyon</span>
            <h5>Neden Mobilde On-Device?</h5>
            <p class="small">
                Modern mobil uygulamalar; nesne tanıma, yüz tespiti, hareket takibi
                gibi görevlerde milisaniyeler düzeyinde tepki süresi ister. Veri her
                seferinde sunucuya gönderilirse ağ gecikmesi kullanıcı deneyimini
                bozar. Bu nedenle küçük fakat optimize edilmiş modeller doğrudan
                cihaz üzerinde çalıştırılır.
            </p>
            <p class="small mb-0">
                On-device ML, özellikle <strong>kamera tabanlı</strong> uygulamalar,
                <strong>sensor analizi</strong> ve belirli <strong>NLP</strong>
                (örneğin küçük metin sınıflandırma) senaryolarında standart hâle
                gelmiştir.
            </p>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-lg-7">
        <div class="feature-card">
            <span class="tag mb-1">TensorFlow Lite</span>
            <h5>TensorFlow Lite: Mobil için optimize edilmiş TF</h5>
            <p class="small">
                TensorFlow Lite (TFLite), Google’ın TensorFlow modellerini mobil
                cihazlarda çalıştırmak için geliştirdiği hafif ve optimize edilmiş
                bir sistemdir. Klasik TensorFlow modelleri büyük boyutlu ve ağır
                olduğundan telefonlarda verimli çalışamaz; TFLite bu sorunu çözmek
                için tasarlanmıştır.
            </p>
            <ul class="small mb-2">
                <li><strong>Model dönüştürme:</strong> Eğitimde kullanılan TF modeli,
                    <code>.tflite</code> formatına dönüştürülür.
                </li>
                <li><strong>Kantizasyon:</strong> Ağırlıkların 32-bit yerine 16-bit
                    veya 8-bit gösterilmesi; boyut küçülür, hız artar.</li>
                <li><strong>Pruning:</strong> Önemsiz bağlantıların kaldırılmasıyla
                    model daha seyrek ve hafif hâle gelir.</li>
                <li><strong>Donanım hızlandırma:</strong> CPU yanında GPU, NNAPI
                    gibi hızlandırıcılar kullanılabilir.</li>
            </ul>
            <p class="small mb-0">
                Bu optimizasyonlar sayesinde model; bellek kullanımı, enerji
                tüketimi ve çalışma hızı açısından mobil donanıma uyumlu bir forma
                dönüştürülür.
            </p>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="feature-card">
            <span class="tag mb-1">Çalışma Zamanı</span>
            <h5>TFLite Interpreter</h5>
            <p class="small">
                Dönüştürülmüş <code>.tflite</code> modeli çalıştırmaktan sorumlu
                bileşen <strong>TFLite Interpreter</strong>’dır. Interpreter;
            </p>
            <ul class="small">
                <li>Modeli belleğe alır,</li>
                <li>Giriş tensörlerini (örneğin kamera görüntüsü) işler,</li>
                <li>Çıktı tensörlerini hesaplayıp uygulamaya döner.</li>
            </ul>
            <p class="small mb-0">
                Tüm bu adımlar cihazın CPU/GPU/NNAPI birimleri üzerinde yürütüldüğü
                için gerçek zamanlı görüntü işleme, sensör verisi analizi ve düşük
                gecikme gerektiren oyun içi AI görevleri mümkün hâle gelir.
            </p>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="feature-card">
            <span class="tag mb-1">Kullanım Alanı</span>
            <h5>Görüntü İşleme</h5>
            <p class="small mb-0">
                Nesne sınıflandırma, yüz tespiti, pose tahmini gibi görevlerde
                TFLite, kamera görüntüsünü doğrudan cihazda işleyerek düşük gecikmeli
                sonuçlar üretir.
            </p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="feature-card">
            <span class="tag mb-1">Kullanım Alanı</span>
            <h5>Ses &amp; Wake-Word</h5>
            <p class="small mb-0">
                “Hey Google” benzeri uyandırma kelimesi algılama, basit ses
                sınıflandırma ve komut tanıma gibi senaryolarda TFLite modelleri
                yaygın şekilde kullanılmaktadır.
            </p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="feature-card">
            <span class="tag mb-1">Kullanım Alanı</span>
            <h5>Sensör Verisi &amp; Hafif NLP</h5>
            <p class="small mb-0">
                İvmeölçer/jiroskop verisinden adım sayma veya hareket tespiti, küçük
                NLP modelleriyle mobilde duygu analizi gibi hafif metin işleme
                görevleri TFLite’ın tipik örnekleridir.
            </p>
        </div>
    </div>


</div>

<div class="container">
    <div class="detail-cta-wrapper">
        <div class="detail-cta-card">

            <h3>Daha Detaylı İncelemek İster misiniz?</h3>

            <p>
                Bu sayfa özet bilgiler içerir. Model mimarileri, optimizasyon
                adımları ve Flutter entegrasyonu için detaylı anlatıma geçebilirsiniz.
            </p>

            <?php if (!empty($_SESSION['user'])): ?>
                <a href="ondevice_detay.php" class="btn-detail-cta">
                    On-Device ML Detaylı Anlatım →
                </a>
            <?php else: ?>
                <a href="login.php" class="btn-detail-cta">
                    Detayları görmek için giriş yap →
                </a>
            <?php endif; ?>

        </div>
    </div>
</div>



<?php include 'partials/footer.php'; ?>