<?php $activePage = 'users';
require_once __DIR__ . '/../includes/header.php'; ?>
<div class="page-header">
    <div>
        <p class="section-kicker">Users</p>
        <h1 style="margin: 0;">User Details</h1>
    </div>
    <a href="users.php" class="btn btn-primary">Back to Users</a>
</div>

<div class="detail-card">
    <div class="detail-grid">
        <div class="detail-item"><label>Full Name</label>
            <div>Renu Sharma</div>
        </div>
        <div class="detail-item"><label>Email</label>
            <div>renu@example.com</div>
        </div>
        <div class="detail-item"><label>Phone</label>
            <div>+91 98765 43210</div>
        </div>
        <div class="detail-item"><label>District</label>
            <div>Jaipur</div>
        </div>
        <div class="detail-item"><label>Role</label>
            <div>Citizen</div>
        </div>
        <div class="detail-item"><label>Joined</label>
            <div>10 Aug 2026</div>
        </div>
    </div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>