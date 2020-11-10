<?php
require_once "./public/conn.php";
session_start();
//判断用户是否登录
if (empty($_SESSION['username']))
{
  header('location:./login.php');
  die();
}
//判断表单的来源是否合法
if (isset($_POST['token']) && $_POST['token'] == $_SESSION['token'])
{
  //获取upload的数据
  $title = $_POST['title'];//标题
  $intro = $_POST['intro']; //描述
  $addate = time();// 时间戳，发布时间

  //上传图片,判断文件是否上传发生错误
  if ($_FILES['imgsrc']['error'] != 0)
  {
    echo "<script> alert('上传图片失效')</script>";
    header("refresh:1;url=./upload.php");
    die();
  }
  //判断文件内容是否是图片
  $arr1 = array('image/png','image/jpeg','image/gif');
  //创建finfo的资源，获取文件内容类型，与扩展名无关
  $finfo = finfo_open(FILEINFO_MIME_TYPE);
  //获取文件内容的原始类型，不会随着扩展名改名而改变
  $mime = finfo_file($finfo,$_FILES['imgsrc']['tmp_name']);
  if (!in_array($mime,$arr1))
  {
    echo "<script> alert('上传的文件内容必须是图片')</script>";
    header("refresh:1;url=./upload.php");
    die();
  }
  //判断上传的文件扩展名是不是图片
  $arr2 = array('jpg','png','gif');
  $ext = pathinfo($_FILES['imgsrc']['name'],PATHINFO_EXTENSION);
//  echo $ext;
  if (!in_array($ext,$arr2))
  {
    echo "<script> alert('上传的文件扩展名必须是图片')</script>";
    header("refresh:1;url=./upload.php");
    die();
  }
  //文件上传
  $tmp_name = $_FILES['imgsrc']['tmp_name'];
  $dst_name = "./images/".uniqid().'.'.$ext;
   move_uploaded_file($tmp_name,$dst_name);
//  echo $dst_name;
  $sql = "insert into photos(title,imgsrc,intro,hits,addate) values('$title','$dst_name','$intro','0','$addate')";
  $reslut = mysqli_query($conn, $sql);
  if ($reslut) {
    header('location:./index.php');
  }
}else{
  header("location:./index.php");
}