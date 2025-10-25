<?php
session_start();
$name = $_SESSION['name'] ?? null;
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8">
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
            padding: 1.5rem 2rem;
            text-align: center;
            font-size: 2.2rem;
            font-weight: bold;
            position: relative;
        }
        nav {
            background-color: #a9be9e;
            display: flex;
            justify-content: center;
            gap: 2rem;
            padding: 1rem 0;
            font-size: 1.1rem;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        nav a:hover {
            background-color: #7a9e7e;
        }
        main {
            max-width: 960px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        section {
            margin-bottom: 3rem;
        }
        h2 {
            border-bottom: 2px solid #7a9e7e;
            padding-bottom: 0.5rem;
            margin-bottom: 1rem;
        }
        .intro {
            font-size: 1.2rem;
            line-height: 1.6;
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
        .feature-item h3 {
            margin-bottom: 0.5rem;
            color: #557a55;
        }
        #contact-info div {
            margin-bottom: 1rem;
        }
        footer {
            background-color: #7a9e7e;
            color: white;
            text-align: center;
            padding: 1rem 2rem;
            font-size: 0.9rem;
        }
        @media (max-width: 600px) {
            .features {
                flex-direction: column;
                align-items: center;
            }
            nav {
                flex-direction: column;
                gap: 1rem;
            }
        }

        /* 會員歡迎顯示 */
        .user-welcome {
            position: absolute;
            right: 1rem;
            top: 1.5rem;
            color: #fff;
            font-weight: 600;
            font-size: 1rem;
        }
        .user-welcome a {
            color: #fff;
            margin-left: 1rem;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        一畝田園生活美食
        <?php if ($name): ?>
            <div class="user-welcome">
                歡迎，<?= htmlspecialchars($name) ?> | 
                <a href="member_home.php">會員專區</a> | 
                <a href="logout.php">登出</a>
            </div>
        <?php else: ?>
            <div class="user-welcome">
                <a href="會員登入介面.html">會員登入</a> | 
                <a href="會員註冊.html">註冊</a>
            </div>
        <?php endif; ?>
    </header>

    <!-- 醒目的線上訂位按鈕 + 會員登入按鈕 -->
    <div style="text-align:center; margin: 1rem 0; display: flex; justify-content: center; gap: 1rem;">
      <a href="線上訂位.html" 
         style="
           display: inline-block;
           background-color: #557a55;
           color: white;
           padding: 0.75rem 2rem;
           font-size: 1.2rem;
           border-radius: 8px;
           font-weight: bold;
           text-decoration: none;
           box-shadow: 0 4px 8px rgba(85, 122, 85, 0.4);
           transition: background-color 0.3s;
         "
         onmouseover="this.style.backgroundColor='#3f5b39'"
         onmouseout="this.style.backgroundColor='#557a55'"
      >立即線上訂位</a>

      <?php if (!$name): ?>
      <a href="會員登入介面.html"
         style="
           display: inline-block;
           background-color: #3498db;
           color: white;
           padding: 0.75rem 2rem;
           font-size: 1.2rem;
           border-radius: 8px;
           font-weight: bold;
           text-decoration: none;
           box-shadow: 0 4px 8px rgba(52, 152, 219, 0.4);
           transition: background-color 0.3s;
         "
         onmouseover="this.style.backgroundColor='#217dbb'"
         onmouseout="this.style.backgroundColor='#3498db'"
      >會員登入</a>
      <?php endif; ?>
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
                    <img src="images/a3.jpg" alt="一畝田套餐" />
                    <h3>一畝田套餐</h3>
                    <p>多樣季節蔬菜與當地食材，健康又美味，適合家庭共享。</p>
                </div>
                <div class="feature-item">
                    <img src="images/a2.jpg" alt="宮保蝦仁" />
                    <h3>宮保蝦仁</h3>
                    <p>香辣帶勁的宮保醬汁，搭配彈牙鮮蝦，酸甜微辣，開胃下飯。</p>
                </div>
                <div class="feature-item">
                    <img src="images/a1.jpg" alt="三杯雞套餐" />
                    <h3>三杯雞套餐</h3>
                    <p>香氣四溢，醬汁濃郁，是招牌下飯佳餚。</p>
                </div>
            </div>
        </section>

        <section id="contact-info">
            <h2>聯絡資訊</h2>
            <div>
                <h4>營業時間</h4>
                <p>11:00 - 14:00、17:00 - 21:00，週一公休</p>
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
</body>
</html>