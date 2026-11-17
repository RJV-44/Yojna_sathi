<?php $activePage = 'applications';
require_once __DIR__ . '/../includes/header.php'; ?>
<div class="page-header">
    <div>
        <p class="section-kicker">Applications</p>
        <h1 style="margin: 0;">Application Details</h1>
    </div>
    <a href="applications.php" class="btn btn-primary">Back to List</a>
</div>

<div class="detail-card">
    <div class="detail-grid">
        <div class="detail-item"><label>Applicant Name</label>
            <div>Renu Sharma</div>
        </div>
        <div class="detail-item"><label>Scheme</label>
            <div>Farm Loan Assistance</div>
        </div>
        <div class="detail-item"><label>Email</label>
            <div>renu@example.com</div>
        </div>
        <div class="detail-item"><label>Phone</label>
            <div>+91 98765 43210</div>
        </div>
        <div class="detail-item full-width"><label>Application Notes</label>
            <div>Submitted supporting documents and requested assistance for a crop loan application.</div>
        </div>
    </div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>