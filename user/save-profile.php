<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['user']['name'] = trim($_POST['name'] ?? $_SESSION['user']['name']);
    $_SESSION['user']['district'] = trim($_POST['district'] ?? '');
    $_SESSION['user']['interest'] = trim($_POST['interest'] ?? 'Education');

    header('Location: profile.php?updated=1');
    exit;
}

header('Location: profile.php');
exit;
