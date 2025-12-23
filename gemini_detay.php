<?php  //// Ortak header (navigasyon + oturum yapısı)
include 'partials/header.php'; ?>
<!-- SAYFA BAŞLIK ALANI -->
<div class="hero mb-4">
    <h2 class="hero-title mb-2">Google Gemini API: Bulut Tabanlı Büyük Dil Modelleri</h2>
    <p class="hero-sub">
        Bu sayfa, Google Gemini API’nin mimarisini, büyük dil modellerinin çalışma
        prensiplerini ve Flutter tabanlı mobil uygulamalara entegrasyon sürecini
        <strong>detaylı ve teknik</strong> bir bakış açısıyla ele almaktadır.
    </p>
</div>

<!-- 1. BÖLÜM -->
<div class="feature-card mb-4">
    <span class="tag mb-1">Kavramsal Temel</span>
    <h4>Büyük Dil Modelleri (LLM) Nasıl Çalışır?</h4>
    <p class="small">
        Büyük dil modelleri (Large Language Models – LLM), milyarlarca parametre içeren
        derin sinir ağları üzerine inşa edilmiş yapay zekâ sistemleridir. Bu modeller,
        geniş metin veri kümeleri üzerinde eğitilerek dilin anlamsal yapısını,
        bağlamsal ilişkilerini ve sözdizimsel örüntülerini öğrenir.
    </p>
    <p class="small">
        LLM’lerin temel gücü, yalnızca metni analiz etmeleri değil; aynı zamanda
        <strong>bağlama uygun yeni içerik üretebilmeleri</strong> ve çok adımlı
        muhakeme gerektiren problemleri çözebilmeleridir.
    </p>
    <p class="small mb-0">
        Google Gemini, bu yaklaşımı ileri taşıyarak metin üretimi, mantıksal akıl
        yürütme, kod üretimi ve çok modlu (metin + görsel) veri işleme gibi
        karmaşık görevlerde yüksek performans sunmaktadır.
    </p>
</div>

<!-- 2. BÖLÜM -->
<div class="row g-4 mb-4">
    <div class="col-lg-6">
        <div class="feature-card">
            <span class="tag mb-1">Mimari</span>
            <h5>Neden Cihaz Üzerinde Çalışmaz?</h5>
            <p class="small">
                Gemini gibi büyük dil modelleri, yüksek hesaplama gücü ve bellek
                gereksinimleri nedeniyle mobil cihazların donanım kapasitesini aşar.
                Bu modellerin cihaz üzerinde çalıştırılması:
            </p>
            <ul class="small">
                <li>Yüksek batarya tüketimine,</li>
                <li>Aşırı bellek kullanımına,</li>
                <li>Kabul edilemez gecikmelere</li>
            </ul>
            <p class="small mb-0">
                yol açabileceğinden pratik değildir. Bu nedenle Gemini,
                <strong>bulut tabanlı bir API</strong> olarak sunulmaktadır.
            </p>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="feature-card">
            <span class="tag mb-1">API Yapısı</span>
            <h5>Gemini API Tabanlı Çalışma Mantığı</h5>
            <p class="small">
                Gemini API, istemci–sunucu temelli bir istek–yanıt modeli kullanır.
                Süreç şu adımlardan oluşur:
            </p>
            <ul class="small">
                <li>Kullanıcı girdisi mobil uygulama tarafından alınır,</li>
                <li>Bu girdi API aracılığıyla Gemini sunucularına gönderilir,</li>
                <li>Model girdiyi analiz eder ve uygun yanıtı üretir,</li>
                <li>Yanıt mobil uygulamaya geri döndürülür.</li>
            </ul>
            <p class="small mb-0">
                Bu yapı, mobil cihazın yalnızca istemci rolü üstlenmesini sağlar
                ve yoğun hesaplama yükünü tamamen bulut tarafına taşır.
            </p>
        </div>
    </div>
</div>

<!-- 3. BÖLÜM -->
<div class="feature-card mb-4">
    <span class="tag mb-1">Flutter Entegrasyonu</span>
    <h4>Flutter Uygulamalarında Gemini API Kullanımı</h4>
    <p class="small">
        Flutter tabanlı mobil uygulamalarda Gemini API entegrasyonu, genellikle
        HTTP tabanlı istek–yanıt mekanizması üzerinden gerçekleştirilir.
        Kullanıcıdan alınan metin girdileri API’ye gönderilir ve üretilen yanıtlar
        Flutter arayüz bileşenleri aracılığıyla kullanıcıya sunulur.
    </p>
    <p class="small">
        Bu yaklaşım sayesinde Flutter uygulamaları:
    </p>
    <ul class="small">
        <li>Yüksek hesaplama gerektiren işlemleri cihaz üzerinde yapmaz,</li>
        <li>Performans ve batarya verimliliğini korur,</li>
        <li>Güncel model sürümlerine uygulama güncellemeden erişebilir.</li>
    </ul>
    <p class="small mb-0">
        Bu projede geliştirilen <strong>Canlı Chatbot</strong> modülü,
        Gemini API’nin Flutter benzeri istemci mimarisiyle nasıl
        entegre edilebileceğini uygulamalı olarak göstermektedir.
    </p>
</div>

<!-- 4. BÖLÜM -->
<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="feature-card">
            <span class="tag mb-1">Kullanım Alanları</span>
            <h5>Gemini API ile Neler Yapılabilir?</h5>
            <ul class="small mb-0">
                <li>Akıllı sohbet botları ve dijital asistanlar</li>
                <li>Metin üretimi, özetleme ve yeniden yazma</li>
                <li>Eğitim uygulamalarında açıklama ve rehberlik</li>
                <li>Kod üretimi ve kod açıklama sistemleri</li>
                <li>Mantıksal akıl yürütme gerektiren görevler</li>
            </ul>
        </div>
    </div>

    <div class="col-md-6">
        <div class="feature-card">
            <span class="tag mb-1">On-Device ML ile İlişki</span>
            <h5>Hibrit Yapay Zekâ Yaklaşımı</h5>
            <p class="small">
                Mobil uygulamalarda Gemini API, genellikle TensorFlow Lite gibi
                on-device çözümlerle birlikte kullanılır.
            </p>
            <p class="small mb-0">
                Gerçek zamanlı ve gizlilik odaklı görevler cihaz üzerinde
                gerçekleştirilirken; metin üretimi, özetleme ve muhakeme gibi
                karmaşık işlemler Gemini API üzerinden yürütülür.
                Bu hibrit yapı, performans ve işlevsellik arasında dengeli
                bir çözüm sunar.
            </p>
        </div>
    </div>
</div>

<!-- CTA -->
<div class="detail-cta-wrapper">
    <div class="detail-cta-card">
        <h3>Gemini API &amp; On-Device ML Karşılaştırmasını Görmek İster misiniz?</h3>
        <p>
            Bir sonraki bölümde Google Gemini API ile TensorFlow Lite tabanlı
            on-device makine öğrenmesi yaklaşımları; performans, gizlilik ve
            kullanım senaryoları açısından karşılaştırmalı olarak ele alınmaktadır.
        </p>

        <a href="karsilastirma.php" class="btn-detail-cta">
            Karşılaştırmalı Analize Geç →
        </a>
    </div>
</div>

<?php include 'partials/footer.php'; ?>