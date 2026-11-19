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
    <title>Yojna Sathi Admin Portal</title>
    <link rel="stylesheet" href="<?= htmlspecialchars($adminPath, ENT_QUOTES, 'UTF-8') ?>assets/css/admin.css">
</head>

<body>
    <div class="app-shell">
        <aside class="sidebar">
            <div class="sidebar-brand">
                <a href="<?= $adminPath ?>dashboard.php" style="display: flex; align-items: center; gap: 12px; color: inherit;">
                    <div class="sidebar-brand-mark">YS</div>
                    <div>
                        <h2>Yojna Sathi</h2>
                        <small style="color: #94a3b8; font-size: 0.75rem;">Admin Portal</small>
                    </div>
                </a>
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
                <li style="border-top: 1px solid rgba(255,255,255,0.12); margin-top: 14px; padding-top: 8px;">
                    <a href="<?= $adminPath ?>../index.php" target="_blank" style="color: #38bdf8;">&larr; View Citizen Site</a>
                </li>
                <li><a href="<?= $adminPath ?>logout.php" class="<?= $activePage === 'logout' ? 'active' : '' ?>" style="color: #f87171;">Logout</a></li>
            </ul>
        </aside>

        <main class="main-panel">
            <div class="topbar">
                <div style="display: flex; align-items: center; gap: 14px;">
                    <button type="button" id="adminSidebarToggle" class="btn btn-secondary" style="padding: 8px 12px; display: none;" aria-label="Toggle navigation">&#9776; Menu</button>
                    <h1>Admin Control Panel</h1>
                </div>
                <div style="display: flex; align-items: center; gap: 12px;">
                    <a href="<?= $adminPath ?>../index.php" class="btn btn-secondary" style="font-size: 0.85rem; padding: 8px 14px;" target="_blank">View Site &#8599;</a>
                    <div class="user-pill">&#128100; Super Admin</div>
                </div>
            </div>
            <div class="page-content">