<?php $activePage = 'dashboard';
require_once __DIR__ . '/includes/header.php'; ?>

<div class="page-header">
    <div>
        <p class="section-kicker">Overview</p>
        <h1 style="margin: 0;">Dashboard</h1>
    </div>
    <a href="schemes/add-scheme.php" class="btn btn-primary">+ Add New Scheme</a>
</div>

<div class="stat-grid">
    <div class="stat-card">
        <span class="stat-label">Total Schemes</span>
        <div class="stat-value">
            <strong>128</strong>
            <span class="stat-icon">S</span>
        </div>
    </div>
    <div class="stat-card">
        <span class="stat-label">Applications</span>
        <div class="stat-value">
            <strong>2,468</strong>
            <span class="stat-icon">A</span>
        </div>
    </div>
    <div class="stat-card">
        <span class="stat-label">Active Users</span>
        <div class="stat-value">
            <strong>14.6k</strong>
            <span class="stat-icon">U</span>
        </div>
    </div>
    <div class="stat-card">
        <span class="stat-label">Reports</span>
        <div class="stat-value">
            <strong>96%</strong>
            <span class="stat-icon">R</span>
        </div>
    </div>
</div>

<div class="panel">
    <div class="panel-header">
        <h2 class="panel-title">Recent Scheme Activity</h2>
        <a href="schemes/all-schemes.php" class="text-link">View all</a>
    </div>

    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Scheme Name</th>
                    <th>Category</th>
                    <th>Applications</th>
                    <th>Last Updated</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Farm Loan Assistance</td>
                    <td>Agriculture</td>
                    <td>521</td>
                    <td>Aug 14, 2026</td>
                    <td><span class="badge badge-success">Active</span></td>
                </tr>
                <tr>
                    <td>Women Skill Development</td>
                    <td>Education</td>
                    <td>432</td>
                    <td>Aug 10, 2026</td>
                    <td><span class="badge badge-info">Open</span></td>
                </tr>
                <tr>
                    <td>Urban Housing Grant</td>
                    <td>Housing</td>
                    <td>312</td>
                    <td>Aug 06, 2026</td>
                    <td><span class="badge badge-warning">Review</span></td>
                </tr>
                <tr>
                    <td>Healthcare Support Scheme</td>
                    <td>Health</td>
                    <td>298</td>
                    <td>Aug 04, 2026</td>
                    <td><span class="badge badge-danger">Closed</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>