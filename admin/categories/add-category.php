<?php $activePage = 'categories';
require_once __DIR__ . '/../includes/header.php'; ?>
<div class="page-header">
    <div>
        <p class="section-kicker">Categories</p>
        <h1 style="margin: 0;">Add Category</h1>
    </div>
    <a href="categories.php" class="btn btn-secondary">Back to Categories</a>
</div>

<div class="form-panel">
    <form novalidate>
        <div class="form-grid">
            <div class="form-group full-width">
                <label for="name">Category Name</label>
                <input type="text" id="name" class="form-control" placeholder="Enter category name" required>
            </div>
            <div class="form-group full-width">
                <label for="slug">Slug</label>
                <input type="text" id="slug" class="form-control" placeholder="category-slug" required>
            </div>
            <div class="form-group full-width">
                <label for="description">Description</label>
                <textarea id="description" class="form-textarea" placeholder="Category description" required></textarea>
            </div>
        </div>
        <div class="form-actions">
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-primary">Save Category</button>
        </div>
    </form>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>