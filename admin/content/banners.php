<?php $activePage = 'content';
require_once __DIR__ . '/../includes/header.php'; ?>
<div class="page-header">
    <div>
        <p class="section-kicker">Content</p>
        <h1 style="margin: 0;">Manage Banners</h1>
    </div>
</div>

<div class="panel">
    <div class="panel-header">
        <h2 class="panel-title">Banner List</h2>
    </div>
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Prime Minister Support Campaign</td>
                    <td>Hero Banner</td>
                    <td><span class="badge badge-success">Published</span></td>
                    <td class="action-links"><a href="#">Edit</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>