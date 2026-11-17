<?php $activePage = 'scholarships';
require_once __DIR__ . '/../includes/header.php'; ?>
<div class="page-header">
    <div>
        <p class="section-kicker">Scholarships</p>
        <h1 style="margin: 0;">Add Scholarship</h1>
    </div>
    <a href="all-scholarships.php" class="btn btn-secondary">Back to Scholarships</a>
</div>

<div class="form-panel">
    <form novalidate>
        <div class="form-grid">
            <div class="form-group">
                <label for="scholarship-name">Scholarship Name</label>
                <input type="text" id="scholarship-name" class="form-control" placeholder="Enter scholarship name" required>
            </div>
            <div class="form-group">
                <label for="scholarship-level">Level</label>
                <select id="scholarship-level" class="form-select" required>
                    <option value="">Select level</option>
                    <option>School</option>
                    <option>Undergraduate</option>
                    <option>Postgraduate</option>
                </select>
            </div>
            <div class="form-group full-width">
                <label for="scholarship-desc">Description</label>
                <textarea id="scholarship-desc" class="form-textarea" placeholder="Write scholarship details"></textarea>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" id="amount" class="form-control" placeholder="e.g. ₹25,000">
            </div>
            <div class="form-group">
                <label for="deadline">Application Deadline</label>
                <input type="date" id="deadline" class="form-control">
            </div>
        </div>
        <div class="form-actions">
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-primary">Save Scholarship</button>
        </div>
    </form>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>