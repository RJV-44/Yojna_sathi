<?php $activePage = 'settings';
require_once __DIR__ . '/../includes/header.php'; ?>
<div class="page-header">
    <div>
        <p class="section-kicker">Settings</p>
        <h1 style="margin: 0;">System Settings</h1>
    </div>
</div>

<div class="form-panel">
    <form novalidate>
        <div class="form-grid">
            <div class="form-group">
                <label for="site-name">Site Name</label>
                <input type="text" id="site-name" class="form-control" value="Yojna Sathi" required>
            </div>
            <div class="form-group">
                <label for="timezone">Timezone</label>
                <select id="timezone" class="form-select">
                    <option selected>Asia/Kolkata</option>
                    <option>UTC</option>
                </select>
            </div>
            <div class="form-group full-width">
                <label for="maintenance">Maintenance Mode</label>
                <select id="maintenance" class="form-select">
                    <option selected>Off</option>
                    <option>On</option>
                </select>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save Settings</button>
        </div>
    </form>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>