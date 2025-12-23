<?php include 'partials/header.php'; ?>

<div class="hero mb-4">
    <h2 class="hero-title mb-2">On-Device ML vs Google Gemini API</h2>
    <p class="hero-sub">
        Bu bölümde, mobil yapay zekâ uygulamalarında kullanılan
        <strong>cihaz içi makine öğrenmesi</strong> ile
        <strong>bulut tabanlı büyük dil modelleri</strong>
        karşılaştırmalı olarak incelenmektedir.
    </p>
</div>
<!-- KARŞILAŞTIRMALI TABLO -->
<div class="feature-card mb-4">
    <h4 class="mb-3">Karşılaştırmalı Teknik Tablo</h4>

    <div class="table-responsive">
        <table class="table table-bordered align-middle comparison-table">
            <thead>
                <tr>
                    <th>Özellik</th>
                    <th>On-Device ML (TensorFlow Lite)</th>
                    <th>Google Gemini API</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Çalışma Ortamı</strong></td>
                    <td>Mobil cihazın kendi donanımı (CPU / GPU / NNAPI)</td>
                    <td>Bulut sunucuları (Google altyapısı)</td>
                </tr>
                <tr>
                    <td><strong>İnternet Gereksinimi</strong></td>
                    <td> Gerekmez</td>
                    <td> Zorunlu</td>
                </tr>
                <tr>
                    <td><strong>Gecikme Süresi</strong></td>
                    <td>Çok düşük (milisaniye seviyesinde)</td>
                    <td>Ağ gecikmesine bağlı</td>
                </tr>
                <tr>
                    <td><strong>Gizlilik</strong></td>
                    <td>Veri cihaz dışına çıkmaz</td>
                    <td>Veri API üzerinden sunucuya gönderilir</td>
                </tr>
                <tr>
                    <td><strong>Hesaplama Gücü</strong></td>
                    <td>Cihaz donanımıyla sınırlı</td>
                    <td>Çok yüksek (büyük ölçekli modeller)</td>
                </tr>
                <tr>
                    <td><strong>Model Boyutu</strong></td>
                    <td>Küçük ve optimize edilmiş</td>
                    <td>Milyarlarca parametre</td>
                </tr>
                <tr>
                    <td><strong>Tipik Kullanım</strong></td>
                    <td>Nesne tanıma, yüz tespiti, sensör analizi</td>
                    <td>Metin üretimi, sohbet botları, akıl yürütme</td>
                </tr>
                <tr>
                    <td><strong>Flutter Entegrasyonu</strong></td>
                    <td>Yerel plugin &amp; model dosyası</td>
                    <td>HTTP / REST API çağrıları</td>
                </tr>
                <tr>
                    <td><strong>Batarya Tüketimi</strong></td>
                    <td>Optimize edilmezse yüksek olabilir</td>
                    <td>Düşük (cihaz sadece istemci)</td>
                </tr>
                <tr>
                    <td><strong>Güncelleme</strong></td>
                    <td>Uygulama güncellemesi gerekir</td>
                    <td>Sunucu tarafında otomatik</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- SONUÇ VE DEĞERLENDİRME -->
<div class="feature-card">
    <span class="tag mb-1">Sonuç</span>
    <h4>Hangi Yaklaşım Ne Zaman Tercih Edilmeli?</h4>
    <p class="small">
        On-device makine öğrenmesi, gizlilik, düşük gecikme ve çevrimdışı çalışma
        gerektiren senaryolarda ideal bir çözümdür.
        Buna karşılık Google Gemini API, yüksek hesaplama gerektiren
        dil işleme ve muhakeme görevlerinde üstün performans sunar.
    </p>
    <p class="small mb-0">
        Modern mobil uygulamalarda bu iki yaklaşım genellikle
        <strong>birlikte (hibrit mimari)</strong> kullanılarak
        hem performans hem de işlevsellik açısından dengeli çözümler üretilmektedir.
    </p>
</div>

<?php include 'partials/footer.php'; ?>