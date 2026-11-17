<?php
$type = $_GET['type'] ?? 'farmer';
$details = [
    'farmer' => ['Farm Loan Assistance', 'Agriculture', 'Financial support to help farmers invest in equipment and improve their harvest.'],
    'business' => ['Small Business Support', 'Business', 'Guidance and assistance for local entrepreneurs building a stronger business.'],
    'health' => ['Healthcare Support Scheme', 'Family support', 'Support to help eligible families access essential healthcare services.'],
];
$scheme = $details[$type] ?? $details['farmer'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($scheme[0]) ?> | Yojna Sathi</title>
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/css/user-pages.css">
</head>

<body>
    <header class="site-header">
        <div class="container nav-wrap"><a class="brand" href="../index.php"><span class="brand-mark">YS</span><span class="brand-copy"><strong>Yojna Sathi</strong><small>Your benefits, one place</small></span></a>
            <nav class="main-nav"><a href="schemes.php">Find schemes</a><a href="scholarships.php">Scholarships</a><a href="about.php">About us</a><a href="announcements.php">Updates</a><a href="contact.php">Contact</a><a href="profile.php">Profile</a></nav>
        </div>
    </header>
    <main>
        <section class="schemes-section">
            <div class="container">
                <p class="eyebrow"><?= htmlspecialchars($scheme[1]) ?></p>
                <h1><?= htmlspecialchars($scheme[0]) ?></h1>
                <p class="hero-text"><?= htmlspecialchars($scheme[2]) ?></p>
                <div class="scheme-card" style="max-width:680px;margin-top:36px">
                    <h3>What you may need</h3>
                    <p>Identity proof, address proof, income certificate, and documents related to your application. Requirements may vary by program.</p>
                    <h3>Next step</h3>
                    <p>Review the official eligibility rules and contact your nearest authorised service centre before submitting an application.</p><a class="button button-primary" href="schemes.php">Back to schemes <span>&#8594;</span></a>
                </div>
            </div>
        </section>
    </main>
    <footer class="site-footer">
        <div class="container footer-wrap"><span class="brand-footer">YS <strong>Yojna Sathi</strong></span><a href="../index.php">Back to home</a></div>
    </footer>
</body>

</html>