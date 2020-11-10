<?php
    session_start();
    $_SESSION['rigster_token'] = uniqid();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用户注册</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }
        body {
            background-color: rgb(35, 78, 83);
        }

        .box {
            width: 500px;
            height: 600px;
            margin: 20px auto;
            text-align: center;
            position: relative;
            border-radius: 20px;
            box-shadow: 15px -15px 8px #8ee9cf ;
            background: linear-gradient(#64e6bf,#737bcf);
        }
        .title {
            display: block;
            width: 500px;
            height: 40px;
            line-height: 40px;
            font-size: 20px;
            letter-spacing: 8px;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            background-color: cadetblue;
        }
        .bottom {
            display: block;
            width: 500px;
            height: 40px;
            bottom: 0;
            line-height: 40px;
            font-size: 15px;
            position: absolute;
            letter-spacing: 8px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            background-color: cadetblue;
        }
        .bottom>a {
            text-decoration: none;
            color: white;
        }
        .rigster {
            position: absolute;
            margin-left: 50%;
            left: -175px;
        }
        .rigster>form>span {
            display: block;
            width: 350px;
            margin-top: 30px;
        }
        .rigster>form>span>input {
            margin-left: 50px;
            height: 25px;
            border-radius: 10px;
            outline: none;
            border-style: none;
        }
        .rigster>form>span:nth-child(3)>input {
            margin-left: 5px;
        }
        .rigster>form>span:nth-child(4) {
            margin-left: -30px;
        }
        .rigster>form>span:nth-child(4)>input {
            border-radius: 10px;
            background-color: white;
            width: 50px;
            height: 30px;
            outline: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="box">
    <span class="title">用户注册</span>
    <div class="rigster">
        <form action="./doRigster.php" method="post">
            <span>用户名:<input type="text" placeholder="请设置用户名" name="username"></span>
            <span>密&nbsp&nbsp&nbsp码:<input type="password" placeholder="请设置密码" name="password"></span>
            <span>再次输入密码:<input type="password" placeholder="请再次输入密码" name="password2"></span>
            <span>
                <input type="submit" value="注册">
                <input type="hidden" value="<? echo $_SESSION['rigster_token']?>" name="rigster_token">
                <input type="reset" value="重置">
            </span>
        </form>
    </div>
    <span class="bottom"><a href="./login.php">去登录&gt&gt</a></span>
</div>
</body>
</html>