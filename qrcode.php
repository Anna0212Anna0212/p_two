<?php
include_once 'phpqrcode/qrlib.php';

// 若使用者輸入網址，則產生 QRCode
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['url'])) {
    $url = trim($_POST['url']);

    // 暫存檔名（防止快取）
    $filename = 'qrcode_' . time() . '.png';

    // 產生 QRCode 圖片
    QRcode::png($url, $filename, QR_ECLEVEL_L, 6);
}
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>外網 QRCode 產生器</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="text-center mb-3">🌐 外網 QR Code 產生器</h3>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">輸入你的 ngrok 網址（例如 https://xxxx.ngrok.io/index.php）</label>
                <input type="text" name="url" class="form-control" placeholder="https://xxxx.ngrok.io/index.php" required>
            </div>
            <button type="submit" class="btn btn-success w-100">產生 QR Code</button>
        </form>

        <?php if (!empty($filename)): ?>
            <div class="text-center mt-4">
                <h5>📱 掃描以下 QR Code 進入網站：</h5>
                <img src="<?php echo $filename; ?>" alt="QR Code" class="img-fluid mt-2" style="max-width:250px;">
                <p class="mt-3"><a href="<?php echo htmlspecialchars($url); ?>" target="_blank"><?php echo htmlspecialchars($url); ?></a></p>
            </div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
