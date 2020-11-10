<?php
require_once ('./public/conn.php');
session_start();

if (isset($_POST['rigster_token']) && $_POST['rigster_token'] == $_SESSION['rigster_token'])
{
//  header("location:./rigster.php");
  $username = $_POST['username'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  //判断输入字符串的长度
  if (empty($username) && empty($password))
  {
    echo "<script> alert('用户名或密码不能为空！')</script>";
    header("refresh:0.1;url=./rigster.php");
  }else {
    if (strlen($password) < 4) {
      echo "<script> alert('密码长度过短，至少4位')</script>";
      header("refresh:0.1;url=./rigster.php");
    }else {
      if ($password != $password2) {
        echo "<script>alert('两次输入的密码不一致,请重新输入')</script>";
        header("refresh:1;url=./rigster.php");
      } else {
        //插入数据时，字段名不需要引号，values的值需要使用引号引起来
        $enciption = $password;
        $sql = "insert into user(username,password) values('$username','$enciption')";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
          echo "插入数据失败！";
        } else {
          echo "<script> alert('插入数据成功') </script>";
          header("refresh:0.1;url=./rigster.php");
        }
      }
    }
  }

}else {
//  echo "<h2>您的操作可能是非法的！</h2>";
  header('location:./rigster.php');
}
