<!DOCTYPE html>  //會員專區顯示，顯示使用者資訊
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8" />
  <title>會員專區</title>
  <style>
    body {
      font-family: "微軟正黑體";
      background-color: #f5f7f5;
      text-align: center;
      padding: 3rem;
    }
    .profile {
      display: inline-block;
      background: white;
      padding: 2rem;
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #7a9e7e;
      margin-bottom: 1rem;
    }
    h2 { color: #333; }
    p { margin: 0.5rem 0; }
    a {
      display: inline-block;
      margin-top: 1rem;
      background-color: #7a9e7e;
      color: white;
      padding: 0.6rem 1.5rem;
      border-radius: 8px;
      text-decoration: none;
    }
    a:hover { background-color: #557a55; }
  </style>
</head>
<body>
  <div class="profile">
    <img id="avatar" src="images/default_avatar.png" alt="頭像">
    <h2 id="username"></h2>
    <p id="email"></p>
    <a href="index.php">回首頁</a>
  </div>

  <script>
    const currentUser = JSON.parse(localStorage.getItem("currentUser"));
    if (!currentUser) {
      alert("尚未登入！");
      window.location.href = "login.html";
    } else {
      document.getElementById("username").textContent = currentUser.username;
      document.getElementById("email").textContent = currentUser.email;
      if (currentUser.avatar) {
        document.getElementById("avatar").src = currentUser.avatar;
      }
    }
  </script>
</body>
</html>
