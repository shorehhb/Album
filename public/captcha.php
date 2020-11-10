<?php
$img = imagecreatetruecolor(70,30);
$arr = array_merge(range('a','z'),range('0','9'),range('A','Z'));
shuffle($arr);
//获取四位下标
$arr1 = array_rand($arr,4);
//循环输出
$str = "";
foreach ($arr1 as $index) {
  $str .=$arr[$index];
}
//讲验证码字符串保存在session
session_start();
$_SESSION['captcha'] = strtolower($str);

//创建画布
$width = 80;
$height = 30;
$img = imagecreatetruecolor(80,30);
//绘制带填充的矩形
$color = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
imagefilledrectangle($img,0,0,$width,$height,$color);
//绘制像素点
for ($i=1;$i<=100;$i++)
{
  $color1 = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
  imagesetpixel($img,mt_rand(0,$width),mt_rand(0,$height),$color1);
}
//绘制线段
for ($i=1;$i<=15;$i++)
{
  $color2 = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
  imageline($img,mt_rand(0,$width),mt_rand(0,$height),mt_rand(0,$width),mt_rand(0,$height),$color2);
}
//绘制一行TTF字符串
$fontfile = "D:\phpstudy\WWW\project\image_pro\public\STKAITI.TTF";
$color3 =imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
imagettftext($img,23,0,10,25,$color3,$fontfile,$str);
//输出图像
header("content-type:image/png");
imagepng($img);
imagedestroy($img);