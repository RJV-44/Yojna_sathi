<?php $activePage = 'notifications';
require_once __DIR__ . '/../includes/header.php'; ?>
<div class="page-header">
    <div>
        <p class="section-kicker">Notifications</p>
        <h1 style="margin: 0;">Add Notification</h1>
    </div>
    <a href="notifications.php" class="btn btn-secondary">Back to Notifications</a>
</div>

<div class="form-panel">
    <form novalidate>
        <div class="form-grid">
            <div class="form-group full-width">
                <label for="title">Title</label>
                <input type="text" id="title" class="form-control" placeholder="Notification title" required>
            </div>
            <div class="form-group full-width">
                <label for="message">Message</label>
                <textarea id="message" class="form-textarea" placeholder="Write notification message" required></textarea>
            </div>
            <div class="form-group">
                <label for="audience">Audience</label>
                <select id="audience" class="form-select" required>
                    <option value="">Select Audience</option>
                    <option>All Users</option>
                    <option>Applicants</option>
                    <option>Farmers</option>
                    <option>Students</option>
                </select>
            </div>
            <div class="form-group">
                <label for="send-date">Send Date</label>
                <input type="date" id="send-date" class="form-control" required>
            </div>
        </div>
        <div class="form-actions">
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-primary">Send Notification</button>
        </div>
    </form>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>