<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
$_SESSION['user']['name'] = trim($_POST['name'] ?? $_SESSION['user']['name']);
$_SESSION['user']['district'] = trim($_POST['district'] ?? '');
$_SESSION['user']['interest'] = trim($_POST['interest'] ?? '');
header('Location: profile.php');
exit;
