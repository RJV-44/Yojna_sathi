<?php $activePage = 'scholarships';
require_once __DIR__ . '/../includes/header.php'; ?>
<div class="page-header">
    <div>
        <p class="section-kicker">Scholarships</p>
        <h1 style="margin: 0;">Edit Scholarship</h1>
    </div>
    <a href="all-scholarships.php" class="btn btn-secondary">Back to Scholarships</a>
</div>

<div class="form-panel">
    <form novalidate>
        <div class="form-grid">
            <div class="form-group">
                <label for="scholarship-name">Scholarship Name</label>
                <input type="text" id="scholarship-name" class="form-control" value="Merit Scholarship">
            </div>
            <div class="form-group">
                <label for="scholarship-level">Level</label>
                <select id="scholarship-level" class="form-select">
                    <option selected>Undergraduate</option>
                    <option>School</option>
                    <option>Postgraduate</option>
                </select>
            </div>
            <div class="form-group full-width">
                <label for="scholarship-desc">Description</label>
                <textarea id="scholarship-desc" class="form-textarea">Scholarship for academically outstanding students from low-income households.</textarea>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" id="amount" class="form-control" value="₹25,000">
            </div>
            <div class="form-group">
                <label for="deadline">Application Deadline</label>
                <input type="date" id="deadline" class="form-control" value="2026-12-31">
            </div>
        </div>
        <div class="form-actions">
            <button type="button" class="btn btn-secondary">Cancel</button>
            <button type="submit" class="btn btn-primary">Update Scholarship</button>
        </div>
    </form>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>