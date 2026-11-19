<?php
session_start();
$isLoggedIn = isset($_SESSION['user']);
$user = $_SESSION['user'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Discover government scholarships, fee waivers, and research grants for school, undergraduate, and postgraduate students.">
    <title>Scholarships Directory | Yojna Sathi</title>
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
                <a class="nav-link active" href="scholarships.php">Scholarships</a>

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
                    <?php if ($isLoggedIn): ?>
                        <a class="nav-user-chip" href="profile.php">
                            <span class="nav-user-avatar"><?= strtoupper(substr($user['name'] ?? 'U', 0, 1)) ?></span>
                            <span><?= htmlspecialchars(strtok($user['name'] ?? 'User', ' ')) ?></span>
                        </a>
                        <a class="nav-login" href="logout.php">Logout</a>
                    <?php else: ?>
                        <a class="nav-login" href="login.php">Login</a>
                        <a class="button button-primary nav-register" href="register.php">Register</a>
                    <?php endif; ?>
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
                    <a href="../index.php">Home</a> &gt; <span>Scholarships</span>
                </div>
                <p class="eyebrow">Education Support & Grants</p>
                <h1>Student Scholarships & Grants</h1>
                <p>Explore central, state, and institutional scholarships covering tuition fees, hostel expenses, exam costs, and research stipends for deserving students.</p>
            </div>
        </section>

        <!-- Scholarship Directory -->
        <section class="schemes-section" style="padding-top: 0;">
            <div class="container">
                <!-- Search Bar -->
                <div class="search-bar-wrap">
                    <div class="search-bar">
                        <svg viewBox="0 0 20 20" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                        <input id="scheme-search" type="search" placeholder="Search by scholarship name, course, degree, or eligibility..." aria-label="Search scholarships">
                        <button type="button" class="search-clear-btn" id="search-clear" aria-label="Clear search">&#10005;</button>
                    </div>
                    <span class="results-count" id="results-count">Showing all scholarships</span>
                </div>

                <!-- Category Filters -->
                <div class="category-row" aria-label="Filter Scholarships">
                    <button class="category active" type="button" data-filter="all">
                        All Scholarships <span class="category-badge">6</span>
                    </button>
                    <button class="category" type="button" data-filter="merit">
                        Merit-Based <span class="category-badge">2</span>
                    </button>
                    <button class="category" type="button" data-filter="higher-ed">
                        Higher Ed & Research <span class="category-badge">2</span>
                    </button>
                    <button class="category" type="button" data-filter="girls">
                        Girls & Women in STEM <span class="category-badge">1</span>
                    </button>
                    <button class="category" type="button" data-filter="school">
                        Pre-Matric & School <span class="category-badge">1</span>
                    </button>
                </div>

                <!-- Scholarships Grid -->
                <div class="scheme-grid" id="scheme-list">
                    <!-- Scholarship 1: Merit -->
                    <article class="scheme-card" data-category="merit" data-search="national merit scholarship undergraduate college marks 80% tuition fee waiver">
                        <div class="card-meta">
                            <span class="card-icon yellow">ED</span>
                            <span class="status-badge open">Open Now</span>
                        </div>
                        <h3>National Merit Scholarship</h3>
                        <p>Awarded to high-achieving undergraduate students from households with family income below ₹6 Lakh per annum. Covers full tuition and books.</p>
                        <div class="scheme-tags">
                            <span class="scheme-tag">Undergraduates</span>
                            <span class="scheme-tag">₹50,000 / year</span>
                            <span class="scheme-tag">Min 80% Marks</span>
                        </div>
                        <div class="scheme-card-footer">
                            <a href="scholarship-details.php?type=merit">Check Eligibility <span>&#8594;</span></a>
                        </div>
                    </article>

                    <!-- Scholarship 2: Higher Ed Stipend -->
                    <article class="scheme-card" data-category="higher-ed" data-search="postgraduate research stipend masters phd stem fellowship stipend science">
                        <div class="card-meta">
                            <span class="card-icon green">ST</span>
                            <span class="status-badge open">Open Now</span>
                        </div>
                        <h3>Postgraduate STEM Fellowship</h3>
                        <p>Full monthly stipend plus annual contingency grant for students enrolled in Master’s or Doctoral programs in Science and Engineering.</p>
                        <div class="scheme-tags">
                            <span class="scheme-tag">Postgraduates / PhD</span>
                            <span class="scheme-tag">₹31,000 / month</span>
                            <span class="scheme-tag">STEM Fields</span>
                        </div>
                        <div class="scheme-card-footer">
                            <a href="scholarship-details.php?type=student">Check Eligibility <span>&#8594;</span></a>
                        </div>
                    </article>

                    <!-- Scholarship 3: Girls in STEM -->
                    <article class="scheme-card" data-category="girls" data-search="girls women technical engineering diploma pragati stem female female student">
                        <div class="card-meta">
                            <span class="card-icon coral">PR</span>
                            <span class="status-badge open">Open Now</span>
                        </div>
                        <h3>Pragati Scholarship for Girls</h3>
                        <p>Specialized initiative to encourage girl students pursuing technical degree or diploma courses across accredited engineering institutes.</p>
                        <div class="scheme-tags">
                            <span class="scheme-tag">Girls Only</span>
                            <span class="scheme-tag">₹50,000 / year</span>
                            <span class="scheme-tag">Technical / Diploma</span>
                        </div>
                        <div class="scheme-card-footer">
                            <a href="scholarship-details.php?type=girls">Check Eligibility <span>&#8594;</span></a>
                        </div>
                    </article>

                    <!-- Scholarship 4: Merit Secondary -->
                    <article class="scheme-card" data-category="merit" data-search="means cum merit exam nmms class 9 10 11 12 competitive school test">
                        <div class="card-meta">
                            <span class="card-icon blue">MM</span>
                            <span class="status-badge open">Open Now</span>
                        </div>
                        <h3>National Means-cum-Merit Grant</h3>
                        <p>Aimed at stopping secondary school dropouts, providing an annual scholarship to students selected through a state aptitude test.</p>
                        <div class="scheme-tags">
                            <span class="scheme-tag">Classes 9 to 12</span>
                            <span class="scheme-tag">₹12,000 / year</span>
                            <span class="scheme-tag">Aptitude Test</span>
                        </div>
                        <div class="scheme-card-footer">
                            <a href="scholarship-details.php?type=nmms">Check Eligibility <span>&#8594;</span></a>
                        </div>
                    </article>

                    <!-- Scholarship 5: Pre-Matric -->
                    <article class="scheme-card" data-category="school" data-search="pre matric school uniform books scholarship class 1 to 10 disadvantaged">
                        <div class="card-meta">
                            <span class="card-icon yellow">PM</span>
                            <span class="status-badge open">Open Now</span>
                        </div>
                        <h3>Pre-Matric Citizen Education Support</h3>
                        <p>Assistance for children in classes 1 to 10 to purchase textbooks, uniforms, and stationery, disbursed directly to parent bank accounts.</p>
                        <div class="scheme-tags">
                            <span class="scheme-tag">School Students</span>
                            <span class="scheme-tag">₹4,000 / year</span>
                            <span class="scheme-tag">Direct Transfer</span>
                        </div>
                        <div class="scheme-card-footer">
                            <a href="scholarship-details.php?type=prematric">Check Eligibility <span>&#8594;</span></a>
                        </div>
                    </article>

                    <!-- Scholarship 6: Overseas Studies -->
                    <article class="scheme-card" data-category="higher-ed" data-search="overseas foreign university international masters foreign study abroad flight visa">
                        <div class="card-meta">
                            <span class="card-icon purple">OS</span>
                            <span class="status-badge upcoming">Applications Soon</span>
                        </div>
                        <h3>National Overseas Study Grant</h3>
                        <p>Financial assistance for meritorious students selected for Master's or Ph.D. degrees in prestigious top 500 world universities.</p>
                        <div class="scheme-tags">
                            <span class="scheme-tag">Abroad Studies</span>
                            <span class="scheme-tag">Full Tuition + Living</span>
                            <span class="scheme-tag">Top 500 Global Unis</span>
                        </div>
                        <div class="scheme-card-footer">
                            <a href="scholarship-details.php?type=overseas">Check Eligibility <span>&#8594;</span></a>
                        </div>
                    </article>
                </div>

                <!-- Empty State -->
                <div class="empty-state" id="empty-state" hidden>
                    <svg viewBox="0 0 24 24">
                        <path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                    </svg>
                    <h3>No matching scholarships found</h3>
                    <p>Try searching by course name, class level, or resetting the filter category.</p>
                    <button class="button button-secondary" type="button" id="reset-filters-btn">Reset All Filters</button>
                </div>
            </div>
        </section>
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
                    <p>Connecting students across India with legitimate, government-funded educational grants, fellowships, and fee remissions.</p>
                </div>

                <div class="footer-col">
                    <h4>Scholarship Types</h4>
                    <ul class="footer-links">
                        <li><a href="scholarships.php">Merit-Based Awards</a></li>
                        <li><a href="scholarships.php">STEM Research Grants</a></li>
                        <li><a href="scholarships.php">Girls Technical Grants</a></li>
                        <li><a href="scholarships.php">Pre-Matric School Aid</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Portals & Support</h4>
                    <ul class="footer-links">
                        <li><a href="about.php">About Yojna Sathi</a></li>
                        <li><a href="contact.php">Helpdesk Contact</a></li>
                        <li><a href="announcements.php">Application Deadlines</a></li>
                        <li><a href="../admin/index.php" style="color: var(--accent-gold); font-weight: 700;">Administrator Access</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Helpline</h4>
                    <p style="font-size: 0.9rem; color: #94a3b8; line-height: 1.6;">
                        National Scholarship Helpdesk:<br>
                        <strong style="color: var(--accent-gold); font-size: 1.1rem;">0120-6619540</strong><br>
                        Mon - Fri (9:30 AM - 5:30 PM)
                    </p>
                </div>
            </div>

            <div class="footer-bottom">
                <span>&copy; <?= date('Y') ?> Yojna Sathi. Built for student advancement.</span>
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