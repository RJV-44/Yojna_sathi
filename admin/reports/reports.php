<?php $activePage = 'reports';
require_once __DIR__ . '/../includes/header.php'; ?>
<div class="page-header">
    <div>
        <p class="section-kicker">Reports</p>
        <h1 style="margin: 0;">Overall Reports</h1>
    </div>
</div>

<div class="stat-grid">
    <div class="stat-card">
        <span class="stat-label">Applications</span>
        <div class="stat-value"><strong>2468</strong><span class="stat-icon">A</span></div>
    </div>
    <div class="stat-card">
        <span class="stat-label">Approved</span>
        <div class="stat-value"><strong>1689</strong><span class="stat-icon">P</span></div>
    </div>
    <div class="stat-card">
        <span class="stat-label">Pending</span>
        <div class="stat-value"><strong>779</strong><span class="stat-icon">W</span></div>
    </div>
    <div class="stat-card">
        <span class="stat-label">Rejected</span>
        <div class="stat-value"><strong>137</strong><span class="stat-icon">R</span></div>
    </div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>