<?php include 'partials/header.php'; ?>

<div class="hero mb-4">
    <h2 class="hero-title mb-2">Nasıl Yapıldı?</h2>
    <p class="hero-sub">
        Bu sayfa, projenin geliştirme sürecinde izlenen teknik yaklaşımı,
        alınan mimari kararları ve kullanılan teknolojilerin neden tercih
        edildiğini açıklamaktadır. Anlatım, uygulanan bileşenler ile
        kavramsal olarak ele alınan yaklaşımları açık biçimde ayırmaktadır.
    </p>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="feature-card">
            <span class="tag mb-1">Yaklaşım</span>
            <h5>Hibrit Yapay Zekâ Mimarisi</h5>
            <p class="small">
                Proje planlama aşamasında, mobil yapay zekâ uygulamalarında
                tek bir yaklaşımın her senaryo için yeterli olmadığı görülmüştür.
                Bu nedenle cihaz içi makine öğrenmesi (on-device ML) ve
                bulut tabanlı büyük dil modellerinin birlikte ele alındığı
                hibrit bir mimari yaklaşım benimsenmiştir.
            </p>
            <p class="small mb-0">
                Bu yaklaşımda amaç; gizlilik ve hız gerektiren işlemler ile
                yüksek hesaplama gücü isteyen işlemleri birbirinden ayırarak
                daha dengeli ve gerçekçi bir sistem tasarlamaktır.
            </p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="feature-card">
            <span class="tag mb-1">Uygulama</span>
            <h5>Gerçekleştirilen Bileşenler</h5>
            <ul class="small">
                <li>Web tabanlı kullanıcı arayüzü PHP ile geliştirilmiştir.</li>
                <li>Metin üretimi ve açıklama işlemleri Gemini API ile yapılmıştır.</li>
                <li>Kullanıcı–yapay zekâ etkileşimi API tabanlı yapı üzerinden sağlanmıştır.</li>
            </ul>
            <p class="small mb-0">
                Projede doğrudan uygulanan yapay zekâ bileşeni Google Gemini API’dir.
            </p>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="feature-card">
            <span class="tag mb-1">On-Device ML</span>
            <h5>TensorFlow Lite Yaklaşımı (Kavramsal)</h5>
            <p class="small">
                TensorFlow Lite, mobil cihazlarda çalışması gereken
                makine öğrenmesi modelleri için optimize edilmiş bir
                on-device çözüm sunmaktadır. Bu proje kapsamında
                TensorFlow Lite doğrudan uygulanmamıştır.
            </p>
            <ul class="small">
                <li>Gerçek zamanlı ve gizlilik gerektiren işlemler için uygundur.</li>
                <li>Kamera ve sensör verilerinin cihaz dışına çıkmadan işlenmesini hedefler.</li>
                <li>Düşük gecikme ve çevrimdışı çalışma avantajı sunar.</li>
            </ul>
            <p class="small mb-0">
                TensorFlow Lite bu projede, on-device makine öğrenmesi
                yaklaşımını temsil eden <strong>kavramsal bir referans</strong>
                olarak ele alınmıştır.
            </p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="feature-card">
            <span class="tag mb-1">Bulut AI</span>
            <h5>Google Gemini API Kullanımı</h5>
            <p class="small">
                Google Gemini API, büyük dil modellerinin mobil ve web
                uygulamalarına entegre edilmesini sağlayan bulut tabanlı
                bir yapıdır. Model, yüksek hesaplama gereksinimleri
                nedeniyle doğrudan cihaz üzerinde çalıştırılmamaktadır.
            </p>
            <ul class="small">
                <li>Kullanıcı girdileri API aracılığıyla sunucuya gönderilir.</li>
                <li>Metin üretimi ve muhakeme Gemini sunucularında yapılır.</li>
                <li>Üretilen yanıtlar uygulama arayüzünde gösterilir.</li>
            </ul>
            <p class="small mb-0">
                Bu yöntem sayesinde cihazın donanım sınırları aşılmadan
                gelişmiş dil modeli yetenekleri kullanılabilmiştir.
            </p>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-12">
        <div class="feature-card">
            <span class="tag mb-1">Platform</span>
            <h5>Flutter’ın Projedeki Konumu</h5>
            <p class="small">
                Proje teknik olarak PHP tabanlı bir web uygulaması olarak
                geliştirilmiştir. Flutter ile doğrudan bir mobil uygulama
                geliştirilmemiştir.
            </p>
            <p class="small">
                Ancak Flutter, TensorFlow Lite ve Google Gemini API’nin
                birlikte kullanılabileceği <strong>hedef mobil platform</strong>
                olarak ele alınmıştır. Bu nedenle entegrasyon senaryoları
                araştırma ve mimari tasarım düzeyinde değerlendirilmiştir.
            </p>
            <p class="small mb-0">
                Flutter bu projede, uygulanan bir teknoloji değil;
                mobil yapay zekâ entegrasyonlarını incelemek için
                kullanılan bir <strong>araştırma ve referans platformu</strong>
                olarak konumlandırılmıştır.
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="feature-card">
            <span class="tag mb-1">Sonuç</span>
            <h5>Genel Değerlendirme</h5>
            <p class="small mb-0">
                Proje sonucunda, cihaz içi makine öğrenmesi ve bulut tabanlı
                büyük dil modellerinin farklı ihtiyaçlara hitap ettiği,
                çoğu senaryoda ise birbirini tamamlayıcı şekilde
                kullanılmasının daha uygun olduğu görülmüştür.
                Bu çalışma, mobil yapay zekâ sistemleri için hibrit
                mimarilerin önemini ortaya koymaktadır.
            </p>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>