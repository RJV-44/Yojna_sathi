<?php $activePage = 'settings';
require_once __DIR__ . '/../includes/header.php'; ?>
<div class="page-header">
    <div>
        <p class="section-kicker">Settings</p>
        <h1 style="margin: 0;">Admin Profile</h1>
    </div>
</div>

<div class="form-panel">
    <form novalidate>
        <div class="form-grid">
            <div class="form-group">
                <label for="full-name">Full Name</label>
                <input type="text" id="full-name" class="form-control" value="Super Admin" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" value="admin@yojnasathi.in" required>
            </div>
            <div class="form-group full-width">
                <label for="bio">Bio</label>
                <textarea id="bio" class="form-textarea" required>Administrator responsible for managing public welfare programs and portal updates.</textarea>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </div>
    </form>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>