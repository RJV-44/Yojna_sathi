<?php $activePage = 'schemes';
require_once __DIR__ . '/../includes/header.php'; ?>
<div class="page-header">
    <div>
        <p class="section-kicker">Schemes</p>
        <h1 style="margin: 0;">Add Scheme</h1>
    </div>
    <a href="all-schemes.php" class="btn btn-secondary">Back to Schemes</a>
</div>

<div class="form-panel">
    <form novalidate>
        <div class="form-grid">
            <div class="form-group">
                <label for="scheme-name">Scheme Name</label>
                <input type="text" id="scheme-name" class="form-control" placeholder="Enter scheme name" required>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" class="form-select" required>
                    <option value="">Select category</option>
                    <option>Agriculture</option>
                    <option>Education</option>
                    <option>Health</option>
                    <option>Women Welfare</option>
                </select>
            </div>
            <div class="form-group full-width">
                <label for="description">Description</label>
                <textarea id="description" class="form-textarea" placeholder="Write scheme description"></textarea>
            </div>
            <div class="form-group">
                <label for="benefits">Benefits</label>
                <input type="text" id="benefits" class="form-control" placeholder="Financial / in-kind benefits">
            </div>
            <div class="form-group">
                <label for="deadline">Application Deadline</label>
                <input type="date" id="deadline" class="form-control">
            </div>
            <div class="form-group full-width">
                <label for="eligibility">Eligibility Criteria</label>
                <textarea id="eligibility" class="form-textarea" placeholder="Eligibility conditions"></textarea>
            </div>
        </div>

        <div class="form-actions">
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-primary">Save Scheme</button>
        </div>
    </form>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>