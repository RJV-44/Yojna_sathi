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
    <meta name="description" content="Find government schemes, scholarships, and citizen support programs with Yojna Sathi. One trusted portal for all benefits.">
    <title>Yojna Sathi | Government Schemes & Scholarships Made Simple</title>
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/validation.css">
</head>

<body>
    <!-- Site Navigation Header -->
    <header class="site-header" id="topHeader">
        <div class="container nav-wrap">
            <a class="brand" href="index.php" aria-label="Yojna Sathi Home">
                <span class="brand-mark">YS</span>
                <span class="brand-copy">
                    <strong>Yojna Sathi</strong>
                    <small>Your benefits, one place</small>
                </span>
            </a>

            <nav class="main-nav" aria-label="Primary navigation">
                <a class="nav-link active" href="index.php">Home</a>
                <a class="nav-link" href="#schemes">Schemes</a>
                <a class="nav-link" href="user/scholarships.php">Scholarships</a>

                <div class="nav-dropdown">
                    <button class="nav-dropdown-toggle" type="button" aria-expanded="false" aria-haspopup="true">
                        <span>More</span>
                        <svg class="chevron-icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="nav-dropdown-menu">
                        <a class="nav-dropdown-item" href="#how-it-works">
                            <span class="dropdown-icon">💡</span>
                            <div class="dropdown-item-text">
                                <span class="dropdown-title">How It Works</span>
                                <span class="dropdown-desc">Step-by-step guidance & benefits</span>
                            </div>
                        </a>
                        <a class="nav-dropdown-item" href="user/announcements.php">
                            <span class="dropdown-icon">📢</span>
                            <div class="dropdown-item-text">
                                <span class="dropdown-title">Updates & Alerts</span>
                                <span class="dropdown-desc">Latest news & scheme deadlines</span>
                            </div>
                        </a>
                        <a class="nav-dropdown-item" href="user/about.php">
                            <span class="dropdown-icon">ℹ️</span>
                            <div class="dropdown-item-text">
                                <span class="dropdown-title">About Us</span>
                                <span class="dropdown-desc">Mission, values & citizen impact</span>
                            </div>
                        </a>
                        <a class="nav-dropdown-item" href="user/contact.php">
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
                        <a class="nav-user-chip" href="user/profile.php">
                            <span class="nav-user-avatar"><?= strtoupper(substr($user['name'] ?? 'U', 0, 1)) ?></span>
                            <span><?= htmlspecialchars(strtok($user['name'] ?? 'User', ' ')) ?></span>
                        </a>
                        <a class="nav-login" href="user/logout.php">Logout</a>
                    <?php else: ?>
                        <a class="nav-login" href="user/login.php">Login</a>
                        <a class="button button-primary nav-register" href="user/register.php">Register</a>
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
        <!-- Hero Section -->
        <section class="hero">
            <div class="container hero-grid">
                <div class="hero-copy">
                    <p class="eyebrow">A Simpler Way to Access Public Support</p>
                    <h1>Discover government schemes made for <em>your next step.</em></h1>
                    <p class="hero-text">Search scholarships, farming grants, business capital, and family welfare programs in one verified place. Clear eligibility, no confusion.</p>
                    <div class="hero-actions">
                        <a class="button button-primary button-lg" href="#schemes">
                            Explore Schemes <span aria-hidden="true">&#8594;</span>
                        </a>
                        <a class="button button-secondary button-lg" href="user/scholarships.php">
                            Browse Scholarships
                        </a>
                    </div>
                    <div class="trust-row">
                        <div class="trust-pill"><span class="trust-dot"></span><strong>100% Free</strong> for Citizens</div>
                        <div class="trust-pill"><span class="live-dot"></span><strong>Updated Daily</strong> with Central & State Data</div>
                    </div>
                </div>

                <div class="hero-panel" aria-label="Quick benefit finder">
                    <div class="panel-header-badge">
                        <div class="panel-topline"><span class="live-dot"></span> Live Support Finder</div>
                        <small style="color: var(--muted); font-weight: 600;">2026 Edition</small>
                    </div>
                    <div class="panel-question">What kind of assistance do you need today?</div>
                    
                    <div class="mini-search-box" id="hero-search-pill" data-query="scholarship" role="button" tabindex="0" title="Click to search scholarships">
                        <svg viewBox="0 0 20 20" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                        <span>Try "student scholarship"</span>
                        <strong>Search &#8599;</strong>
                    </div>

                    <a class="match-card" href="user/schemes.php">
                        <span class="match-icon">01</span>
                        <div class="match-card-content">
                            <strong>Personalised Matches</strong>
                            <small>Browse by category: Agriculture, Education, Business</small>
                        </div>
                        <span class="match-arrow">&#8599;</span>
                    </a>

                    <a class="match-card" href="#how-it-works">
                        <span class="match-icon">02</span>
                        <div class="match-card-content">
                            <strong>Clear Document Checklist</strong>
                            <small>Know what documents you need before applying</small>
                        </div>
                        <span class="match-arrow">&#8599;</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- Stats Strip -->
        <section class="stats-strip">
            <div class="container stats-grid">
                <div class="stat-item">
                    <strong class="stat-number">120+</strong>
                    <span class="stat-label">Active Schemes</span>
                </div>
                <div class="stat-item">
                    <strong class="stat-number">35</strong>
                    <span class="stat-label">Citizen Categories</span>
                </div>
                <div class="stat-item">
                    <strong class="stat-number">24/7</strong>
                    <span class="stat-label">Instant Access</span>
                </div>
                <div class="stats-note">
                    <strong>Direct Citizen Empowerment</strong>
                    Built to help every citizen move from endless searching to immediate action.
                </div>
            </div>
        </section>

        <!-- Schemes Directory Section -->
        <section class="schemes-section" id="schemes">
            <div class="container">
                <div class="section-heading">
                    <div>
                        <p class="eyebrow">Explore Programs</p>
                        <h2>Find the Right Support</h2>
                    </div>
                    <p class="section-subtitle">Search by keyword or filter by your specific field to find verified financial grants and benefits.</p>
                </div>

                <div class="search-bar-wrap">
                    <div class="search-bar">
                        <svg viewBox="0 0 20 20" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                        <input id="scheme-search" type="search" placeholder="Search schemes, scholarships, farmer support, loans..." aria-label="Search schemes">
                        <button type="button" class="search-clear-btn" id="search-clear" aria-label="Clear search">&#10005;</button>
                    </div>
                    <span class="results-count" id="results-count">Showing all programs</span>
                </div>

                <!-- Category Filter Pills -->
                <div class="category-row" aria-label="Scheme Categories">
                    <button class="category active" type="button" data-filter="all">
                        All Programs <span class="category-badge">8</span>
                    </button>
                    <button class="category" type="button" data-filter="education">
                        Education <span class="category-badge">2</span>
                    </button>
                    <button class="category" type="button" data-filter="farmer">
                        Farmers & Agriculture <span class="category-badge">2</span>
                    </button>
                    <button class="category" type="button" data-filter="business">
                        Business & Startups <span class="category-badge">2</span>
                    </button>
                    <button class="category" type="button" data-filter="family">
                        Family & Health <span class="category-badge">1</span>
                    </button>
                    <button class="category" type="button" data-filter="housing">
                        Housing <span class="category-badge">1</span>
                    </button>
                </div>

                <!-- Schemes Cards Grid -->
                <div class="scheme-grid" id="scheme-list">
                    <!-- Scheme 1: Education -->
                    <article class="scheme-card" data-category="education" data-search="merit scholarship undergraduate higher education student financial fee waiver">
                        <div class="card-meta">
                            <span class="card-icon yellow">ED</span>
                            <span class="status-badge open">Open Now</span>
                        </div>
                        <h3>National Merit Scholarship</h3>
                        <p>Financial support up to ₹50,000 per year for academically outstanding students from low and middle-income families.</p>
                        <div class="scheme-tags">
                            <span class="scheme-tag">Undergraduates</span>
                            <span class="scheme-tag">₹50,000 / yr</span>
                            <span class="scheme-tag">Merit-based</span>
                        </div>
                        <div class="scheme-card-footer">
                            <a href="user/scholarship-details.php?type=merit">View Eligibility <span>&#8594;</span></a>
                        </div>
                    </article>

                    <!-- Scheme 2: Farmers -->
                    <article class="scheme-card" data-category="farmer" data-search="farm loan assistance farmer agriculture kisan crop equipment subsidy tractor">
                        <div class="card-meta">
                            <span class="card-icon green">AG</span>
                            <span class="status-badge open">Open Now</span>
                        </div>
                        <h3>Kisan Farm Loan & Equipment Grant</h3>
                        <p>Low-interest credit lines and up to 50% capital subsidies to purchase farm machinery, solar pumps, and modern seeds.</p>
                        <div class="scheme-tags">
                            <span class="scheme-tag">Farmers</span>
                            <span class="scheme-tag">4% Subsidized Interest</span>
                            <span class="scheme-tag">Equipment</span>
                        </div>
                        <div class="scheme-card-footer">
                            <a href="user/scheme-details.php?type=farmer">View Eligibility <span>&#8594;</span></a>
                        </div>
                    </article>

                    <!-- Scheme 3: Business -->
                    <article class="scheme-card" data-category="business" data-search="small business startup enterprise msme mudra loan capital grant entrepreneur">
                        <div class="card-meta">
                            <span class="card-icon coral">BU</span>
                            <span class="status-badge open">Open Now</span>
                        </div>
                        <h3>MSME Micro-Enterprise Growth Loan</h3>
                        <p>Collateral-free working capital loans up to ₹10 Lakh for retail shops, artisan workshops, and young entrepreneurs.</p>
                        <div class="scheme-tags">
                            <span class="scheme-tag">Small Business</span>
                            <span class="scheme-tag">Up to ₹10 Lakh</span>
                            <span class="scheme-tag">Collateral-free</span>
                        </div>
                        <div class="scheme-card-footer">
                            <a href="user/scheme-details.php?type=business">View Eligibility <span>&#8594;</span></a>
                        </div>
                    </article>

                    <!-- Scheme 4: Healthcare & Family -->
                    <article class="scheme-card" data-category="family" data-search="healthcare support family medical insurance ayushman hospitalization health card">
                        <div class="card-meta">
                            <span class="card-icon blue">HE</span>
                            <span class="status-badge open">Open Now</span>
                        </div>
                        <h3>Ayushman National Health Protection</h3>
                        <p>Comprehensive cashless hospitalisation coverage of up to ₹5 Lakh per family per year across empaneled public & private hospitals.</p>
                        <div class="scheme-tags">
                            <span class="scheme-tag">All Citizens</span>
                            <span class="scheme-tag">₹5 Lakh Coverage</span>
                            <span class="scheme-tag">Cashless</span>
                        </div>
                        <div class="scheme-card-footer">
                            <a href="user/scheme-details.php?type=health">View Eligibility <span>&#8594;</span></a>
                        </div>
                    </article>

                    <!-- Scheme 5: Housing -->
                    <article class="scheme-card" data-category="housing" data-search="housing urban rural home construction grant pm awas subsidy shelter">
                        <div class="card-meta">
                            <span class="card-icon purple">HO</span>
                            <span class="status-badge open">Open Now</span>
                        </div>
                        <h3>Pradhan Mantri Awas Housing Grant</h3>
                        <p>Direct financial assistance and home loan interest subsidy up to ₹2.67 Lakh for building or purchasing your first permanent pucca home.</p>
                        <div class="scheme-tags">
                            <span class="scheme-tag">First-time Owners</span>
                            <span class="scheme-tag">₹2.67 Lakh Subsidy</span>
                            <span class="scheme-tag">Housing</span>
                        </div>
                        <div class="scheme-card-footer">
                            <a href="user/scheme-details.php?type=housing">View Eligibility <span>&#8594;</span></a>
                        </div>
                    </article>

                    <!-- Scheme 6: Business / Women -->
                    <article class="scheme-card" data-category="business" data-search="women entrepreneurship skill grant female self help group stree shakti">
                        <div class="card-meta">
                            <span class="card-icon coral">WO</span>
                            <span class="status-badge upcoming">Applications Soon</span>
                        </div>
                        <h3>Women Entrepreneurship & Seed Fund</h3>
                        <p>Specialized grant and zero-interest micro-loans for women-led enterprises, self-help groups, and home-based manufacturing units.</p>
                        <div class="scheme-tags">
                            <span class="scheme-tag">Women Only</span>
                            <span class="scheme-tag">Seed Capital</span>
                            <span class="scheme-tag">Mentorship</span>
                        </div>
                        <div class="scheme-card-footer">
                            <a href="user/scheme-details.php?type=women">View Eligibility <span>&#8594;</span></a>
                        </div>
                    </article>

                    <!-- Scheme 7: Education Fellowship -->
                    <article class="scheme-card" data-category="education" data-search="student support grant research fellowship phd masters stipend stem">
                        <div class="card-meta">
                            <span class="card-icon yellow">ST</span>
                            <span class="status-badge open">Open Now</span>
                        </div>
                        <h3>Higher Education Fellowship & Stipend</h3>
                        <p>Monthly stipend of ₹31,000 plus contingency allowance for students pursuing research, STEM diplomas, or postgraduate degrees.</p>
                        <div class="scheme-tags">
                            <span class="scheme-tag">Postgraduates</span>
                            <span class="scheme-tag">₹31,000 / month</span>
                            <span class="scheme-tag">Fellowship</span>
                        </div>
                        <div class="scheme-card-footer">
                            <a href="user/scholarship-details.php?type=student">View Eligibility <span>&#8594;</span></a>
                        </div>
                    </article>

                    <!-- Scheme 8: Farmers Insurance -->
                    <article class="scheme-card" data-category="farmer" data-search="crop insurance fasal bima drought flood damage compensation farmer">
                        <div class="card-meta">
                            <span class="card-icon green">CI</span>
                            <span class="status-badge open">Open Now</span>
                        </div>
                        <h3>Comprehensive Crop Insurance (PMFBY)</h3>
                        <p>Insurance coverage and financial support to farmers in the event of failure of any of the notified crops as a result of natural calamities.</p>
                        <div class="scheme-tags">
                            <span class="scheme-tag">Kharif & Rabi</span>
                            <span class="scheme-tag">1.5% Premium</span>
                            <span class="scheme-tag">Instant Payout</span>
                        </div>
                        <div class="scheme-card-footer">
                            <a href="user/scheme-details.php?type=crop">View Eligibility <span>&#8594;</span></a>
                        </div>
                    </article>
                </div>

                <!-- Empty State -->
                <div class="empty-state" id="empty-state" hidden>
                    <svg viewBox="0 0 24 24">
                        <path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                    </svg>
                    <h3>No matching schemes found</h3>
                    <p>Try searching for broader keywords like "loan", "student", "farming", or reset your category filter.</p>
                    <button class="button button-secondary" type="button" id="reset-filters-btn">Reset All Filters</button>
                </div>
            </div>
        </section>

        <!-- How It Works Section -->
        <section class="how-section" id="how-it-works">
            <div class="container how-grid">
                <div class="how-copy">
                    <p class="eyebrow">Clear Process, Zero Hassle</p>
                    <h2>Support that begins with a transparent answer.</h2>
                    <p>Navigating public benefits doesn't have to mean standing in long lines or sorting through bureaucratic jargon. Yojna Sathi gives you a direct, simple roadmap.</p>
                    <a class="button button-primary" href="#schemes">Start Finding Programs &#8594;</a>
                </div>

                <div class="steps-list">
                    <div class="step-card">
                        <div class="step-num">01</div>
                        <div class="step-content">
                            <strong>1. State Your Need</strong>
                            <p>Pick a category or search using plain terms like "student grant" or "tractor subsidy". No technical scheme names required.</p>
                        </div>
                    </div>

                    <div class="step-card">
                        <div class="step-num">02</div>
                        <div class="step-content">
                            <strong>2. Check Eligibility in Seconds</strong>
                            <p>Read clear, bulleted criteria covering age, income limits, eligible states, and benefits before you invest time applying.</p>
                        </div>
                    </div>

                    <div class="step-card">
                        <div class="step-num">03</div>
                        <div class="step-content">
                            <strong>3. Prepare Documents & Apply</strong>
                            <p>Use our interactive document checklist to gather your Aadhaar, income certificate, or bank details, then apply on the official portal.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Announcement / Newsletter Subscription -->
        <section class="announcement-section" id="announcements">
            <div class="container">
                <div class="announcement-card">
                    <div class="announcement-copy">
                        <p class="eyebrow">Never Miss a Deadline</p>
                        <h2>Get notified when applications open in your district.</h2>
                        <p>Receive timely alerts about new government support packages, scholarship application windows, and subsidy deadlines.</p>
                    </div>

                    <div class="subscribe-form-wrap">
                        <form class="subscribe-form" id="subscribeForm" novalidate>
                            <label class="sr-only" for="email">Email address</label>
                            <input id="email" name="email" type="email" placeholder="Enter your email address" required>
                            <button class="button button-primary" type="submit">Notify Me</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Site Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a class="brand" href="index.php" style="margin-bottom: 14px;">
                        <span class="brand-mark">YS</span>
                        <span class="brand-copy">
                            <strong style="color: #ffffff;">Yojna Sathi</strong>
                            <small style="color: #94a3b8;">Your benefits, one place</small>
                        </span>
                    </a>
                    <p>A citizen-first digital initiative designed to connect every resident with eligible welfare schemes, public grants, and scholarships.</p>
                    <div style="font-size: 0.85rem; color: #94a3b8;">
                        Toll-Free Citizen Helpline: <strong style="color: var(--accent-gold);">1800-111-2026</strong>
                    </div>
                </div>

                <div class="footer-col">
                    <h4>Citizen Services</h4>
                    <ul class="footer-links">
                        <li><a href="user/schemes.php">Government Schemes</a></li>
                        <li><a href="user/scholarships.php">Student Scholarships</a></li>
                        <li><a href="user/scheme-details.php?type=farmer">Kisan Agriculture Aid</a></li>
                        <li><a href="user/scheme-details.php?type=business">MSME Business Capital</a></li>
                        <li><a href="user/scheme-details.php?type=health">Healthcare Card Guide</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="user/about.php">About Yojna Sathi</a></li>
                        <li><a href="user/announcements.php">Latest Updates & Notices</a></li>
                        <li><a href="user/contact.php">Helpdesk & Support</a></li>
                        <li><a href="user/login.php">Citizen Login</a></li>
                        <li><a href="user/register.php">Create Account</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Portal Access</h4>
                    <ul class="footer-links">
                        <li><a href="admin/index.php" style="color: var(--accent-gold); font-weight: 700;">&#128274; Administrator Access</a></li>
                        <li><a href="user/profile.php">My Profile</a></li>
                        <li><a href="user/contact.php">Report an Issue</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <span>&copy; <?= date('Y') ?> Yojna Sathi. Information designed for citizen welfare and transparent public access.</span>
                <div style="display: flex; gap: 20px;">
                    <a href="user/about.php">Privacy & Terms</a>
                    <a href="user/contact.php">Citizen Charter</a>
                    <a href="#topHeader">Back to Top &#8593;</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/validation.js"></script>
</body>

</html>