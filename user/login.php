<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $password === '') {
        $error = 'Enter a valid email address and password.';
    } else {
        $_SESSION['user'] = [
            'name' => $_SESSION['user']['name'] ?? ucfirst(strtok($email, '@')),
            'email' => $email,
            'district' => $_SESSION['user']['district'] ?? '',
            'interest' => $_SESSION['user']['interest'] ?? '',
        ];
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
    <title>Login | Yojna Sathi</title>
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/css/user-pages.css">
    <link rel="stylesheet" href="../assets/css/auth-pages.css">
    <link rel="stylesheet" href="../assets/css/validation.css">
</head>

<body class="auth-page">
    <main class="auth-layout">
        <div class="auth-intro"><a class="brand" href="../index.php"><span class="brand-mark">YS</span><span class="brand-copy"><strong>Yojna Sathi</strong><small>Your benefits, one place</small></span></a>
            <p class="eyebrow">Welcome back</p>
            <h1>Pick up where you left off.</h1>
            <p class="hero-text">Sign in to keep your profile details and find support that matches your needs.</p><a class="text-link" href="../index.php">Back to home <span aria-hidden="true">&#8594;</span></a>
        </div>
        <section class="auth-card-public">
            <p class="eyebrow">Citizen account</p>
            <h2>Sign in</h2>
            <p class="auth-helper">Use your email address to access your profile.</p><?php if ($error): ?><p class="form-error"><?= htmlspecialchars($error) ?></p><?php endif; ?><form method="post" novalidate><label for="email">Email address</label><input id="email" name="email" type="email" autocomplete="email" placeholder="you@example.com" required><label for="password">Password</label><input id="password" name="password" type="password" autocomplete="current-password" placeholder="Enter your password" required><label class="check-label"><input type="checkbox" name="remember"> Remember me</label><button class="button button-primary" type="submit">Sign in <span aria-hidden="true">&#8594;</span></button></form>
            <p class="auth-switch">New to Yojna Sathi? <a href="register.php">Create an account</a></p>
        </section>
    </main>
    <script src="../assets/js/validation.js"></script>
</body>

</html>