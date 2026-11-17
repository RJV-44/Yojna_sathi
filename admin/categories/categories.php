<?php $activePage = 'categories';
require_once __DIR__ . '/../includes/header.php'; ?>
<div class="page-header">
    <div>
        <p class="section-kicker">Categories</p>
        <h1 style="margin: 0;">Manage Categories</h1>
    </div>
    <a href="add-category.php" class="btn btn-primary">+ Add Category</a>
</div>

<div class="panel">
    <div class="panel-header">
        <h2 class="panel-title">Category List</h2>
    </div>
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Scheme Count</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Agriculture</td>
                    <td>agriculture</td>
                    <td>24</td>
                    <td><span class="badge badge-success">Active</span></td>
                    <td class="action-links"><a href="#">Edit</a></td>
                </tr>
                <tr>
                    <td>Education</td>
                    <td>education</td>
                    <td>18</td>
                    <td><span class="badge badge-info">Published</span></td>
                    <td class="action-links"><a href="#">Edit</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>