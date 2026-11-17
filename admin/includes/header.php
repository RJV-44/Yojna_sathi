<?php
$activePage = $activePage ?? 'dashboard';
$adminPath = strpos($_SERVER['SCRIPT_NAME'], '/admin/') !== false
    ? substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], '/admin/') + 7)
    : '/admin/';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yojna Sathi Admin</title>
    <link rel="stylesheet" href="<?= htmlspecialchars($adminPath, ENT_QUOTES, 'UTF-8') ?>assets/css/admin.css">
</head>

<body>
    <div class="app-shell">
        <aside class="sidebar">
            <div class="sidebar-brand">
                <div class="sidebar-brand-mark">YS</div>
                <div>
                    <h2>Yojna Sathi</h2>
                </div>
            </div>

            <ul class="sidebar-nav">
                <li><a href="<?= $adminPath ?>dashboard.php" class="<?= $activePage === 'dashboard' ? 'active' : '' ?>">Dashboard</a></li>
                <li><a href="<?= $adminPath ?>schemes/all-schemes.php" class="<?= $activePage === 'schemes' ? 'active' : '' ?>">Schemes</a></li>
                <li><a href="<?= $adminPath ?>scholarships/all-scholarships.php" class="<?= $activePage === 'scholarships' ? 'active' : '' ?>">Scholarships</a></li>
                <li><a href="<?= $adminPath ?>categories/categories.php" class="<?= $activePage === 'categories' ? 'active' : '' ?>">Categories</a></li>
                <li><a href="<?= $adminPath ?>applications/applications.php" class="<?= $activePage === 'applications' ? 'active' : '' ?>">Applications</a></li>
                <li><a href="<?= $adminPath ?>users/users.php" class="<?= $activePage === 'users' ? 'active' : '' ?>">Users</a></li>
                <li><a href="<?= $adminPath ?>notifications/notifications.php" class="<?= $activePage === 'notifications' ? 'active' : '' ?>">Notifications</a></li>
                <li><a href="<?= $adminPath ?>content/homepage.php" class="<?= $activePage === 'content' ? 'active' : '' ?>">Content</a></li>
                <li><a href="<?= $adminPath ?>reports/reports.php" class="<?= $activePage === 'reports' ? 'active' : '' ?>">Reports</a></li>
                <li><a href="<?= $adminPath ?>settings/profile.php" class="<?= $activePage === 'settings' ? 'active' : '' ?>">Settings</a></li>
                <li><a href="<?= $adminPath ?>logout.php" class="<?= $activePage === 'logout' ? 'active' : '' ?>">Logout</a></li>
            </ul>
        </aside>

        <main class="main-panel">
            <div class="topbar">
                <h1>Admin Panel</h1>
                <div class="user-pill">Admin User</div>
            </div>
            <div class="page-content">