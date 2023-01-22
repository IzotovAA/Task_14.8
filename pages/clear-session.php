<?php

session_start();
// setcookie('coockie', $_COOKIE);
// $_SESSION = [];
// unset($_COOKIE);
// session_abort();
session_destroy();
// header('Location: index.php');
// exit();
// print_r($_SESSION);
// print_r($_COOKIE);
header('Location: ../index.php');
