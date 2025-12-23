<?php
// Veritabanı bağlantısı ve Gemini API fonksiyonları
require_once 'db.php';
require_once 'gemini.php';
// Ortak header (session + navbar)
include 'partials/header.php';

// Giriş kontrolü
// Bu sayfa yalnızca giriş yapmış kullanıcılar tarafından kullanılabilir.Kullanıcı giriş yapmamışsa uyarı gösterilir ve işlem sonlandırılır.
if (!isset($_SESSION['user'])) {
    echo '<div class="alert alert-warning">Canlı demoyu kullanmak için önce giriş yapmalısınız.</div>';
    echo '<a href="login.php" class="btn btn-primary btn-sm">Giriş Yap</a>';
    include 'partials/footer.php';
    exit;
}
// Giriş yapan kullanıcı bilgileri
$userId = $_SESSION['user']['id'];
$db = getDB();
// Durum değişkenleri
$errors = [];
$justPosted = false;
$postedMessage = '';

/*

FORM POST İŞLEMLERİ
 Kullanıcı mesaj gönderdiğinde:
1. Mesaj veritabanına kaydedilir
 2. Gemini API'ye prompt gönderilir
 3. Asistan cevabı tekrar veritabanına yazılır
*/
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postedMessage = trim($_POST['message'] ?? '');

    if ($postedMessage !== '') {
        $justPosted = true;

        // Kullanıcı mesajını kaydet
        $stmt = $db->prepare("INSERT INTO messages (user_id, role, content) VALUES (?, 'user', ?)");
        $stmt->execute([$userId, $postedMessage]);

        // Gemini sistem promptu 
        $systemPrompt = "Sen Flutter'da On-Device ML (TensorFlow Lite) ve Google Gemini API "
            . "üzerine çalışan teknik bir asistansın. Cevaplarını kısa, anlaşılır ve öğrencinin hazırladığı "
            . "bir proje sunumuna uygun şekilde ver.";
        $fullPrompt = $systemPrompt . "\n\nKullanıcı: " . $postedMessage;
        // Gemini API çağrısı
        $reply = gemini_generate($fullPrompt);

        // Asistan cevabını kaydet
        $stmt = $db->prepare("INSERT INTO messages (user_id, role, content) VALUES (?, 'assistant', ?)");
        $stmt->execute([$userId, $reply]);
    }
}

/*
 MESAJLARI ÇEK
 Kullanıcıya ait tüm mesajlar kronolojik olarak listelenir.
*/
$stmt = $db->prepare("SELECT role, content FROM messages WHERE user_id = ? ORDER BY id ASC");
$stmt->execute([$userId]);
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Son asistan mesajının index'ini bul (animasyon için)
$lastBotKey = null;
foreach ($messages as $i => $m) {
    if ($m['role'] === 'assistant') {
        $lastBotKey = $i;
    }
}
?>

<!-- SAYFA BAŞI METİN -->
<div class="hero mb-4">
    <h2 class="hero-title mb-2">Gemini Tabanlı Chatbot</h2>
    <p class="hero-sub">
        Bu ekran, araştırma konusunun uygulama kısmını gösterir. Kullanıcı mesajları PHP &amp; MySQL üzerinde tutulur,
        cevaplar Google Gemini API üzerinden üretilir. Böylece hem <strong>auth + veritabanı</strong>, hem de
        <strong>büyük dil modeli entegrasyonu</strong> birlikte sergilenmiş olur.
    </p>
</div>

<div class="row g-4" id="chat-section">
    <!-- SOL KOLON: Asistan kartı + sohbet -->
    <div class="col-lg-7">

        <!-- GEMINI ASİSTAN KARTI -->
        <div class="feature-card mb-3">
            <div style="display:flex; gap:15px; align-items:center;">
                <div style="width:56px;height:56px;border-radius:18px;background:#fff;
                            display:flex;align-items:center;justify-content:center;
                            box-shadow:0 6px 18px rgba(0,0,0,0.06);">
                    <span style="font-size:30px;">🤖</span>
                </div>
                <div>
                    <div style="font-weight:700;font-size:0.95rem;">Gemini Asistan Hazır</div>
                    <div style="font-size:0.85rem;color:#4b5563;">
                        Flutter, TensorFlow Lite ve Google Gemini API hakkında sorular sorabilirsin.
                    </div>
                    <div style="color:#16a34a;font-size:0.8rem;margin-top:3px;">
                        ● Bağlantı aktif: PHP + MySQL + Gemini API entegre
                    </div>
                </div>
                <button id="btnStartChat" class="btn-ask-gemini" style="margin-left:auto;">
                    Sohbete Başla
                </button>
            </div>
        </div>

        <!-- SOHBET ALANI -->
        <div class="feature-card chat-scroll mb-3" id="chatBox">
            <?php if (empty($messages)): ?>
                <p class="small text-muted mb-0">
                    Henüz bir mesaj yok. Aşağıdaki alana bir soru yazarak başlayabilirsiniz.
                    Örneğin: <em>“TensorFlow Lite ile on-device ve Gemini API arasındaki fark ne?”</em>
                </p>
            <?php else: ?>
                <?php foreach ($messages as $i => $msg): ?>
                    <?php if ($msg['role'] === 'user'): ?>
                        <div class="mb-1 text-end">
                            <div class="badge bg-info text-dark mb-1">Siz</div>
                            <div class="msg-user">
                                <?= nl2br(htmlspecialchars($msg['content'])) ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <?php $isLastBot = ($i === $lastBotKey); ?>
                        <div class="mb-1">
                            <div class="badge bg-purple mb-1">Gemini</div>
                            <div class="msg-bot <?= $isLastBot ? 'bot-last' : '' ?>">
                                <?= nl2br(htmlspecialchars($msg['content'])) ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- MESAJ FORMU -->
        <form method="post" class="feature-card" id="askForm">
            <label class="form-label small mb-1">Sorunuz / Mesajınız</label>
            <textarea id="chatTextarea" name="message" class="form-control chat-input" rows="3"
                placeholder="Örn: Flutter'da TensorFlow Lite ile kamera tabanlı nesne tanıma nasıl çalışır?"><?= htmlspecialchars($postedMessage) ?></textarea>

            <div class="form-bottom-area">
                <div class="small text-muted">
                    Mesajlarınız sadece bu proje kapsamında <strong>ai_chat</strong> veritabanında saklanır.
                </div>
                <button type="submit" class="btn-ask-gemini" id="btnSendGemini">
                    Gönder
                </button>
            </div>
        </form>
    </div>

    <!-- SAĞ KOLON: Hazır sorular + teknik not -->
    <div class="col-lg-5">
        <div class="feature-card mb-3">
            <span class="tag mb-1">Hazır Sorular</span>
            <h5>Örnek Prompt Önerileri</h5>
            <ul class="small mb-0">
                <li>“On-device ML ile sunucu taraflı ML arasındaki temel farklar neler?”</li>
                <li>“TensorFlow Lite kullanarak mobilde nesne tanıma yapmanın avantajları nedir?”</li>
                <li>“Gemini API ile Flutter uygulamasında metin üretim özelliği nasıl kurgulanabilir?”</li>
                <li>“On-device TFLite modeli ile buluttaki Gemini modelini birlikte kullanmak için örnek bir senaryo
                    anlat.”</li>
            </ul>
        </div>

        <div class="feature-card">
            <span class="tag mb-1">Teknik Not</span>
            <h5>Bu Sayfa Rubrikte Neyi Gösteriyor?</h5>
            <ul class="small mb-0">
                <li><strong>A. Konunun Uygulamalı Kanıtı:</strong> Gemini entegrasyonu ve mesaj kayıt yapısı.</li>
                <li><strong>B. Temel İşlevsellik:</strong> Stabil çalışan bir sohbet modülü.</li>
                <li><strong>C. Auth &amp; Güvenlik:</strong> Sadece giriş yapan kullanıcıların erişebilmesi.</li>
                <li><strong>D. Kod Kalitesi:</strong> PDO, prepared statement, basit katmanlı mimari.</li>
            </ul>
        </div>
    </div>
</div>

<!-- SAYFA ÖZEL JS 
 Bu sayfada JavaScript yalnızca kullanıcı deneyimini iyileştirmek amacıyla kullanılmıştır. JavaScript tarafında herhangi bir iş mantığı veya veri işleme süreci bulunmamaktadır. Tüm temel işlemler PHP üzerinden yürütülmektedir.-->

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const chatBox = document.getElementById("chatBox");
        const btnStart = document.getElementById("btnStartChat");
        const textarea = document.getElementById("chatTextarea");
        const sendBtn = document.getElementById("btnSendGemini");
        const form = document.getElementById("askForm");

        // PHP'den flag: az önce post yapıldı mı?
        const justPosted = <?php echo $justPosted ? 'true' : 'false'; ?>;

        // Sohbet kutusunu her zaman en alta kaydır
        if (chatBox) {
            chatBox.scrollTop = chatBox.scrollHeight;
        }

        // Az önce soru sorulduysa, genel sayfa da en alta insin
        if (justPosted) {
            window.scrollTo({ top: document.body.scrollHeight, behavior: "instant" });
        }

        // "Sohbete Başla" → textarea'ya odaklan + sayfayı aşağı indir
        if (btnStart && textarea) {
            btnStart.addEventListener("click", function () {
                textarea.focus();
                window.scrollTo({ top: document.body.scrollHeight, behavior: "smooth" });
            });
        }

        // Form gönderilirken butonda kısa "Gemini düşünüyor..." yazsın
        if (form && sendBtn) {
            form.addEventListener("submit", function (event) {
                if (textarea && textarea.value.trim() === "") {
                    alert("Lütfen bir soru yazın.");
                    event.preventDefault();
                    return;
                }
                sendBtn.disabled = true;
                sendBtn.textContent = "Gemini düşünüyor...";
            });
        }
    });
</script>

<?php include 'partials/footer.php'; ?>