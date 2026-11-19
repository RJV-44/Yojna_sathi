<?php
session_start();
$isLoggedIn = isset($_SESSION['user']);
$user = $_SESSION['user'] ?? null;

$type = $_GET['type'] ?? 'merit';

$scholarships = [
    'merit' => [
        'title' => 'National Merit-cum-Means Scholarship',
        'category' => 'Merit & Higher Education',
        'department' => 'Ministry of Education & Department of Higher Education',
        'award' => '₹50,000 / year + Annual Book Grant',
        'target' => 'Undergraduate Students (BA, BSc, BCom, BTech, MBBS)',
        'deadline' => 'October 31, 2026',
        'lead' => 'Financial support up to ₹50,000 per academic year to assist meritorious students from economically constrained households to pursue college and university education.',
        'overview' => 'The National Merit-cum-Means Scholarship is awarded annually to students who have achieved top percentiles in their 10+2 higher secondary board examinations and are admitted to recognized undergraduate courses in central or state universities.',
        'academic' => 'Minimum 80% marks (or equivalent CGPA) in the 12th standard board examination.',
        'income' => 'Gross parental/family annual income must not exceed ₹6,00,000 per annum from all sources.',
        'eligibility' => [
            'Student must be an Indian citizen enrolled in a regular, full-time undergraduate program.',
            'Secured at least 80th percentile in the relevant stream in Class 12 board exams.',
            'Gross annual family income from all sources must not exceed ₹6 Lakh.',
            'Must not be recipient of any other central government scholarship exceeding ₹10,000/yr.',
            'Scholarship is renewable every year subject to maintaining minimum 60% aggregate in university exams.'
        ],
        'documents' => [
            'Class 10 and Class 12 certified mark sheets and passing certificates',
            'Current year College Admission Fee Receipt and Bonafide Student Certificate',
            'Competent authority issued Income Certificate (valid for current financial year)',
            'Student Bank Passbook with visible IFSC and account number (seeded with Aadhaar)',
            'Category/Caste Certificate (if applying under SC/ST/OBC quotas)'
        ],
        'steps' => [
            ['title' => 'Step 1: Complete One-Time Registration (OTR)', 'desc' => 'Register your Aadhaar on scholarships.gov.in to obtain your unique 14-digit student OTR ID.'],
            ['title' => 'Step 2: Fill Online Scholarship Form', 'desc' => 'Log in, choose National Merit-cum-Means Scheme, and upload scanned documents.'],
            ['title' => 'Step 3: College Level e-Verification', 'desc' => 'The designated nodal officer of your college digitally approves your application.'],
            ['title' => 'Step 4: State Nodal Sanction & Direct DBT', 'desc' => 'Ministry processes the merit list and disburses funds directly to your bank account via PFMS.']
        ],
        'portalUrl' => 'https://scholarships.gov.in',
        'portalName' => 'National Scholarship Portal (NSP)'
    ],
    'student' => [
        'title' => 'Postgraduate STEM Fellowship & Stipend',
        'category' => 'Postgraduate & Research',
        'department' => 'Department of Science and Technology (DST) & UGC',
        'award' => '₹31,000 / month + ₹20,000 Annual Contingency Allowance',
        'target' => 'Master’s and Ph.D. scholars in Pure & Applied Sciences',
        'deadline' => 'November 15, 2026',
        'lead' => 'Monthly research stipend to nurture young scientific talent and support researchers working on breakthrough innovations.',
        'overview' => 'This prestigious fellowship aims to retain top STEM talent in domestic research institutions. Scholars receive monthly sustenance allowance and special grants to attend national and international symposia.',
        'academic' => 'Bachelor’s degree in Engineering, Technology, or Master’s in Science with valid national test rank (GATE / NET / CSIR).',
        'income' => 'Open merit based; no strict family income ceiling for qualified GATE/NET awardees.',
        'eligibility' => [
            'Full-time enrolled scholar in an accredited university or national research lab.',
            'Qualified in national eligibility tests like GATE, NET, or GPAT.',
            'Age below 28 years on date of application (5 years relaxation for SC/ST/Women).'
        ],
        'documents' => [
            'Undergraduate and Postgraduate degree certificates and mark transcripts',
            'Valid GATE / NET scorecard with qualifying percentile',
            'Institute Admission / PhD registration letter and supervisor approval letter',
            'Aadhaar seeded savings bank account details'
        ],
        'steps' => [
            ['title' => 'Step 1: Check National Portal Registration', 'desc' => 'Ensure your institute is registered on the national fellowship portal.'],
            ['title' => 'Step 2: Submit Research Proposal', 'desc' => 'Upload your research topic summary and supervisor consent.'],
            ['title' => 'Step 3: Expert Committee Review', 'desc' => 'National technical committee screens proposals and publishes selection awards.'],
            ['title' => 'Step 4: Monthly Stipend Release', 'desc' => 'Monthly attendance is marked by the institute and stipend is disbursed directly.']
        ],
        'portalUrl' => 'https://scholarships.gov.in',
        'portalName' => 'DST Science Portal'
    ],
    'girls' => [
        'title' => 'Pragati Scholarship for Girls in Technical Education',
        'category' => 'Girls & Women Empowerment',
        'department' => 'All India Council for Technical Education (AICTE)',
        'award' => '₹50,000 / year (Every year of course duration)',
        'target' => 'Girl students admitted to 1st year Degree or Diploma Courses',
        'deadline' => 'December 31, 2026',
        'lead' => 'Empowering young women to pursue engineering, architecture, and technology degrees with full annual tuition support.',
        'overview' => 'AICTE provides 10,000 scholarships exclusively to girl students every year under the Pragati initiative. Eligible students receive ₹50,000 per year towards tuition fees, laptop purchase, books, and competitive exam fees.',
        'academic' => 'Admission in 1st year of Degree/Diploma level course or 2nd year through lateral entry in AICTE approved college.',
        'income' => 'Family income should not exceed ₹8,00,000 per annum.',
        'eligibility' => [
            'Only female students are eligible.',
            'Maximum two girl children per family can avail the benefit.',
            'Must be enrolled in an AICTE approved technical institution.'
        ],
        'documents' => [
            'Class 10 and 12 mark sheets',
            'Tuition fee receipt paid for the current academic session',
            'Income Certificate issued by Tehsildar or SDM',
            'Parents declaration of having only one or two girl children'
        ],
        'steps' => [
            ['title' => 'Step 1: Register on AICTE Pragati Portal', 'desc' => 'Create profile with student roll number and AICTE college ID.'],
            ['title' => 'Step 2: Upload Fee Receipts', 'desc' => 'Provide authenticated college tuition receipt.'],
            ['title' => 'Step 3: Institute Scrutiny', 'desc' => 'College verification committee validates applicant documents.'],
            ['title' => 'Step 4: Direct Account Credit', 'desc' => 'Funds are disbursed directly to girl student bank account.']
        ],
        'portalUrl' => 'https://www.aicte-india.org',
        'portalName' => 'AICTE Official Portal'
    ]
];

$scholarship = $scholarships[$type] ?? $scholarships['merit'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($scholarship['title']) ?> - Award details, eligibility rules, and application guide.">
    <title><?= htmlspecialchars($scholarship['title']) ?> | Yojna Sathi</title>
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
                    <a href="../index.php">Home</a> &gt; <a href="scholarships.php">Scholarships</a> &gt; <span><?= htmlspecialchars($scholarship['title']) ?></span>
                </div>
                <div class="detail-header-tags">
                    <span class="status-badge open">Applications Open</span>
                    <span class="scheme-tag" style="background: var(--surface);"><?= htmlspecialchars($scholarship['department']) ?></span>
                </div>
                <h1 class="detail-title"><?= htmlspecialchars($scholarship['title']) ?></h1>
                <p><?= htmlspecialchars($scholarship['lead']) ?></p>
            </div>
        </section>

        <!-- Main Content & Sidebar -->
        <div class="container detail-layout">
            <!-- Left Main Column -->
            <div class="detail-main">
                <!-- Meta Highlights Strip -->
                <div class="detail-meta-strip">
                    <div class="meta-box">
                        <strong>Scholarship Value</strong>
                        <span><?= htmlspecialchars($scholarship['award']) ?></span>
                    </div>
                    <div class="meta-box">
                        <strong>Eligible Level</strong>
                        <span><?= htmlspecialchars($scholarship['target']) ?></span>
                    </div>
                    <div class="meta-box">
                        <strong>Application Deadline</strong>
                        <span style="font-size: 1.05rem;"><?= htmlspecialchars($scholarship['deadline']) ?></span>
                    </div>
                </div>

                <!-- Section: Overview -->
                <section class="detail-section">
                    <h2>
                        <svg viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        About This Scholarship
                    </h2>
                    <p><?= htmlspecialchars($scholarship['overview']) ?></p>
                </section>

                <!-- Section: Eligibility Rules -->
                <section class="detail-section">
                    <h2>
                        <svg viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        Eligibility Conditions
                    </h2>
                    <ul class="checklist">
                        <?php foreach ($scholarship['eligibility'] as $rule): ?>
                            <li class="checklist-item">
                                <span class="checklist-badge">&#10003;</span>
                                <span><?= htmlspecialchars($rule) ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </section>

                <!-- Section: Document Checklist -->
                <section class="detail-section">
                    <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 12px;">
                        <h2>
                            <svg viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path></svg>
                            Required Documents
                        </h2>
                        <span id="doc-ready-count" style="font-size: 0.85rem; font-weight: 700; color: var(--primary);">0 of <?= count($scholarship['documents']) ?> ready</span>
                    </div>
                    <p style="margin-bottom: 16px;">Keep digital PDF copies (under 200KB) ready for submission:</p>
                    <ul class="checklist">
                        <?php foreach ($scholarship['documents'] as $doc): ?>
                            <li class="checklist-item">
                                <input type="checkbox" id="sdoc-<?= md5($doc) ?>">
                                <label for="sdoc-<?= md5($doc) ?>" style="cursor: pointer;"><?= htmlspecialchars($doc) ?></label>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </section>

                <!-- Section: Application Steps -->
                <section class="detail-section">
                    <h2>
                        <svg viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                        How to Apply
                    </h2>
                    <div class="step-guide">
                        <?php foreach ($scholarship['steps'] as $idx => $step): ?>
                            <div class="step-guide-item">
                                <span class="step-guide-num"><?= $idx + 1 ?></span>
                                <div>
                                    <strong><?= htmlspecialchars($step['title']) ?></strong>
                                    <p><?= htmlspecialchars($step['desc']) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>

            <!-- Right Sticky Action Panel -->
            <aside class="detail-sidebar">
                <div class="action-card">
                    <p class="eyebrow" style="margin-bottom: 6px;">Application Portal</p>
                    <h3>Apply for Scholarship</h3>
                    <p>Applications must be submitted via the National Scholarship Portal (NSP) with valid Aadhaar OTR verification.</p>

                    <a class="button button-primary" href="<?= htmlspecialchars($scholarship['portalUrl']) ?>" target="_blank" rel="noopener noreferrer" style="width: 100%; margin-bottom: 12px;">
                        Open <?= htmlspecialchars($scholarship['portalName']) ?> <span aria-hidden="true">&#8599;</span>
                    </a>
                    
                    <a class="button button-secondary" href="scholarships.php" style="width: 100%;">
                        &larr; Back to All Scholarships
                    </a>

                    <div class="official-notice">
                        <strong>Student Tip:</strong> Ensure your bank account is Aadhaar seeded (active on NPCI mapper) so direct benefit transfer does not bounce.
                    </div>
                </div>

                <div class="action-card">
                    <h3>National Helpdesk</h3>
                    <p>If your college is not appearing in the dropdown or you need OTR assistance:</p>
                    <div style="font-size: 0.9rem; color: var(--ink);">
                        <strong>Student Helpdesk:</strong><br>
                        <span style="color: var(--primary); font-weight: 800; font-size: 1.1rem;">0120-6619540</span>
                    </div>
                    <div style="margin-top: 14px;">
                        <a href="contact.php" class="text-link">Contact Yojna Sathi support &rarr;</a>
                    </div>
                </div>
            </aside>
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
                    <p>Transparent public portal connecting Indian students with legitimate scholarship support.</p>
                </div>

                <div class="footer-col">
                    <h4>All Scholarships</h4>
                    <ul class="footer-links">
                        <li><a href="scholarship-details.php?type=merit">National Merit Grant</a></li>
                        <li><a href="scholarship-details.php?type=student">STEM Postgraduate Fellowship</a></li>
                        <li><a href="scholarship-details.php?type=girls">Pragati Girls Technical Grant</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="schemes.php">Government Schemes</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="contact.php">Helpdesk Contact</a></li>
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