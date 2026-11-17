<?php
$type = $_GET['type'] ?? 'merit';
$title = $type === 'student' ? 'Student Support Grant' : 'Merit Scholarship';
$description = $type === 'student' ? 'Help with essential education costs for eligible students in higher education.' : 'Support for academically outstanding students from low-income households.';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?> | Yojna Sathi</title>
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/css/user-pages.css">
</head>

<body>
    <header class="site-header">
        <div class="container nav-wrap"><a class="brand" href="../index.php"><span class="brand-mark">YS</span><span class="brand-copy"><strong>Yojna Sathi</strong><small>Your benefits, one place</small></span></a>
            <nav class="main-nav"><a href="schemes.php">Find schemes</a><a class="active" href="scholarships.php">Scholarships</a><a href="about.php">About us</a><a href="announcements.php">Updates</a><a href="contact.php">Contact</a><a href="profile.php">Profile</a></nav>
        </div>
    </header>
    <main>
        <section class="schemes-section">
            <div class="container">
                <p class="eyebrow">Education support</p>
                <h1><?= htmlspecialchars($title) ?></h1>
                <p class="hero-text"><?= htmlspecialchars($description) ?></p>
                <div class="scheme-card" style="max-width:680px;margin-top:36px">
                    <h3>Eligibility overview</h3>
                    <p>Students should review the academic, income, and course requirements before applying. Keep identity, enrolment, and income documents ready.</p><a class="button button-primary" href="scholarships.php">Back to scholarships <span>&#8594;</span></a>
                </div>
            </div>
        </section>
    </main>
    <footer class="site-footer">
        <div class="container footer-wrap"><span class="brand-footer">YS <strong>Yojna Sathi</strong></span><a href="../index.php">Back to home</a></div>
    </footer>
</body>

</html>