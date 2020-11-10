<?php
require ('./public/conn.php');

//开启session
session_start();
//判断表单是否合法提交
if (isset($_POST['token']) && $_POST['token'] == $_SESSION['token'])
{
  //获取表单数据
  $username = $_POST['username'];
  $password = $_POST['password']; //加密密码
  $captcha = $_POST['captcha'];
  //判断验证码是否一致
  if (strtolower($captcha) != $_SESSION['captcha'])
  {
    echo "<script>alert('验证码不一致！')</script>";
    header("refresh:0.1;url=./login.php");
    die();
  }
  //判断验证码和服务器是否一致
  //判断用户名和密码与数据库是否一致
  $sql = "select * from user where username='$username'and password='$password'";
  $result  = mysqli_query($conn,$sql);//执行sql语句
  $records = mysqli_num_rows($result);//返回结果集
  if (!$records)
  {
    echo "<script>alert('用户名或密码不正确！')</script>";
    header("refresh:0.1;url=./login.php");
    die();
  }
  //保存用户信息到session中
  $_SESSION['username'] = $username;
  //跳转到相册首页
  header("location:./index.php");
}else
{
  header("location:./login.php");
}



