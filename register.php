<?php
require_once 'db.php';
include 'partials/header.php';

$errors = [];
$registered = false;
/*
 FORM GÖNDERİLDİ Mİ?
 Kullanıcı kayıt formunu gönderdiğinde çalışır.
*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Formdan gelen veriler
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pass = $_POST['password'] ?? '';
    // Boş alan kontrolü
    if ($name === '' || $email === '' || $pass === '') {
        $errors[] = "Tüm alanlar zorunludur.";
    } elseif (strlen($pass) < 6) {
        $errors[] = "Şifre en az 6 karakter olmalıdır.";
    } else {
        $db = getDB();

        // e-posta kontrol
        $check = $db->prepare("SELECT id FROM users WHERE email = ?");
        $check->execute([$email]);

        if ($check->fetch()) {
            $errors[] = "Bu e-posta zaten kayıtlı.";
        } else {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $stmt = $db->prepare(
                "INSERT INTO users (name, email, password_hash) VALUES (?, ?, ?)"
            );
            $stmt->execute([$name, $email, $hash]);
            $registered = true;
        }
    }
}
?>

<div class="login-page">
    <div class="login-card">

        <!-- ÜST -->
        <div class="login-header">

            <h2 class="login-title">Kayıt Ol</h2>

        </div>

        <!-- BAŞARILI -->
        <?php if ($registered): ?>
            <div class="alert alert-success text-center small mb-3">
                <strong>Kayıt başarıyla oluşturuldu!</strong><br>
                Artık giriş yapabilirsin
            </div>

            <a href="login.php" class="btn-login" style="text-decoration:none;">
                Giriş Yap
            </a>
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
        <?php if (!$registered): ?>
            <form method="post">
                <div class="form-group">
                    <label>Ad Soyad</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>E-posta</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Şifre</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button type="submit" class="btn-login">
                    Kayıt Ol
                </button>
            </form>
        <?php endif; ?>

        <!-- ALT -->
        <div class="login-footer">
            Zaten hesabın var mı?
            <a href="login.php">Giriş Yap</a>
        </div>

    </div>
</div>

<?php if ($registered): ?>

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <script>
        const duration = 2200;
        const end = Date.now() + duration;

        (function frame() {
            confetti({
                particleCount: 6,
                angle: 60,
                spread: 70,
                origin: { x: 0 }
            });
            confetti({
                particleCount: 6,
                angle: 120,
                spread: 70,
                origin: { x: 1 }
            });

            if (Date.now() < end) {
                requestAnimationFrame(frame);
            }
        })();
    </script>
<?php endif; ?>

<?php include 'partials/footer.php'; ?>