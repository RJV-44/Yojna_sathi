<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contact Yojna Sathi support.">
    <title>Contact Us | Yojna Sathi</title>
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/css/user-pages.css">
    <link rel="stylesheet" href="../assets/css/validation.css">
</head>

<body>
    <header class="site-header">
        <div class="container nav-wrap"><a class="brand" href="../index.php" aria-label="Yojna Sathi home"><span class="brand-mark">YS</span><span class="brand-copy"><strong>Yojna Sathi</strong><small>Your benefits, one place</small></span></a>
            <nav class="main-nav" aria-label="Primary navigation"><a href="schemes.php">Find schemes</a><a href="scholarships.php">Scholarships</a><a href="about.php">About us</a><a class="active" href="contact.php">Contact</a><a href="profile.php">Profile</a></nav><button class="menu-toggle" type="button" aria-label="Toggle navigation" aria-expanded="false">Menu</button>
        </div>
    </header>
    <main>
        <section class="info-section">
            <div class="container contact-grid">
                <div>
                    <p class="eyebrow">We are here to help</p>
                    <h1>Tell us what you need.</h1>
                    <p class="hero-text">Have a question about a scheme, scholarship, or application? Send a message and our support team will review it.</p>
                    <div class="contact-details">
                        <div><strong>Email</strong><span>help@yojnasathi.in</span></div>
                        <div><strong>Hours</strong><span>Monday to Friday, 9:00 AM to 6:00 PM</span></div>
                    </div>
                </div>
                <form class="contact-form" id="contactForm" novalidate><label for="name">Full name</label><input id="name" name="name" type="text" required><label for="email">Email address</label><input id="email" name="email" type="email" required><label for="message">How can we help?</label><textarea id="message" name="message" rows="5" required></textarea><button class="button button-primary" type="submit">Send message <span aria-hidden="true">&#8594;</span></button>
                    <p id="contact-success" class="form-success" hidden>Thank you. Your message has been recorded.</p>
                </form>
            </div>
        </section>
    </main>
    <footer class="site-footer">
        <div class="container footer-wrap"><span class="brand-footer">YS <strong>Yojna Sathi</strong></span><a href="../index.php">Back to home</a><a href="about.php">About us</a></div>
    </footer>
    <script src="../assets/js/validation.js"></script>
</body>

</html>