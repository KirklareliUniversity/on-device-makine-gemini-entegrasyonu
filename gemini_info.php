<?php include 'partials/header.php'; ?>

<div class="hero mb-4">
    <h2 class="hero-title mb-2">Google Gemini API &amp; Bulut Tabanlı Büyük Dil Modelleri</h2>
    <p class="hero-sub">
        Bu bölümde, araştırma raporunda ele alınan <strong>Google Gemini büyük dil modeli</strong>
        ve <strong>API tabanlı mimari yaklaşımı</strong> özetlenmektedir.
        Amaç, Gemini’nin neden cihaz üzerinde değil bulut ortamında çalıştığını ve
        mobil uygulamalara nasıl entegre edildiğini açıklamaktır.
    </p>
</div>

<div class="row g-4 mb-4">
    <div class="col-lg-7">
        <div class="feature-card">
            <span class="tag mb-1">Teori</span>
            <h5>Büyük Dil Modelleri (LLM) Kısaca</h5>
            <p class="small">
                Büyük dil modelleri (LLM), milyarlarca parametre içeren derin sinir ağı
                mimarilerine dayanmaktadır. Geniş ölçekli veri kümeleri üzerinde
                eğitilerek dilin anlamsal yapısını, sözdizimsel ilişkilerini ve bağlam
                bilgisini öğrenebilirler.
            </p>
            <ul class="small">
                <li>Sorulara bağlamı dikkate alarak tutarlı yanıtlar üretir,</li>
                <li>Metin özetleme, yeniden yazma ve çeviri gibi görevleri yerine getirir,</li>
                <li>Çok adımlı muhakeme gerektiren problemleri çözebilir.</li>
            </ul>
            <p class="small mb-0">
                Google Gemini, bu LLM ailesinin modern bir temsilcisi olup
                metin ve görsel gibi çok modlu girdileri destekleyebilmektedir.
            </p>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="feature-card">
            <span class="tag mb-1">Neden Bulutta?</span>
            <h5>API Tabanlı Mimari</h5>
            <p class="small">
                Gemini modelleri, yüksek hesaplama gücü ve bellek gereksinimleri
                nedeniyle mobil cihazların donanım kapasitesini aşmaktadır.
                Bu sebeple model, doğrudan cihazda çalıştırılmak yerine
                <strong>bulut ortamında</strong> barındırılmaktadır.
            </p>
            <ul class="small">
                <li>Mobil uygulama, kullanıcı girdisini API aracılığıyla sunucuya gönderir.</li>
                <li>Gemini modeli sunucu tarafında girdiyi işler ve yanıt üretir.</li>
                <li>Üretilen çıktı JSON formatında uygulamaya geri iletilir.</li>
            </ul>
            <p class="small mb-0">
                Bu yapı sayesinde mobil cihaz yalnızca istemci rolünü üstlenirken,
                yoğun hesaplama süreçleri güçlü sunucu altyapısında gerçekleştirilir.
            </p>
        </div>
    </div>
</div>

<div class="row g-4 mb-5">
    <div class="col-md-4">
        <div class="feature-card">
            <span class="tag mb-1">Kullanım Alanı</span>
            <h5>Metin Üretimi &amp; Özetleme</h5>
            <p class="small mb-0">
                Eğitim içerikleri oluşturma, açıklayıcı metinler üretme ve uzun
                dokümanlardan özet çıkarma gibi görevler Gemini API’nin yaygın
                kullanım alanları arasındadır.
            </p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="feature-card">
            <span class="tag mb-1">Kullanım Alanı</span>
            <h5>Sohbet Botları</h5>
            <p class="small mb-0">
                Doğal dilde etkileşim kurabilen müşteri hizmetleri botları,
                kişisel asistanlar ve bilgi tabanlı danışma sistemleri
                Gemini API kullanılarak geliştirilebilir.
            </p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="feature-card">
            <span class="tag mb-1">Kullanım Alanı</span>
            <h5>Eğitim &amp; Kodlama</h5>
            <p class="small mb-0">
                Kod üretimi, kod açıklama, hata tespiti ve örnek problem çözümü
                gibi süreçlerde Gemini API destekleyici bir araç olarak
                kullanılabilmektedir.
            </p>
        </div>
    </div>
</div>

<!-- DETAY CTA -->
<div class="row">
    <div class="col-12">
        <div class="detail-cta-wrapper">
            <div class="detail-cta-card">
                <h3>Google Gemini API’yi Daha Detaylı İncelemek İster misiniz?</h3>
                <p>
                    Bu sayfada Gemini API’nin temel yapısı ve mobil uygulamalardaki
                    rolü özetlenmiştir. Büyük dil modellerinin mimarisi,
                    Flutter entegrasyonu ve On-Device ML ile karşılaştırmalı
                    analizi detaylı biçimde incelemek için devam edebilirsiniz.
                </p>

                <?php if (isset($_SESSION['user'])): ?>
                    <a href="gemini_detay.php" class="btn-detail-cta">
                        Gemini API Detaylı Anlatım →
                    </a>
                <?php else: ?>
                    <a href="login.php" class="btn-detail-cta">
                        Detayları görmek için giriş yap →
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>