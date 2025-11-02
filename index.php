<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>一畝田園生活美食</title>
<style>
    body {
        font-family: "微軟正黑體", Arial, sans-serif;
        margin: 0; padding: 0;
        background-color: #faf8f4;
        color: #333;
    }
    header {
        background-color: #7a9e7e;
        color: white;
        padding: 1.5rem 1rem;
        text-align: center;
        font-size: 2rem;
        font-weight: bold;
        position: relative;
    }

    /* 管理與 QRCode 按鈕區 */
    .top-tools {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 1rem;
        margin: 1rem 0;
    }
    .top-tools a {
        display: inline-block;
        color: white;
        font-weight: bold;
        font-size: 1.1rem;
        text-decoration: none;
        padding: 0.7rem 1.5rem;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        transition: background-color 0.3s;
    }
    .btn-green {
        background-color: #557a55;
    }
    .btn-green:hover {
        background-color: #3f5b39;
    }
    .btn-blue {
        background-color: #3498db;
    }
    .btn-blue:hover {
        background-color: #217dbb;
    }

    nav {
        background-color: #a9be9e;
        display: flex;
        justify-content: center;
        gap: 2rem;
        padding: 1rem 0;
        font-size: 1.1rem;
        flex-wrap: wrap;
    }
    nav a {
        color: #fff;
        text-decoration: none;
        font-weight: 600;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        transition: background-color 0.3s;
    }
    nav a:hover { background-color: #7a9e7e; }

    main {
        max-width: 960px;
        margin: 2rem auto;
        padding: 0 1rem;
    }

    .features {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
        justify-content: space-around;
    }
    .feature-item {
        background-color: white;
        box-shadow: 0 0 10px rgba(122,158,126,0.2);
        border-radius: 8px;
        padding: 1rem;
        width: 280px;
        text-align: center;
    }
    .feature-item img {
        max-width: 100%;
        border-radius: 6px;
        margin-bottom: 0.8rem;
    }
    .feature-item h3 { margin-bottom: 0.5rem; color: #557a55; }

    #contact-info div { margin-bottom: 1rem; }

    footer {
        background-color: #7a9e7e;
        color: white;
        text-align: center;
        padding: 1rem;
        font-size: 0.9rem;
    }

    /* RWD 小螢幕優化 */
    @media (max-width: 600px) {
        header { font-size: 1.6rem; }
        nav { gap: 1rem; flex-direction: column; }
        .features { flex-direction: column; align-items: center; }
        .top-tools a { font-size: 1rem; width: 80%; text-align: center; }
    }

    .user-welcome {
        margin-top: 0.5rem;
        text-align: center;
        color: #fff;
        font-weight: 600;
        font-size: 1rem;
    }
    .user-welcome a {
        color: #fff;
        margin: 0 0.5rem;
        text-decoration: underline;
    }
</style>
</head>
<body>

<header>
    一畝田園生活美食
    <div id="userArea" class="user-welcome"></div>
</header>

<div class="top-tools">
    <a href="reservation_form.html" class="btn-green">立即線上訂位</a>
    <a href="adminLogin.html" class="btn-green">管理區</a>
    <a href="qrcode.php" class="btn-blue">📱 產生 QR Code</a>
</div>

<nav>
    <a href="#intro">關於我們</a>
    <a href="#features">特色餐點</a>
    <a href="#contact-info">聯絡資訊</a>
    <a href="#map">地圖位置</a>
</nav>

<main>
    <section id="intro">
        <h2>關於我們</h2>
        <p class="intro">
            一畝田園生活美食坐落於台南安南區，提供您自然健康的美味佳餚，讓您在舒適的環境中享受家鄉味與純粹的幸福感。
        </p>
    </section>

    <section id="features">
        <h2>特色餐點</h2>
        <div class="features">
            <div class="feature-item">
                <img src="a3.jpg" alt="一畝田套餐" />
                <h3>一畝田套餐</h3>
                <p>多樣季節蔬菜與當地食材，健康又美味，適合家庭共享。</p>
            </div>
            <div class="feature-item">
                <img src="a2.jpg" alt="宮保蝦仁" />
                <h3>宮保蝦仁</h3>
                <p>香辣帶勁的宮保醬汁，搭配彈牙鮮蝦，酸甜微辣，開胃下飯。</p>
            </div>
            <div class="feature-item">
                <img src="a1.jpg" alt="三杯雞套餐" />
                <h3>三杯雞套餐</h3>
                <p>香氣四溢，醬汁濃郁，是招牌下飯佳餚。</p>
            </div>
        </div>
    </section>

    <section id="contact-info">
        <h2>聯絡資訊</h2>
        <div>
            <h4>營業時間</h4>
            <p>11:00 - 14:00、17:00 - 21:00（週一公休）</p>
        </div>
        <div>
            <h4>地址</h4>
            <p>台南市安南區佃西一街38號</p>
        </div>
        <div>
            <h4>電話</h4>
            <p>06-2872230</p>
        </div>
    </section>

    <section id="map">
        <h2>地圖位置</h2>
        <iframe 
            src="https://www.google.com/maps?q=台南市安南區佃西一街38號&output=embed"
            width="100%"
            height="300"
            style="border:0; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);"
            allowfullscreen
            loading="lazy">
        </iframe>
    </section>
</main>

<footer>
    &copy; 2025 一畝田園生活美食．版權所有
</footer>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const userArea = document.getElementById("userArea");
    const loginBtn = document.getElementById("loginBtn");
    const currentUser = JSON.parse(localStorage.getItem("currentUser"));

    if (currentUser) {
        userArea.innerHTML = `
            歡迎，${currentUser.username} |
            <a href="member_home.php">會員專區</a> |
            <a href="#" id="logoutBtn">登出</a>
        `;
        if (loginBtn) loginBtn.style.display = "none";
        document.getElementById("logoutBtn").addEventListener("click", () => {
            localStorage.removeItem("currentUser");
            window.location.href = "logout.html";
        });
    } else {
        userArea.innerHTML = `
            <a href="login.html">會員登入</a> |
            <a href="register.html">註冊</a>
        `;
    }
});
</script>

</body>
</html>
