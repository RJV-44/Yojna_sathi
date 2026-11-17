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

                <div class="checkbox-row">
                    <label><input type="checkbox" name="remember"> Remember me</label>
                    <a href="#" class="text-link">Forgot password?</a>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%;">Sign In</button>
            </form>
        </div>
    </div>
    <script src="assets/js/admin-validation.js"></script>
</body>

</html>