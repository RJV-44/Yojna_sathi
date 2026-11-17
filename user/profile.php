<?php
session_start();
$user = $_SESSION['user'] ?? null;
if (!$user) {
    header('Location: login.php');
    exit;
}
$initials = strtoupper(substr($user['name'], 0, 1) . (strrpos($user['name'], ' ') !== false ? substr($user['name'], strrpos($user['name'], ' ') + 1, 1) : ''));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your Yojna Sathi profile.">
    <title>My Profile | Yojna Sathi</title>
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/css/user-pages.css">
    <link rel="stylesheet" href="../assets/css/validation.css">
</head>

<body>
    <header class="site-header">
        <div class="container nav-wrap"><a class="brand" href="../index.php" aria-label="Yojna Sathi home"><span class="brand-mark">YS</span><span class="brand-copy"><strong>Yojna Sathi</strong><small>Your benefits, one place</small></span></a>
            <nav class="main-nav" aria-label="Primary navigation"><a href="schemes.php">Find schemes</a><a href="scholarships.php">Scholarships</a><a href="about.php">About us</a><a href="contact.php">Contact</a><a class="active" href="profile.php">Profile</a><a href="logout.php">Sign out</a></nav>
        </div>
    </header>
    <main>
        <section class="info-section">
            <div class="container profile-layout">
                <div class="profile-heading">
                    <p class="eyebrow">Your space</p>
                    <h1>My profile</h1>
                    <p class="hero-text">Keep your basic details ready so applying for support is easier.</p>
                </div>
                <div class="profile-card">
                    <div class="profile-avatar"><?= htmlspecialchars($initials) ?></div>
                    <div>
                        <h2>Welcome, <?= htmlspecialchars($user['name']) ?></h2>
                        <p><?= htmlspecialchars($user['email']) ?></p>
                    </div>
                    <div class="profile-status"><span></span> Profile setup: 40%</div>
                    <form class="profile-form" id="profileForm" method="post" action="save-profile.php" novalidate><label for="full-name">Full name</label><input id="full-name" name="name" type="text" value="<?= htmlspecialchars($user['name']) ?>" placeholder="Enter your full name" required><label for="district">District</label><input id="district" name="district" type="text" value="<?= htmlspecialchars($user['district']) ?>" placeholder="Enter your district"><label for="interest">Primary interest</label><select id="interest" name="interest">
                            <option>Choose a category</option>
                            <option <?= $user['interest'] === 'Education' ? 'selected' : '' ?>>Education</option>
                            <option <?= $user['interest'] === 'Farming' ? 'selected' : '' ?>>Farming</option>
                            <option <?= $user['interest'] === 'Business' ? 'selected' : '' ?>>Business</option>
                            <option <?= $user['interest'] === 'Family support' ? 'selected' : '' ?>>Family support</option>
                        </select><button class="button button-primary" type="submit">Save profile</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <footer class="site-footer">
        <div class="container footer-wrap"><span class="brand-footer">YS <strong>Yojna Sathi</strong></span><a href="../index.php">Back to home</a><a href="contact.php">Contact us</a></div>
    </footer>
    <script src="../assets/js/validation.js"></script>
</body>

</html>