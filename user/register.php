<?php
session_start();
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if ($name === '' || strlen($name) < 2) {
        $errors[] = 'Please enter your full legal name (at least 2 characters).';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }
    if (strlen($password) < 6) {
        $errors[] = 'Password must be at least 6 characters long.';
    }
    if ($password !== $confirmPassword) {
        $errors[] = 'Password and confirmation password do not match.';
    }

    if (empty($errors)) {
        $_SESSION['user'] = [
            'name' => $name,
            'email' => $email,
            'district' => 'Central Delhi',
            'interest' => 'Education',
        ];
        header('Location: profile.php?welcome=1');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Create your free Yojna Sathi citizen account to discover public welfare benefits.">
    <title>Create Citizen Account | Yojna Sathi</title>
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

            <p class="eyebrow">Your Support Journey Starts Here</p>
            <h1>Create a citizen profile built around your needs.</h1>
            <p class="hero-text">Save your district and occupation once. Get notified the moment agricultural, student, or business schemes open in your area.</p>

            <ul class="auth-features-list">
                <li class="auth-feature-item">
                    <span class="auth-feature-icon">&#10003;</span>
                    <span>100% Free citizen service with zero registration charges</span>
                </li>
                <li class="auth-feature-item">
                    <span class="auth-feature-icon">&#10003;</span>
                    <span>Direct alerts before scheme application windows close</span>
                </li>
                <li class="auth-feature-item">
                    <span class="auth-feature-icon">&#10003;</span>
                    <span>Personalized document checklist manager</span>
                </li>
            </ul>

            <a class="text-link" href="../index.php">
                &larr; Back to Home Page
            </a>
        </div>

        <!-- Right Register Card -->
        <section class="auth-card-public">
            <p class="eyebrow">Citizen Registration</p>
            <h2>Create Account</h2>
            <p class="auth-helper">Takes less than a minute to get set up.</p>

            <?php if (!empty($errors)): ?>
                <div class="form-error" role="alert">
                    <strong>Please correct the following:</strong>
                    <ul>
                        <?php foreach ($errors as $err): ?>
                            <li><?= htmlspecialchars($err) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form class="auth-form" method="post" novalidate>
                <div class="form-group">
                    <label for="name">Full Name <span style="color: var(--accent-coral);">*</span></label>
                    <div class="input-with-icon">
                        <svg class="input-icon" viewBox="0 0 20 20" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                        <input class="form-input" id="name" name="name" type="text" autocomplete="name" placeholder="e.g. Ramesh Kumar" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required minlength="2">
                    </div>
                </div>

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
                    <label for="password">Create Password <span style="color: var(--accent-coral);">*</span></label>
                    <div class="input-with-icon">
                        <svg class="input-icon" viewBox="0 0 20 20" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                        <input class="form-input" id="password" name="password" type="password" autocomplete="new-password" placeholder="At least 6 characters" required minlength="6">
                        <button type="button" class="password-toggle-btn" aria-label="Toggle password visibility">Show</button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password <span style="color: var(--accent-coral);">*</span></label>
                    <div class="input-with-icon">
                        <svg class="input-icon" viewBox="0 0 20 20" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                        <input class="form-input" id="confirm_password" name="confirm_password" type="password" autocomplete="new-password" placeholder="Repeat your password" required minlength="6">
                    </div>
                </div>

                <div style="margin: 4px 0 8px;">
                    <label class="check-label">
                        <input type="checkbox" required checked> I agree to the citizen terms & data privacy guidelines
                    </label>
                </div>

                <button class="button button-primary button-lg" type="submit" style="width: 100%;">
                    Create Free Account <span aria-hidden="true">&#8594;</span>
                </button>
            </form>

            <p class="auth-switch">
                Already have an account? <a href="login.php">Sign In Here</a>
            </p>
        </section>
    </main>

    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/validation.js"></script>
</body>

</html>