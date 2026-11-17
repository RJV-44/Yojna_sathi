<?php $activePage = 'schemes';
require_once __DIR__ . '/../includes/header.php'; ?>
<div class="page-header">
    <div>
        <p class="section-kicker">Schemes</p>
        <h1 style="margin: 0;">Scheme Details</h1>
    </div>
    <div class="action-links">
        <a href="edit-scheme.php" class="btn btn-secondary">Edit</a>
        <a href="all-schemes.php" class="btn btn-primary">Back to List</a>
    </div>
</div>

<div class="detail-card">
    <div class="detail-grid">
        <div class="detail-item"><label>Scheme Name</label>
            <div>Farm Loan Assistance</div>
        </div>
        <div class="detail-item"><label>Category</label>
            <div>Agriculture</div>
        </div>
        <div class="detail-item"><label>Status</label>
            <div><span class="badge badge-success">Active</span></div>
        </div>
        <div class="detail-item"><label>Applications</label>
            <div>521</div>
        </div>
        <div class="detail-item full-width"><label>Description</label>
            <div>Support for small and marginal farmers with low-interest crop loans and government-backed assistance.</div>
        </div>
        <div class="detail-item"><label>Benefits</label>
            <div>Interest subsidy up to 5%</div>
        </div>
        <div class="detail-item"><label>Deadline</label>
            <div>31 Dec 2026</div>
        </div>
        <div class="detail-item full-width"><label>Eligibility</label>
            <div>Farmers with valid land records and income eligibility requirements as defined by the state.</div>
        </div>
    </div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>