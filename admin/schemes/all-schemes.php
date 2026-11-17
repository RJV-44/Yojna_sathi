<?php $activePage = 'schemes';
require_once __DIR__ . '/../includes/header.php'; ?>
<div class="page-header">
    <div>
        <p class="section-kicker">Schemes</p>
        <h1 style="margin: 0;">All Schemes</h1>
    </div>
    <a href="add-scheme.php" class="btn btn-primary">+ Add Scheme</a>
</div>

<div class="panel">
    <div class="panel-header">
        <h2 class="panel-title">Government Schemes</h2>
        <a href="../dashboard.php" class="text-link">Back to Dashboard</a>
    </div>
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Scheme Name</th>
                    <th>Category</th>
                    <th>Applicants</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Farm Loan Assistance</td>
                    <td>Agriculture</td>
                    <td>521</td>
                    <td><span class="badge badge-success">Active</span></td>
                    <td class="action-links">
                        <a href="scheme-details.php">View</a>
                        <a href="edit-scheme.php">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td>Women Skill Development</td>
                    <td>Education</td>
                    <td>432</td>
                    <td><span class="badge badge-info">Open</span></td>
                    <td class="action-links">
                        <a href="scheme-details.php">View</a>
                        <a href="edit-scheme.php">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>