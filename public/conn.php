<?php
$host = "127.0.0.1";
$user = "root";
$password = "root";
$port = "3306";
$dbname = "image";
$charset = "utf8";

//连接数据库
$conn = mysqli_connect($host.':'.$port,$user,$password,$dbname);
//判断数据库是否连接成功
if(!$conn)
{
  echo "数据库连接失败！".mysqli_connect_error();
  die();//终止程序向下运行
}

if (!mysqli_select_db($conn,$dbname))
{
  echo "选择数据库".$dbname."失败！";
  die();
}
mysqli_set_charset($conn,$charset);
//关闭数据库
//mysqli_close($conn);
//echo md5('123');