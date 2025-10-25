<?php
// qrcode_ips.php
include_once 'phpqrcode/qrlib.php';

// 取得所有本機 IP
$ips = [];
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    $output = shell_exec('ipconfig');
    preg_match_all('/IPv4.*?: ([0-9\.]+)/', $output, $matches);
    $ips = $matches[1];
} else {
    $output = shell_exec('hostname -I');
    $ips = preg_split('/\s+/', trim($output));
}

// 過濾迴圈位址
$ips = array_filter($ips, fn($ip) => $ip && $ip !== '127.0.0.1');
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
<meta charset="UTF-8">
<title>本機區域網 QR Code</title>
<style>
body { font-family: "微軟正黑體", sans-serif; background:#f0f0f0; text-align:center; }
.ip-card { display:inline-block; margin:20px; padding:20px; background:#fff; border-radius:12px; box-shadow:0 0 10px rgba(0,0,0,0.1);}
.ip-card img { margin-top:10px; width:200px; height:200px; }
</style>
</head>
<body>
<h1>📡 本機區域網 QR Code</h1>

<?php if(empty($ips)): ?>
    <p>未偵測到可用的區域網 IP</p>
<?php else: ?>
    <?php foreach($ips as $ip): 
        $url = "http://$ip/index.php"; 
        ob_start();
        QRcode::png($url, null, QR_ECLEVEL_L, 6);
        $qrData = base64_encode(ob_get_clean());
    ?>
    <div class="ip-card">
        <h3>IP：<?= $ip ?></h3>
        <p><a href="<?= $url ?>" target="_blank"><?= $url ?></a></p>
        <img src="data:image/png;base64,<?= $qrData ?>" alt="QR Code for <?= $ip ?>">
    </div>
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>
