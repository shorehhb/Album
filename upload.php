<?php
//开启session会话
session_start();
//判断用户是否登录
if (empty($_SESSION['username']))
{
  //如果位登录直接跳转到登录页，
  header("location:./login.php");
  die();
}
//产生随机字符串
$_SESSION['token'] = uniqid();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    * {
      padding: 0;
      margin: 0;
    }
    body {
      background-color: #003047;
    }
    .title {
      width: 1200px;
      height: 120px;
      margin: 0 auto;
      text-align: center;
      border-top-left-radius: 20px;
      border-top-right-radius: 20px;
      background-color: rgb(197, 231, 255);
    }
    .title>span:nth-child(1) {
      display: block;
      font-size: 35px;
      font-weight: 700;
      line-height: 50px;
      color: rgb(39, 69, 94);
      letter-spacing: 20px;
    }
    .title>span:nth-child(2) {
      line-height: 50px;
    }
    .title>span:nth-child(2)>a {
      text-decoration: none;
      color: white;
    }
    .content-box {
      position: relative;
      width: 1200px;
      height: 550px;
      margin: 0 auto;
      background-color: rgb(250, 255, 249);
      border-bottom-left-radius: 20px;
      border-bottom-right-radius: 20px;
    }
    .content-box>.box {
      width: 600px;
      height: 400px;
      position: absolute;
      margin: 50px auto;
      left: 0;
      right: 0;

    }
    .content-box>.box>form>span {
      display: block;
      margin-top: 30px;
    }
    .content-box>.box>form>span:nth-child(1)>input {
      margin-left: 30px;
      height: 20px;
      width: 400px;

      border-radius: 10px;
    }
    .content-box>.box>form>span:nth-child(2)>input {
      margin-left: 30px;
    }
    .content-box>.box>form>span:nth-child(3) {
      /* 父元素开启flex布局 */
      display: flex;
    }
    .content-box>.box>form>span:nth-child(3)>span {
      /* 子元素设置垂直居中 */
      align-self: center;
    }
    .content-box>.box>form>span:nth-child(3)>textarea {
      resize: none;
      outline: none;
      margin-left: 30px;
      border-radius: 5px;
    }
    .content-box>.box>form>span:nth-child(4)>input {
      margin-left: 100px;
      width: 50px;
      height: 30px;
      background-color: rgb(206, 208, 209);
      border-style: none;
      border-radius: 10px;
      outline: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
<p class="title">
  <span>上传照片</span>
  <span><a href="./index.php">返回首页</a></span>
</p>
<div class="content-box">
  <div class="box">
    <form action="./doUpload.php" method="post" enctype="multipart/form-data">
        <span class="photo_title">
          照片标题:<input type="text" name="title">
        </span>
      <span>
          上传照片:<input type="file" name="imgsrc">
        </span>
      <span>
          <span>照片描述:</span>
          <textarea name="intro" id="" cols="55" rows="10"></textarea>
        </span>
      <span>
          <input type="submit" value="提交">
          <input type="hidden" value="<? echo $_SESSION['token']?>" name="token">
          <input type="reset" value="重置">
        </span>
    </form>
  </div>
</div>
</body>
</html>