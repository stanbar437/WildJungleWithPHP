<?php
session_start();

unset($_SESSION['users']);
// 登出使用者
header("Location: login.php");
// 回到要登入才能進入