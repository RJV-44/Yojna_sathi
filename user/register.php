<?php
session_start();
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';
    if ($name === '') $errors[] = 'Enter your full name.';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Enter a valid email address.';
    if (strlen($password) < 6) $errors[] = 'Password must be at least 6 characters.';
    if ($password !== $confirmPassword) $errors[] = 'Passwords do not match.';
    if (!$errors) {
        $_SESSION['user'] = ['name' => $name, 'email' => $email, 'district' => '', 'interest' => ''];
        header('Location: profile.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account | Yojna Sathi</title>
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/css/user-pages.css">
    <link rel="stylesheet" href="../assets/css/auth-pages.css">
    <link rel="stylesheet" href="../assets/css/validation.css">
</head>

<body class="auth-page">
    <main class="auth-layout">
        <div class="auth-intro"><a class="brand" href="../index.php"><span class="brand-mark">YS</span><span class="brand-copy"><strong>Yojna Sathi</strong><small>Your benefits, one place</small></span></a>
            <p class="eyebrow">Your support starts here</p>
            <h1>Create a profile built around your needs.</h1>
            <p class="hero-text">Save your details once and make it easier to prepare for schemes and scholarships.</p><a class="text-link" href="../index.php">Back to home <span aria-hidden="true">&#8594;</span></a>
        </div>
        <section class="auth-card-public">
            <p class="eyebrow">Citizen account</p>
            <h2>Create account</h2>
            <p class="auth-helper">It only takes a minute to get started.</p><?php if ($errors): ?><div class="form-error">
                    <ul><?php foreach ($errors as $error): ?><li><?= htmlspecialchars($error) ?></li><?php endforeach; ?></ul>
                </div><?php endif; ?><form method="post" novalidate><label for="name">Full name</label><input id="name" name="name" type="text" autocomplete="name" placeholder="Your full name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required><label for="email">Email address</label><input id="email" name="email" type="email" autocomplete="email" placeholder="you@example.com" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required><label for="password">Password</label><input id="password" name="password" type="password" autocomplete="new-password" placeholder="At least 6 characters" required><label for="confirm_password">Confirm password</label><input id="confirm_password" name="confirm_password" type="password" autocomplete="new-password" placeholder="Repeat your password" required><button class="button button-primary" type="submit">Create account <span aria-hidden="true">&#8594;</span></button></form>
            <p class="auth-switch">Already have an account? <a href="login.php">Sign in</a></p>
        </section>
    </main>
    <script src="../assets/js/validation.js"></script>
</body>

</html>