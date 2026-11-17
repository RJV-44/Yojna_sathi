<?php $activePage = 'users';
require_once __DIR__ . '/../includes/header.php'; ?>
<div class="page-header">
    <div>
        <p class="section-kicker">Users</p>
        <h1 style="margin: 0;">Registered Users</h1>
    </div>
</div>

<div class="panel">
    <div class="panel-header">
        <h2 class="panel-title">User Directory</h2>
    </div>
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>District</th>
                    <th>Joined</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Renu Sharma</td>
                    <td>renu@example.com</td>
                    <td>Jaipur</td>
                    <td>Aug 10, 2026</td>
                    <td class="action-links"><a href="user-details.php">View</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>