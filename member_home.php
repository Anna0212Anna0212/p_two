<?php
// member_home.php
session_start();
?>
<!DOCTYPE html> 
<html lang="zh-Hant-TW">
<head>
<meta charset="UTF-8">
<title>會員專區</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { font-family: "微軟正黑體", sans-serif; padding: 2rem; background:#f0f0f0; }
.card { max-width:600px; margin:auto; padding:2rem; border-radius:12px; box-shadow:0 0 15px rgba(0,0,0,0.1); background:white; }
label { font-weight:600; }
button { margin-top:1rem; }
</style>
</head>
<body>
<div class="card">
    <h2 class="text-center mb-4">會員專區 - 修改資料</h2>
    <form id="updateForm">
        <div class="mb-3">
            <label>帳號：</label>
            <input type="text" id="username" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label>姓名：</label>
            <input type="text" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email：</label>
            <input type="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>電話：</label>
            <input type="text" id="phone" class="form-control" placeholder="例如: 0912345678" required>
        </div>
        <div class="mb-3">
            <label>生日：</label>
            <input type="date" id="birthday" class="form-control">
        </div>
        <div class="mb-3">
            <label>性別：</label>
            <select id="gender" class="form-select">
                <option value="">請選擇</option>
                <option value="男">男</option>
                <option value="女">女</option>
            </select>
        </div>
        <div class="mb-3">
            <label>頭像：</label>
            <input type="file" id="avatar" accept="image/*" class="form-control">
            <img id="avatarPreview" src="" style="max-width:100px; margin-top:10px; display:none;" />
        </div>
        <button type="submit" class="btn btn-primary w-100">更新資料</button>
        <button type="button" id="logoutBtn" class="btn btn-secondary w-100 mt-2">登出</button>
    </form>
</div>

<script>
// 讀取登入者資料
const currentUser = JSON.parse(localStorage.getItem("currentUser"));
if (!currentUser) {
    alert("尚未登入！");
    window.location.href = "login.html";
}

// 初始化表單
document.getElementById("username").value = currentUser.username;
document.getElementById("name").value = currentUser.name || "";
document.getElementById("email").value = currentUser.email || "";
document.getElementById("phone").value = currentUser.phone || "";
document.getElementById("birthday").value = currentUser.birthday || "";
document.getElementById("gender").value = currentUser.gender || "";
if (currentUser.avatar) {
    const img = document.getElementById("avatarPreview");
    img.src = currentUser.avatar;
    img.style.display = "block";
}

// 頭像預覽
document.getElementById("avatar").addEventListener("change", function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            currentUser.avatar = e.target.result;
            const img = document.getElementById("avatarPreview");
            img.src = e.target.result;
            img.style.display = "block";
        }
        reader.readAsDataURL(file);
    }
});

// 更新資料
document.getElementById("updateForm").addEventListener("submit", function(e){
    e.preventDefault();

    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const phone = document.getElementById("phone").value.trim();
    const birthday = document.getElementById("birthday").value;
    const gender = document.getElementById("gender").value;
    const avatar = currentUser.avatar || "";

    // ✅ 電話格式檢查
    const phoneRegex = /^09\d{8}$/;
    if (!phoneRegex.test(phone)) {
        alert("請輸入正確的手機號碼格式（例如：0912345678）");
        return;
    }

    // ✅ Email 格式檢查
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("請輸入正確的 Email 格式（例如：example@mail.com）");
        return;
    }

    // 更新 currentUser
    currentUser.name = name;
    currentUser.email = email;
    currentUser.phone = phone;
    currentUser.birthday = birthday;
    currentUser.gender = gender;
    currentUser.avatar = avatar;

    localStorage.setItem("currentUser", JSON.stringify(currentUser));

    // 同步更新 users 陣列
    let users = JSON.parse(localStorage.getItem("users") || "[]");
    const index = users.findIndex(u => u.username === currentUser.username);
    if (index !== -1) users[index] = currentUser;
    localStorage.setItem("users", JSON.stringify(users));

    alert("✅ 資料已更新！");
});

// 登出
document.getElementById("logoutBtn").addEventListener("click", function(){
    localStorage.removeItem("currentUser");
    window.location.href = "logout.html"; // 可跳到登出畫面
});
</script>
</body>
</html>
