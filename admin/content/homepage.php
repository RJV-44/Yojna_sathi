<?php $activePage = 'content';
require_once __DIR__ . '/../includes/header.php'; ?>
<div class="page-header">
    <div>
        <p class="section-kicker">Content</p>
        <h1 style="margin: 0;">Homepage Content</h1>
    </div>
</div>

<div class="form-panel">
    <form novalidate>
        <div class="form-grid">
            <div class="form-group full-width">
                <label for="hero-title">Hero Title</label>
                <input type="text" id="hero-title" class="form-control" value="Discover Government Schemes for Every Need" required>
            </div>
            <div class="form-group full-width">
                <label for="hero-subtitle">Hero Subtitle</label>
                <textarea id="hero-subtitle" class="form-textarea" required>Explore scholarships, schemes, and support programs designed for citizens across the state.</textarea>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save Content</button>
        </div>
    </form>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>