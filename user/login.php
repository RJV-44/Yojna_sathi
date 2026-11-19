<?php
session_start();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $password === '') {
        $error = 'Please enter a valid email address and your password.';
    } else {
        // If password is too short
        if (strlen($password) < 6) {
            $error = 'Password must be at least 6 characters.';
        } else {
            // Successful simulated authentication
            $_SESSION['user'] = [
                'name' => $_SESSION['user']['name'] ?? ucfirst(strtok($email, '@')),
                'email' => $email,
                'district' => $_SESSION['user']['district'] ?? 'Central Delhi',
                'interest' => $_SESSION['user']['interest'] ?? 'Education',
            ];
            header('Location: profile.php');
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sign in to your Yojna Sathi citizen account to track eligibility and access saved benefits.">
    <title>Citizen Login | Yojna Sathi</title>
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/css/auth-pages.css">
    <link rel="stylesheet" href="../assets/css/validation.css">
</head>

<body class="auth-page">
    <main class="auth-layout">
        <!-- Left Branding & Feature Column -->
        <div class="auth-intro">
            <a class="brand" href="../index.php" aria-label="Yojna Sathi Home">
                <span class="brand-mark">YS</span>
                <span class="brand-copy">
                    <strong>Yojna Sathi</strong>
                    <small>Your benefits, one place</small>
                </span>
            </a>

            <p class="eyebrow">Welcome Back, Citizen</p>
            <h1>Access verified support tailored for you.</h1>
            <p class="hero-text">Sign in to review your profile, keep document checklists ready, and receive alerts tailored to your district and profession.</p>

            <ul class="auth-features-list">
                <li class="auth-feature-item">
                    <span class="auth-feature-icon">&#10003;</span>
                    <span>100% Free citizen portal with verified schemes</span>
                </li>
                <li class="auth-feature-item">
                    <span class="auth-feature-icon">&#10003;</span>
                    <span>Instant eligibility checking & document preparation</span>
                </li>
                <li class="auth-feature-item">
                    <span class="auth-feature-icon">&#10003;</span>
                    <span>Direct links to official Central and State application gateways</span>
                </li>
            </ul>

            <a class="text-link" href="../index.php">
                &larr; Back to Home Page
            </a>
        </div>

        <!-- Right Login Card -->
        <section class="auth-card-public">
            <p class="eyebrow">Citizen Account</p>
            <h2>Sign In</h2>
            <p class="auth-helper">Enter your registered email address and password.</p>

            <!-- Quick Demo Helper -->
            <div class="demo-credentials-badge">
                <span><strong>Quick Demo:</strong> citizen@yojnasathi.in</span>
                <button type="button" id="fill-demo-btn">Auto Fill</button>
            </div>

            <?php if ($error): ?>
                <div class="form-error" role="alert">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form class="auth-form" method="post" novalidate>
                <div class="form-group">
                    <label for="email">Email Address <span style="color: var(--accent-coral);">*</span></label>
                    <div class="input-with-icon">
                        <svg class="input-icon" viewBox="0 0 20 20" aria-hidden="true">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                        <input class="form-input" id="email" name="email" type="email" autocomplete="email" placeholder="you@example.com" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password <span style="color: var(--accent-coral);">*</span></label>
                    <div class="input-with-icon">
                        <svg class="input-icon" viewBox="0 0 20 20" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                        <input class="form-input" id="password" name="password" type="password" autocomplete="current-password" placeholder="Enter your password" required minlength="6">
                        <button type="button" class="password-toggle-btn" aria-label="Toggle password visibility">Show</button>
                    </div>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; margin: 4px 0 8px;">
                    <label class="check-label">
                        <input type="checkbox" name="remember" checked> Remember me
                    </label>
                    <a href="contact.php" class="text-link" style="font-size: 0.85rem;">Forgot password?</a>
                </div>

                <button class="button button-primary button-lg" type="submit" style="width: 100%;">
                    Sign In to Profile <span aria-hidden="true">&#8594;</span>
                </button>
            </form>

            <p class="auth-switch">
                New to Yojna Sathi? <a href="register.php">Create a Citizen Account</a>
            </p>
        </section>
    </main>

    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/validation.js"></script>
</body>

</html>