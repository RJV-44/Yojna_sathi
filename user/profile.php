<?php
session_start();
$user = $_SESSION['user'] ?? null;
if (!$user) {
    header('Location: login.php');
    exit;
}

$isUpdated = isset($_GET['updated']);
$isWelcome = isset($_GET['welcome']);

$fullName = $user['name'] ?? 'Citizen';
$initials = strtoupper(substr($fullName, 0, 1) . (strrpos($fullName, ' ') !== false ? substr($fullName, strrpos($fullName, ' ') + 1, 1) : ''));
$email = $user['email'] ?? '';
$district = $user['district'] ?? '';
$interest = $user['interest'] ?? 'Education';

// Calculate initial completion percentage
$completion = 25; // Base for email
if (!empty($fullName)) $completion += 25;
if (!empty($district)) $completion += 25;
if (!empty($interest)) $completion += 25;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Manage your Yojna Sathi citizen profile, update your district, and track matched schemes.">
    <title>My Profile | Yojna Sathi</title>
    <link rel="stylesheet" href="../assets/css/home.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../assets/css/user-pages.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../assets/css/validation.css?v=<?= time() ?>">
</head>

<body>
    <!-- Site Header -->
    <header class="site-header" id="topHeader">
        <div class="container nav-wrap">
            <a class="brand" href="../index.php" aria-label="Yojna Sathi Home">
                <span class="brand-mark">YS</span>
                <span class="brand-copy">
                    <strong>Yojna Sathi</strong>
                    <small>Your benefits, one place</small>
                </span>
            </a>

            <nav class="main-nav" aria-label="Primary navigation">
                <a class="nav-link" href="../index.php">Home</a>
                <a class="nav-link" href="schemes.php">Schemes</a>
                <a class="nav-link" href="scholarships.php">Scholarships</a>

                <div class="nav-dropdown">
                    <button class="nav-dropdown-toggle" type="button" aria-expanded="false" aria-haspopup="true">
                        <span>More</span>
                        <svg class="chevron-icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="nav-dropdown-menu">
                        <a class="nav-dropdown-item" href="announcements.php">
                            <span class="dropdown-icon">📢</span>
                            <div class="dropdown-item-text">
                                <span class="dropdown-title">Updates & Alerts</span>
                                <span class="dropdown-desc">Latest news & scheme deadlines</span>
                            </div>
                        </a>
                        <a class="nav-dropdown-item" href="about.php">
                            <span class="dropdown-icon">ℹ️</span>
                            <div class="dropdown-item-text">
                                <span class="dropdown-title">About Us</span>
                                <span class="dropdown-desc">Mission, values & citizen impact</span>
                            </div>
                        </a>
                        <a class="nav-dropdown-item" href="contact.php">
                            <span class="dropdown-icon">📞</span>
                            <div class="dropdown-item-text">
                                <span class="dropdown-title">Help & Contact</span>
                                <span class="dropdown-desc">Toll-free helpline & citizen support</span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="nav-divider" aria-hidden="true"></div>

                <div class="nav-actions">
                    <a class="nav-user-chip" href="profile.php" style="background: var(--primary-border);">
                        <span class="nav-user-avatar"><?= htmlspecialchars($initials) ?></span>
                        <span><?= htmlspecialchars(strtok($fullName, ' ')) ?></span>
                    </a>
                    <a class="nav-login" href="logout.php">Logout</a>
                </div>
            </nav>

            <button class="menu-toggle" type="button" aria-label="Toggle navigation" aria-expanded="false">
                <div class="menu-toggle-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
        </div>
    </header>

    <main>
        <!-- Page Hero -->
        <section class="page-hero">
            <div class="container page-hero-content">
                <div class="breadcrumbs">
                    <a href="../index.php">Home</a> &gt; <span>Citizen Profile</span>
                </div>
                <p class="eyebrow">Citizen Dashboard</p>
                <h1>Welcome, <?= htmlspecialchars($fullName) ?></h1>
                <p>Keep your district and preferred sectors updated to ensure you receive accurate eligibility recommendations and application deadline notifications.</p>
            </div>
        </section>

        <!-- Main Profile Layout -->
        <div class="container profile-layout">
            <!-- Left Profile Sidebar Card -->
            <aside class="profile-card">
                <div class="profile-avatar-large"><?= htmlspecialchars($initials) ?></div>
                <h2><?= htmlspecialchars($fullName) ?></h2>
                <p class="profile-card-email"><?= htmlspecialchars($email) ?></p>

                <!-- Dynamic Profile Progress -->
                <div class="profile-progress-wrap">
                    <div class="progress-header">
                        <span>Profile Readiness</span>
                        <span id="profile-progress-percent"><?= $completion ?>% Complete</span>
                    </div>
                    <div class="progress-track">
                        <div class="progress-fill" id="profile-progress-fill" style="width: <?= $completion ?>%;"></div>
                    </div>
                </div>

                <ul class="profile-nav-list">
                    <li><a class="active" href="profile.php"><span>&#128100; Personal Details</span> <span>&rarr;</span></a></li>
                    <li><a href="schemes.php"><span>&#128220; Browse All Schemes</span> <span>&rarr;</span></a></li>
                    <li><a href="scholarships.php"><span>&#127891; Scholarships</span> <span>&rarr;</span></a></li>
                    <li><a href="logout.php" style="color: var(--accent-coral);"><span>&#128275; Sign Out</span></a></li>
                </ul>
            </aside>

            <!-- Right Profile Settings Form Card -->
            <div class="profile-form-card">
                <?php if ($isUpdated): ?>
                    <div class="form-success" style="display: flex; align-items: center; gap: 10px; padding: 14px 18px; background: var(--accent-green-soft); border-radius: var(--radius-md); color: #065f46; font-weight: 700; margin-bottom: 24px;">
                        <span>&#10003;</span>
                        <span>Your citizen profile details have been successfully updated!</span>
                    </div>
                <?php elseif ($isWelcome): ?>
                    <div class="form-success" style="display: flex; align-items: center; gap: 10px; padding: 14px 18px; background: var(--primary-soft); border-radius: var(--radius-md); color: var(--primary-dark); font-weight: 700; margin-bottom: 24px;">
                        <span>&#127881;</span>
                        <span>Welcome to Yojna Sathi! Please verify your district to receive tailored scheme updates.</span>
                    </div>
                <?php endif; ?>

                <h2>Edit Personal & Preference Details</h2>
                <p>These details are used to filter and highlight schemes available in your region.</p>

                <form class="profile-form" id="profileForm" method="post" action="save-profile.php" novalidate>
                    <div class="form-group">
                        <label for="full-name">Full Legal Name <span style="color: var(--accent-coral);">*</span></label>
                        <input class="form-input" id="full-name" name="name" type="text" value="<?= htmlspecialchars($fullName) ?>" placeholder="Enter your full name" required minlength="2">
                    </div>

                    <div class="form-group">
                        <label for="email">Registered Email Address</label>
                        <input class="form-input" id="email" type="email" value="<?= htmlspecialchars($email) ?>" readonly style="background: var(--surface-alt); cursor: not-allowed; color: var(--muted);">
                        <small style="color: var(--muted); font-size: 0.8rem; margin-top: 4px; display: block;">Email is linked to your citizen account authentication.</small>
                    </div>

                    <div class="form-group">
                        <label for="district">District / Region <span style="color: var(--accent-coral);">*</span></label>
                        <input class="form-input" id="district" name="district" type="text" value="<?= htmlspecialchars($district) ?>" placeholder="e.g. Central Delhi, Pune, Patna" required>
                    </div>

                    <div class="form-group">
                        <label for="interest">Primary Sector of Interest</label>
                        <select class="form-select" id="interest" name="interest">
                            <option value="Education" <?= $interest === 'Education' ? 'selected' : '' ?>>Education & Student Scholarships</option>
                            <option value="Farming" <?= ($interest === 'Farming' || $interest === 'Agriculture') ? 'selected' : '' ?>>Farming & Agricultural Subsidies</option>
                            <option value="Business" <?= $interest === 'Business' ? 'selected' : '' ?>>Business & MSME Entrepreneurship</option>
                            <option value="Family support" <?= ($interest === 'Family support' || $interest === 'Healthcare') ? 'selected' : '' ?>>Family Support & Healthcare Cards</option>
                            <option value="Housing" <?= $interest === 'Housing' ? 'selected' : '' ?>>Housing & Home Construction</option>
                        </select>
                    </div>

                    <button class="button button-primary button-lg" type="submit" style="margin-top: 8px;">
                        Save Profile Preferences
                    </button>
                </form>

                <!-- Matched Schemes Recommended for You -->
                <div style="margin-top: 48px; padding-top: 36px; border-top: 1px solid var(--line);">
                    <h3 style="font-family: var(--font-heading); font-size: 1.3rem; margin-bottom: 16px; color: var(--ink);">
                        Recommended Programs for You in <?= htmlspecialchars($interest) ?>
                    </h3>

                    <div style="display: grid; gap: 14px;">
                        <?php if ($interest === 'Farming' || $interest === 'Agriculture'): ?>
                            <div style="display: flex; justify-content: space-between; align-items: center; padding: 16px 20px; background: var(--surface-alt); border-radius: var(--radius-md); border: 1px solid var(--line);">
                                <div>
                                    <strong style="display: block; font-size: 1rem; color: var(--ink);">Kisan Farm Loan & Equipment Grant</strong>
                                    <small style="color: var(--muted);">Low-interest loans + 50% machinery subsidy</small>
                                </div>
                                <a href="scheme-details.php?type=farmer" class="button button-sm button-primary">View &rarr;</a>
                            </div>
                        <?php elseif ($interest === 'Business'): ?>
                            <div style="display: flex; justify-content: space-between; align-items: center; padding: 16px 20px; background: var(--surface-alt); border-radius: var(--radius-md); border: 1px solid var(--line);">
                                <div>
                                    <strong style="display: block; font-size: 1rem; color: var(--ink);">MSME Micro-Enterprise Growth Loan</strong>
                                    <small style="color: var(--muted);">Collateral-free working capital up to ₹10 Lakh</small>
                                </div>
                                <a href="scheme-details.php?type=business" class="button button-sm button-primary">View &rarr;</a>
                            </div>
                        <?php else: ?>
                            <div style="display: flex; justify-content: space-between; align-items: center; padding: 16px 20px; background: var(--surface-alt); border-radius: var(--radius-md); border: 1px solid var(--line);">
                                <div>
                                    <strong style="display: block; font-size: 1rem; color: var(--ink);">National Merit Scholarship</strong>
                                    <small style="color: var(--muted);">Up to ₹50,000 / year for undergraduate college students</small>
                                </div>
                                <a href="scholarship-details.php?type=merit" class="button button-sm button-primary">View &rarr;</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a class="brand" href="../index.php" style="margin-bottom: 14px;">
                        <span class="brand-mark">YS</span>
                        <span class="brand-copy">
                            <strong style="color: #ffffff;">Yojna Sathi</strong>
                            <small style="color: #94a3b8;">Your benefits, one place</small>
                        </span>
                    </a>
                    <p>Designed for citizen welfare, transparent digital governance, and equal opportunity.</p>
                </div>

                <div class="footer-col">
                    <h4>Browse</h4>
                    <ul class="footer-links">
                        <li><a href="schemes.php">Government Schemes</a></li>
                        <li><a href="scholarships.php">Student Scholarships</a></li>
                        <li><a href="announcements.php">Latest Deadlines</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>About</h4>
                    <ul class="footer-links">
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="contact.php">Contact & Support</a></li>
                        <li><a href="../admin/index.php" style="color: var(--accent-gold); font-weight: 700;">Administrator Access</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Helpline</h4>
                    <p style="font-size: 0.9rem; color: #94a3b8; line-height: 1.6;">
                        Toll-Free Support:<br>
                        <strong style="color: var(--accent-gold); font-size: 1.1rem;">1800-111-2026</strong>
                    </p>
                </div>
            </div>

            <div class="footer-bottom">
                <span>&copy; <?= date('Y') ?> Yojna Sathi. Dedicated to public welfare.</span>
                <div style="display: flex; gap: 20px;">
                    <a href="../index.php">Home</a>
                    <a href="#topHeader">Back to Top &#8593;</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/validation.js"></script>
</body>

</html>