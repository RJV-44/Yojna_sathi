<?php $activePage = 'applications';
require_once __DIR__ . '/../includes/header.php'; ?>
<div class="page-header">
    <div>
        <p class="section-kicker">Applications</p>
        <h1 style="margin: 0;">Applications & Inquiries</h1>
    </div>
</div>

<div class="panel">
    <div class="panel-header">
        <h2 class="panel-title">Latest Applications</h2>
    </div>
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Applicant</th>
                    <th>Scheme</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Renu Sharma</td>
                    <td>Farm Loan Assistance</td>
                    <td>Aug 15, 2026</td>
                    <td><span class="badge badge-warning">Pending</span></td>
                    <td class="action-links"><a href="application-details.php">View</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>