<?php $activePage = 'content';
require_once __DIR__ . '/../includes/header.php'; ?>
<div class="page-header">
    <div>
        <p class="section-kicker">Content</p>
        <h1 style="margin: 0;">Announcements</h1>
    </div>
</div>

<div class="panel">
    <div class="panel-header">
        <h2 class="panel-title">Recent Announcements</h2>
    </div>
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Published On</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>State scholarship portal reopened</td>
                    <td>Aug 12, 2026</td>
                    <td><span class="badge badge-info">Active</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>