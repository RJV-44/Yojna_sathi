<?php $activePage = 'scholarships';
require_once __DIR__ . '/../includes/header.php'; ?>
<div class="page-header">
    <div>
        <p class="section-kicker">Scholarships</p>
        <h1 style="margin: 0;">Scholarship Details</h1>
    </div>
    <div class="action-links">
        <a href="edit-scholarship.php" class="btn btn-secondary">Edit</a>
        <a href="all-scholarships.php" class="btn btn-primary">Back to List</a>
    </div>
</div>

<div class="detail-card">
    <div class="detail-grid">
        <div class="detail-item"><label>Scholarship Name</label>
            <div>Merit Scholarship</div>
        </div>
        <div class="detail-item"><label>Level</label>
            <div>Undergraduate</div>
        </div>
        <div class="detail-item"><label>Status</label>
            <div><span class="badge badge-success">Open</span></div>
        </div>
        <div class="detail-item"><label>Applicants</label>
            <div>764</div>
        </div>
        <div class="detail-item full-width"><label>Description</label>
            <div>Scholarship for academically outstanding students from low-income households.</div>
        </div>
        <div class="detail-item"><label>Amount</label>
            <div>₹25,000</div>
        </div>
        <div class="detail-item"><label>Deadline</label>
            <div>31 Dec 2026</div>
        </div>
    </div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>