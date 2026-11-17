<?php $activePage = 'reports';
require_once __DIR__ . '/../includes/header.php'; ?>
<div class="page-header">
    <div>
        <p class="section-kicker">Reports</p>
        <h1 style="margin: 0;">Scheme Statistics</h1>
    </div>
    <a href="reports.php" class="btn btn-secondary">Back to Reports</a>
</div>

<div class="panel">
    <div class="panel-header">
        <h2 class="panel-title">Scheme Performance</h2>
    </div>
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Scheme</th>
                    <th>Applicants</th>
                    <th>Approval Rate</th>
                    <th>Last Update</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Farm Loan Assistance</td>
                    <td>521</td>
                    <td>74%</td>
                    <td>Aug 14, 2026</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>