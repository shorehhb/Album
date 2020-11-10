<?php
  require_once "./public/conn.php";
  session_start();
  if (empty($_SESSION['username']))
  {
    header('location:./login.php');
    die();
  }
  $sql = "select * from photos order by id desc ";
  $reslut = mysqli_query($conn,$sql);
  $arrs = mysqli_fetch_all($reslut,MYSQLI_ASSOC);
  $nums = mysqli_num_rows($reslut);
//  print_r($arrs);
//  die();
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
      height: 150px;
      text-align: center;
      margin: 0 auto;
      border-top-right-radius: 10px;
      border-top-left-radius: 10px;
    }
    .title>span:nth-child(1) {
      font-size: 30px;
      display: block;
      padding: 20px;
      letter-spacing: 10px;
      font-weight: 700;
      color: #3C4544;
    }
    .title>span:nth-child(3)>a {
        color: white;
        text-decoration: none;
    }
    .title>span:nth-child(4) {
        display: block;
        width: 400px;
        height: 20px;
        margin: 20px auto;
    }
    .title>span:nth-child(4)>a {
        display: block;
        float: right;
        cursor: pointer;
        color: #747474;
        text-decoration: none;
    }
    .img-box {
      /* position: relative; */
      width: 1200px;
      /* height: 500px; */
      margin: 0 auto;
      overflow: auto;
      zoom: 1;
      background-color: rgb(250, 255, 249);
    }
    .img-box>ul {
      /* 取消a标签之间的间隙 */
      font-size: 0;
    }
    .img-box>ul>li {
      /* position: absolute; */
      /* background-color: red; */
      list-style: none;
      width: 300px;
      height: 200px;
      margin-top: 50px;
      margin-left: 75px;
      float: left;
    }
    .img-box>ul>li>a:nth-child(1) {
      /*background-color: red;*/
      display: inline-block;
      text-align: center;
      width: 300px;
      height: 170px;
    }
    .img-box>ul>li>a:nth-child(1)>img {
      width: 300px;
      height: 170px;
    }
    .img-box>ul>li>a:nth-child(2) {
      /*background-color: royalblue;*/
      display: inline-block;
      text-align: center;
      text-decoration: none;
      font-size: 18px;
      color: #8b8b8b;
      width: 300px;
      height: 30px;
    }
  </style>
    <script>
      function clear() {
        alert("cookie")
      }
    </script>
</head>
<body>
<p class="title">
    <span>我的相册</span>
    <span>上传照片,共有<?php echo $nums?>张照片</span>
    <span><a href="./upload.php">添加照片</a></span>
    <span><a href="./logout.php">退出&gt&gt</a></span>
</p>

<div class="img-box">
  <ul>
    <?php
      foreach ($arrs as $arr)
      {
        ?>
        <li>
          <a href="./details.php?id=<?php echo $arr['id']?>"><img src="<?php echo $arr['imgsrc']?>"></a>
          <a href="./details.php?id=<?php echo $arr['id']?>"><span><?php echo $arr['intro']?></span></a>
        </li>
        <?php
      }
    ?>
<!--    <li>-->
<!--      <a href=""></a>-->
<!--      <a href=""></a>-->
<!--    </li>-->
<!--    <li>-->
<!--      <a href=""></a>-->
<!--      <a href=""></a>-->
<!--    </li>-->

  </ul>
</div>
</body>
</html>