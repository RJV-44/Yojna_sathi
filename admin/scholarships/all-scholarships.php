<?php $activePage = 'scholarships';
require_once __DIR__ . '/../includes/header.php'; ?>
<div class="page-header">
    <div>
        <p class="section-kicker">Scholarships</p>
        <h1 style="margin: 0;">All Scholarships</h1>
    </div>
    <a href="add-scholarship.php" class="btn btn-primary">+ Add Scholarship</a>
</div>

<div class="panel">
    <div class="panel-header">
        <h2 class="panel-title">Scholarship Programs</h2>
        <a href="../dashboard.php" class="text-link">Back to Dashboard</a>
    </div>
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Level</th>
                    <th>Applicants</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Merit Scholarship</td>
                    <td>Undergraduate</td>
                    <td>764</td>
                    <td><span class="badge badge-success">Open</span></td>
                    <td class="action-links">
                        <a href="scholarship-details.php">View</a>
                        <a href="edit-scholarship.php">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>