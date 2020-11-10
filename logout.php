<?php
session_start();
if ($_SESSION['username'])
{
  unset($_SESSION['username']);
  if ($_SESSION['username'] == null)
  {
    header('location:./login.php');
  }
}
