<?php $activePage = 'notifications';
require_once __DIR__ . '/../includes/header.php'; ?>
<div class="page-header">
    <div>
        <p class="section-kicker">Notifications</p>
        <h1 style="margin: 0;">Manage Notifications</h1>
    </div>
    <a href="add-notification.php" class="btn btn-primary">+ Add Notification</a>
</div>

<div class="panel">
    <div class="panel-header">
        <h2 class="panel-title">Notification History</h2>
    </div>
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Audience</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>New scholarship rounds open</td>
                    <td>All Users</td>
                    <td>Aug 14, 2026</td>
                    <td><span class="badge badge-success">Sent</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>