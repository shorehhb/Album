<?php
//产生随机数
//开启session会话
    session_start();
    $_SESSION['token'] = uniqid();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用户登录</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }
        body {
            background-color: #003047;
        }
        .header {
            background-color: rgb(197, 231, 255);
            width: 1200px;
            height: 120px;
            margin: 0 auto;
            text-align: center;
            border-bottom: 1px solid rgb(235, 235, 235);
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .header>span:nth-child(1) {
            font-size: 36px;
            color: rgb(73, 71, 71);
            display: block;
        }
        .header>span:nth-child(2) {
            display: inline-block;
            margin-top: 20px;
            color: rgb(124, 119, 119);
        }
        .box {
            background-color: white;
            position: relative;
            margin: 0 auto;
            width: 1200px;
            height: 500px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }
        .login_box {
            position: absolute;
            width: 400px;
            margin-left: 50%;
            margin-top: 50px;
            left: -150px;
        }
        .login_box>form>div {
            width: 400px;
            margin-bottom: 20px;
            color: rgb(19, 18, 18);
        }
        .login_box>form>div>input {
            background-color: rgb(238, 229, 229);
            height: 30px;
            border-radius: 5px;
            margin-left: 50px;
            outline: none;
            border-style: none;
        }
        .login_box>form>div:nth-child(3)>input {
            margin-left: 35px;
            width: 80px;
        }
        .login_box>form>div:nth-child(3)>img {
            /*display: inline-block;*/
            margin-top: -20px;
            width: 80px;
            height: 30px;
        }
        .login_box>form>div:nth-child(4)>input {
            background-color: #d6d6d6;
            cursor: pointer;
            width: 50px;
        }
        .login_box>div>a {
            float: right;
            text-decoration: none;
            color: #8b8b8b;
        }
    </style>
</head>
<body>
<p class="header">
    <span>照片管理登录页面</span>
    <span>欢迎光临，请先登录！</span>
</p>
<div class="box">
    <div class="login_box">
        <form action="./doLogin.php" method="post">
            <div>用户名:<input type="text" placeholder="请输入用户名" name="username"></div>
            <div>密&nbsp&nbsp&nbsp码:<input type="password" placeholder="请输入密码" name="password"></div>
            <div>验证码：<input type="text" name="captcha" placeholder="请输入验证码">
                 <img src="./public/captcha.php" onclick="this.src='./public/captcha.php?'+Math.random()">
            </div>
            <div>
                <input type="submit" value="提交">
                <input type="hidden" name="token" value="<? echo $_SESSION['token']?>">
                <input type="reset" value="重置">
            </div>
        </form>
        <div><a href="rigster.php">去注册&gt&gt</a></div>
    </div>
</div>
</body>
</html>