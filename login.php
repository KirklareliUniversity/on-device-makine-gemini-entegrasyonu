<?php
require_once 'db.php';
include 'partials/header.php';
// Hata mesajlarını tutmak için dizi
$errors = [];
/*
 FORM GÖNDERİLDİ Mİ?
 Kullanıcı giriş formunu gönderdiğinde çalışır.
*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Formdan gelen veriler
    $email = trim($_POST['email'] ?? '');
    $pass = $_POST['password'] ?? '';
    // Boş alan kontrolü
    if ($email === '' || $pass === '') {
        $errors[] = "E-posta ve şifre zorunludur.";
    } else {
        // Veritabanı bağlantısı
        $db = getDB();
        // Kullanıcıyı e-posta üzerinden bul
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        /*
        ŞİFRE DOĞRULAMA
           password_verify ile hash'li şifre kontrol edilir
          */
        if ($user && password_verify($pass, $user['password_hash'])) {
            // Giriş başarılı → session oluştur
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
            ];
            // Canlı demo sayfasına yönlendir
            header('Location: chat.php');
            exit;
        } else {
            $errors[] = "E-posta veya şifre hatalı.";
        }
    }
}
?>
<!-- GİRİŞ SAYFASI -->
<div class="login-page">
    <div class="login-card">

        <!-- ÜST BAŞLIK -->
        <div class="login-header">

            <h2 class="login-title">Giriş Yap</h2>


        </div>

        <!-- KAYIT BAŞARILI -->
        <?php if (isset($_GET['registered'])): ?>
            <div class="alert alert-success small mb-2">
                ✅ Kayıt başarıyla oluşturuldu, şimdi giriş yapabilirsiniz.
            </div>
        <?php endif; ?>

        <!-- HATALAR -->
        <?php if ($errors): ?>
            <div class="alert alert-danger small mb-2">
                <?php foreach ($errors as $e): ?>
                    <div><?= htmlspecialchars($e) ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- FORM -->
        <form method="post">
            <div class="form-group">
                <label>E-posta</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Şifre</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn-login">
                Giriş Yap
            </button>
        </form>

        <!-- ALT -->
        <div class="login-footer">
            Hesabın yok mu?
            <a href="register.php">Kayıt Ol</a>
        </div>

    </div>
</div>

<?php include 'partials/footer.php'; ?>