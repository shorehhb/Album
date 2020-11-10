<?php
  require_once "./public/conn.php";
  session_start();
  if (empty($_SESSION['username']))
  {
    header("location:./login.php");
    die();
  }
  $id = $_GET['id'];
  $sql1 = "update photos set hits = hits+1 where id=$id";
  mysqli_query($conn,$sql1);
  $sql = "select * from photos where id = $id";
  $reslut = mysqli_query($conn, $sql);
  $arrs = mysqli_fetch_assoc($reslut);
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
      background-color: rgb(197, 231, 255);
      width: 1200px;
      height: 120px;
      margin: 0 auto;
      text-align: center;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }
    .title>span:nth-child(1) {
      display: block;
      padding: 15px;
      font-size: 36px;
    }
    .title>span:nth-child(2)>a {
      text-decoration: none;
      color: slategray;
    }
    .title>span:nth-child(2)>span {
      color: slategray;
    }
    .box {
      width: 1200px;
      background-color: rgb(250, 255, 249);
      height: 600px;
      margin: 0 auto;
    }
    .box>.img-box {
      position: relative;
      width: 750px;
      height: 450px;
      top: 20px;
      background-color: springgreen;
      margin: 0 auto;
      clear: both;
    }
    .box>.img-box>img {
      width: 750px;
      height: 450px;
    }
    .box>.intro-box {
      display: block;
      position: relative;
      top: 20px;
      width: 500px;
      height: 130px;
      margin: 0 auto;
      font-size: 25px;
      text-indent: 2em;
      background-color: #b9b9b9;
    }
  </style>
</head>
<body>
<p class="title">

  <span><?php echo $arrs['title']?></span>
  <span>访问次数<span><?php echo $arrs['hits']?></span>次，发布时间<span><?php echo $time = date('Y-m-d H:m:s',$arrs['addate'])?></span>，<a href="./index.php">返回首页</a></span>
</p>
<div class="box">
  <div class="img-box"><img src="<?php echo $arrs['imgsrc']?>"></div>
  <span class="intro-box"><?php echo $arrs['intro']?></span>

</div>
</body>
</html>