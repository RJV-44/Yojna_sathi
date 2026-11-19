<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Yojna Sathi</title>
    <link rel="stylesheet" href="assets/css/admin.css">
</head>

<body>
    <div class="admin-auth">
        <div class="auth-card">
            <div class="brand-badge">YS</div>
            <h1>Admin Login</h1>
            <p class="auth-subtitle">Access Government Scheme Management</p>

            <form action="dashboard.php" method="post" novalidate>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input class="form-control" type="email" id="email" name="email" placeholder="admin@yojnasathi.in" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <div style="background: rgba(15,118,110,0.08); border: 1px dashed var(--accent); border-radius: 10px; padding: 10px 14px; margin-bottom: 18px; font-size: 0.84rem; display: flex; justify-content: space-between; align-items: center;">
                    <span><strong>Demo Admin:</strong> admin@yojnasathi.in</span>
                    <button type="button" class="btn btn-secondary" style="padding: 4px 10px; font-size: 0.78rem;" onclick="document.querySelector('#email').value='admin@yojnasathi.in'; document.querySelector('#password').value='admin123';">Auto Fill</button>
                </div>

                <div class="checkbox-row">
                    <label><input type="checkbox" name="remember" checked> Remember me</label>
                    <a href="#" class="text-link">Forgot password?</a>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%;">Sign In to Dashboard &rarr;</button>

                <p style="text-align: center; margin-top: 22px; font-size: 0.88rem; color: var(--muted);">
                    <a href="../index.php" class="text-link">&larr; Return to Citizen Website</a>
                </p>
            </form>
        </div>
    </div>
    <script src="assets/js/admin-validation.js"></script>
</body>

</html>