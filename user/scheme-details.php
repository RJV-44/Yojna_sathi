<?php
session_start();
$isLoggedIn = isset($_SESSION['user']);
$user = $_SESSION['user'] ?? null;

$type = $_GET['type'] ?? 'farmer';

$schemes = [
    'farmer' => [
        'title' => 'Kisan Farm Loan & Equipment Grant',
        'category' => 'Agriculture & Farmers',
        'badge' => 'AG',
        'badgeColor' => 'green',
        'department' => 'Ministry of Agriculture & Farmers Welfare',
        'benefit' => 'Up to ₹3,00,000 at 4% Interest + 50% Machinery Subsidy',
        'audience' => 'Small & Marginal Farmers, Landowners & Tenant Cultivators',
        'deadline' => 'Rolling (Applications Open Year-round)',
        'lead' => 'Direct low-interest agricultural credit lines combined with substantial capital grants to empower farmers to modernize equipment, install solar irrigation pumps, and procure quality high-yield certified seeds.',
        'overview' => 'The Kisan Farm Loan & Equipment Grant is designed to alleviate cash-flow constraints during sowing and harvest seasons. Under this initiative, interest subvention of 3% is provided for prompt repayment, bringing the effective interest rate down to just 4% per annum. Additionally, farmers can avail capital subsidy vouchers for subsidized procurement of tractors, drip irrigation kits, and threshers.',
        'eligibility' => [
            'Individual farmer or joint borrowers who are owner cultivators or registered tenant farmers.',
            'Minimum age of 18 years and maximum age of 70 years at the time of application.',
            'Must possess valid land revenue records or a recognized tenancy agreement.',
            'No existing non-performing asset (NPA) defaults on prior institutional agricultural credit.',
            'Priority given to marginal farmers possessing land holdings below 2.0 hectares.'
        ],
        'documents' => [
            'Aadhaar Card or Voter ID card for identity verification',
            'Land ownership title deed (Khata/Khasra/7-12 extract) or tenancy lease',
            'Active Bank Account Passbook seeded with Aadhaar (NPCI mapped)',
            'Recent passport-sized photographs of applicant(s)',
            'Quotation invoice of farm equipment from an authorized dealer (if applying for machinery grant)'
        ],
        'steps' => [
            ['title' => 'Step 1: Check Land Verification', 'desc' => 'Ensure your land record is digitized and updated on your state land revenue portal.'],
            ['title' => 'Step 2: Submit Application Online or at Bank', 'desc' => 'Apply through your nearest Rural Public Sector Bank branch or District Cooperative Society.'],
            ['title' => 'Step 3: Verification & Sanction', 'desc' => 'The field officer inspects the cultivation site and sanctions credit limits within 14 working days.'],
            ['title' => 'Step 4: Benefit Disbursement', 'desc' => 'Funds or machinery subsidy vouchers are credited directly into your Aadhaar-linked savings account.']
        ],
        'portalUrl' => 'https://pmkisan.gov.in',
        'portalName' => 'National PM-Kisan & Agriculture Portal'
    ],
    'business' => [
        'title' => 'MSME Micro-Enterprise Growth Loan',
        'category' => 'Business & Startups',
        'badge' => 'BU',
        'badgeColor' => 'coral',
        'department' => 'Ministry of Micro, Small & Medium Enterprises (MSME)',
        'benefit' => 'Collateral-free credit up to ₹10 Lakh with 2% interest subvention',
        'audience' => 'Micro-enterprises, small manufacturers, retail shops, & food processors',
        'deadline' => 'Applications Open (Ongoing)',
        'lead' => 'Collateral-free institutional working capital and term loans aimed at micro-enterprises and small entrepreneurs to purchase machinery, hire skilled labor, and expand inventory.',
        'overview' => 'The MSME Micro-Enterprise Growth Loan guarantees institutional credit through the National Credit Guarantee Trust. Borrowers do not need to pledge personal residential property or third-party guarantors. The program is categorized into Shishu (up to ₹50,000), Kishore (₹50,000 to ₹5 Lakh), and Tarun (₹5 Lakh to ₹10 Lakh) depending on business maturity.',
        'eligibility' => [
            'Any non-farm citizen enterprise engaged in manufacturing, trading, or allied services.',
            'Indian citizen aged 18 years or above with a viable business plan.',
            'Business must possess an active Udyam Registration Certificate (free online registration).',
            'Good credit bureau record with no active loan write-offs.',
            'Proprietorship, partnership firms, and private limited micro-entities are eligible.'
        ],
        'documents' => [
            'Aadhaar Card and PAN Card of the promoter/proprietor',
            'Udyam Registration Certificate',
            'Business establishment address proof (Electricity bill, rental agreement)',
            'Last 6 months Bank Account Statement of the enterprise',
            'Project report / quotation for machinery and working capital requirement'
        ],
        'steps' => [
            ['title' => 'Step 1: Obtain Udyam Certificate', 'desc' => 'Register your business online for free on the National Udyam portal to get your Udyam number.'],
            ['title' => 'Step 2: Prepare Project Quotations', 'desc' => 'Summarize your business requirements and machine quotations from authorized vendors.'],
            ['title' => 'Step 3: Apply on Udyamimukta / JanSamarth Portal', 'desc' => 'Upload digital documents and choose your preferred lending bank.'],
            ['title' => 'Step 4: Loan Sanction & In-principle Letter', 'desc' => 'The selected bank branch processes approval and disburses loan funds directly to equipment suppliers.']
        ],
        'portalUrl' => 'https://jansamarth.in',
        'portalName' => 'National JanSamarth Credit Portal'
    ],
    'health' => [
        'title' => 'Ayushman National Health Protection',
        'category' => 'Health & Family Welfare',
        'badge' => 'HE',
        'badgeColor' => 'blue',
        'department' => 'National Health Authority (NHA)',
        'benefit' => '₹5,00,000 Cashless Secondary & Tertiary Hospitalization per Family/Year',
        'audience' => 'Economically vulnerable families, low-income citizens, & senior citizens',
        'deadline' => 'Open Enrolment & Card Issuance',
        'lead' => 'Universal cashless healthcare shield protecting families against catastrophic medical expenditures across 1,949 medical and surgical packages in empaneled hospitals.',
        'overview' => 'Under Ayushman Bharat (PM-JAY), eligible families are provided an Ayushman Health Card. The scheme covers up to 3 days of pre-hospitalization and 15 days of post-hospitalization diagnostic tests, medicines, and intensive care. All pre-existing conditions are covered from day one without waiting periods.',
        'eligibility' => [
            'Families listed in the Socio-Economic Caste Census (SECC) database or state ration cards.',
            'All senior citizens aged 70 years and above, irrespective of family income.',
            'No restriction on family size, gender, or age of members.',
            'Valid Ration Card or NFSA registered families automatically qualify.'
        ],
        'documents' => [
            'Aadhaar Card of all family members to be enrolled',
            'Active Ration Card / Family ID card / Samagra ID',
            'Mobile number linked to Aadhaar for biometric e-KYC verification'
        ],
        'steps' => [
            ['title' => 'Step 1: Verify Name in Eligible Beneficiary List', 'desc' => 'Check your name on the official beneficiary portal or via your local ration dealer.'],
            ['title' => 'Step 2: Complete Biometric e-KYC', 'desc' => 'Visit any Common Service Centre (CSC) or empaneled government hospital.'],
            ['title' => 'Step 3: Download Ayushman Golden Card', 'desc' => 'Your digital Ayushman card is generated immediately and can be saved on your mobile.'],
            ['title' => 'Step 4: Avail Cashless Treatment', 'desc' => 'Show your Ayushman card at the Ayushman Mitra desk at any partner hospital.']
        ],
        'portalUrl' => 'https://beneficiary.nha.gov.in',
        'portalName' => 'National Ayushman Beneficiary Portal'
    ],
    'housing' => [
        'title' => 'Pradhan Mantri Awas Housing Grant',
        'category' => 'Housing & Urban Affairs',
        'badge' => 'HO',
        'badgeColor' => 'purple',
        'department' => 'Ministry of Housing and Urban Affairs',
        'benefit' => '₹1,20,000 - ₹2,67,000 Direct Construction Subsidy / Interest Subvention',
        'audience' => 'Homeless families, kutcha house dwellers, & first-time urban home buyers',
        'deadline' => 'Open for Phase-2 Beneficiary Applications',
        'lead' => 'Providing pucca houses with basic amenities like water, sanitation, and electricity to all eligible urban and rural households.',
        'overview' => 'The Pradhan Mantri Awas Yojana provides direct cash assistance of ₹1.20 Lakh in plains and ₹1.30 Lakh in hilly/difficult areas for rural home construction. In urban areas, the Credit Linked Subsidy Scheme (CLSS) offers up to ₹2.67 Lakh upfront interest subsidy on home loans.',
        'eligibility' => [
            'The beneficiary family should not own a permanent pucca house in their name anywhere in India.',
            'The house must be co-owned or exclusively owned by the female head of the household (in urban CLSS).',
            'Annual household income within the Economically Weaker Section (EWS) or Low Income Group (LIG) bands.'
        ],
        'documents' => [
            'Aadhaar Card and Voter ID of family members',
            'Affidavit declaring no other pucca house owned across India',
            'Income Certificate issued by Revenue Authority',
            'Bank passbook with IFSC and Aadhaar mapping',
            'Site photograph and land measurement record for house construction'
        ],
        'steps' => [
            ['title' => 'Step 1: Application through Panchayat or Urban Local Body', 'desc' => 'Submit details at your Gram Panchayat or Municipal ward office.'],
            ['title' => 'Step 2: Geotagged Physical Verification', 'desc' => 'Government surveyors verify existing housing status using GPS-enabled geotagged cameras.'],
            ['title' => 'Step 3: Sanction Order Issued', 'desc' => 'Sanctioned list is displayed publicly and sanction letters are issued.'],
            ['title' => 'Step 4: Staged DBT Payment', 'desc' => 'Money is credited in 3 to 4 stages directly into bank account as construction progresses.']
        ],
        'portalUrl' => 'https://pmaymis.gov.in',
        'portalName' => 'PMAY Official Housing Portal'
    ],
    'women' => [
        'title' => 'Women Entrepreneurship & Seed Fund',
        'category' => 'Women & Child Development',
        'badge' => 'WO',
        'badgeColor' => 'coral',
        'department' => 'Ministry of Women and Child Development & NITI Aayog',
        'benefit' => '₹2,00,000 Seed Grant + 100% Interest Free Micro-Loan',
        'audience' => 'Women founders, self-help groups (SHG), & artisan cooperatives',
        'deadline' => 'Applications Window Open',
        'lead' => 'Empowering women entrepreneurs by offering seed funding, skill certifications, digital marketing support, and zero-interest working capital.',
        'overview' => 'This initiative supports women transitioning from informal home crafts or tailoring to registered micro-enterprises. In addition to capital grants, beneficiaries receive 12 months of mentorship and free access to government e-marketplace (GeM) vendor accounts to sell products to public institutions.',
        'eligibility' => [
            'Woman entrepreneur holding at least 51% ownership in the enterprise.',
            'Applicant must be an Indian citizen aged 21 years or older.',
            'Preference given to women belonging to SHGs, rural artisan clusters, or single-parent households.'
        ],
        'documents' => [
            'Aadhaar Card and PAN Card of woman applicant',
            'Bank account registered in applicant name',
            'Proof of enterprise / SHG membership certificate',
            'Brief outline of business product / service'
        ],
        'steps' => [
            ['title' => 'Step 1: Register on WEP Portal', 'desc' => 'Sign up on the Women Entrepreneurship Platform (WEP).'],
            ['title' => 'Step 2: Submit Enterprise Pitch', 'desc' => 'Fill the simple 2-page project outline.'],
            ['title' => 'Step 3: Verification & Mentorship', 'desc' => 'District industry center verifies application.'],
            ['title' => 'Step 4: Grant Disbursement', 'desc' => 'Grant disbursed directly to business account.']
        ],
        'portalUrl' => 'https://wep.gov.in',
        'portalName' => 'Women Entrepreneurship Platform'
    ],
    'crop' => [
        'title' => 'Comprehensive Crop Insurance (PMFBY)',
        'category' => 'Agriculture & Farmers',
        'badge' => 'CI',
        'badgeColor' => 'green',
        'department' => 'Ministry of Agriculture & Farmers Welfare',
        'benefit' => 'Full Sum Insured Coverage at just 1.5% - 2.0% Farmer Premium',
        'audience' => 'All farmers growing notified crops in notified areas',
        'deadline' => 'Before Sowing Season Cutoff Date',
        'lead' => 'Comprehensive financial protection against non-preventable natural risks like drought, flood, pests, and localized post-harvest losses.',
        'overview' => 'PMFBY provides end-to-end risk insurance from pre-sowing to post-harvest. The premium paid by farmers is capped at only 1.5% for Rabi foodgrains and 2% for Kharif foodgrains, with the balance 98% subsidy funded equally by Central and State Governments.',
        'eligibility' => [
            'All farmers including sharecroppers and tenant farmers growing notified crops.',
            'Must have insurable interest in the notified crop.'
        ],
        'documents' => [
            'Aadhaar Card and Land Record (RoR/Khasra)',
            'Sowing Certificate / declaration issued by local revenue authority',
            'Bank account passbook copy'
        ],
        'steps' => [
            ['title' => 'Step 1: Enroll via Bank or CSC', 'desc' => 'Apply online through National Crop Insurance Portal or at CSC.'],
            ['title' => 'Step 2: Pay Nominal Premium', 'desc' => 'Pay the 1.5% - 2% premium.'],
            ['title' => 'Step 3: Automatic Weather & Satellite Assessment', 'desc' => 'Yield loss is monitored via remote sensing and crop cutting experiments.'],
            ['title' => 'Step 4: Claim Settlement', 'desc' => 'Claims are credited directly to bank account within 3 weeks of claim assessment.']
        ],
        'portalUrl' => 'https://pmfby.gov.in',
        'portalName' => 'National Crop Insurance Portal'
    ],
    'education' => [
        'title' => 'National Youth Skill & Apprentice Grant',
        'category' => 'Education & Skill Development',
        'badge' => 'SK',
        'badgeColor' => 'yellow',
        'department' => 'Ministry of Skill Development and Entrepreneurship',
        'benefit' => '₹8,000 - ₹12,000 Monthly Stipend + Certified Industry Placement',
        'audience' => 'High school graduates, ITI certificate holders, & diploma students',
        'deadline' => 'Rolling Registrations',
        'lead' => 'Bridging the skill gap with paid on-the-job apprenticeship training in premier manufacturing, automotive, electronics, and digital IT enterprises.',
        'overview' => 'Under the National Apprenticeship Promotion Scheme (NAPS), the government directly pays 25% of the stipend (up to ₹1,500/month) with the employer providing the remainder. Trainees receive a nationally recognized National Apprenticeship Certificate (NAC).',
        'eligibility' => [
            'Indian citizen aged 18 to 29 years.',
            'Minimum educational qualification of 10th pass or ITI / Diploma.',
            'Must not have previously completed another government apprenticeship.'
        ],
        'documents' => [
            'Aadhaar Card and 10th / ITI Marksheet',
            'Bank Account details for Direct Benefit Transfer',
            'Recent passport photo'
        ],
        'steps' => [
            ['title' => 'Step 1: Register on Apprenticeship Portal', 'desc' => 'Create a candidate profile on apprenticeshipindia.gov.in.'],
            ['title' => 'Step 2: Apply for Open Opportunities', 'desc' => 'Search by district, trade, and preferred company.'],
            ['title' => 'Step 3: Sign Digital Contract', 'desc' => 'Employer issues apprentice offer contract.'],
            ['title' => 'Step 4: Training & Monthly Stipend', 'desc' => 'Commence training and receive monthly stipend via DBT.']
        ],
        'portalUrl' => 'https://www.apprenticeshipindia.gov.in',
        'portalName' => 'National Apprenticeship Portal'
    ]
];

$scheme = $schemes[$type] ?? $schemes['farmer'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($scheme['title']) ?> - Eligibility criteria, benefits, and application guidelines.">
    <title><?= htmlspecialchars($scheme['title']) ?> | Yojna Sathi</title>
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
                <a class="nav-link active" href="schemes.php">Schemes</a>
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
                    <a href="../index.php">Home</a> &gt; <a href="schemes.php">Schemes</a> &gt; <span><?= htmlspecialchars($scheme['title']) ?></span>
                </div>
                <div class="detail-header-tags">
                    <span class="status-badge open">Active Public Program</span>
                    <span class="scheme-tag" style="background: var(--surface);"><?= htmlspecialchars($scheme['department']) ?></span>
                </div>
                <h1 class="detail-title"><?= htmlspecialchars($scheme['title']) ?></h1>
                <p><?= htmlspecialchars($scheme['lead']) ?></p>
            </div>
        </section>

        <!-- Main Content & Sidebar -->
        <div class="container detail-layout">
            <!-- Left Main Column -->
            <div class="detail-main">
                <!-- Meta Highlights Strip -->
                <div class="detail-meta-strip">
                    <div class="meta-box">
                        <strong>Financial Assistance</strong>
                        <span><?= htmlspecialchars($scheme['benefit']) ?></span>
                    </div>
                    <div class="meta-box">
                        <strong>Target Group</strong>
                        <span><?= htmlspecialchars($scheme['audience']) ?></span>
                    </div>
                    <div class="meta-box">
                        <strong>Application Window</strong>
                        <span style="font-size: 1.05rem;"><?= htmlspecialchars($scheme['deadline']) ?></span>
                    </div>
                </div>

                <!-- Section: Program Overview -->
                <section class="detail-section">
                    <h2>
                        <svg viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        Program Overview
                    </h2>
                    <p><?= htmlspecialchars($scheme['overview']) ?></p>
                </section>

                <!-- Section: Eligibility Criteria -->
                <section class="detail-section">
                    <h2>
                        <svg viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        Who Can Apply (Eligibility Checklist)
                    </h2>
                    <ul class="checklist">
                        <?php foreach ($scheme['eligibility'] as $item): ?>
                            <li class="checklist-item">
                                <span class="checklist-badge">&#10003;</span>
                                <span><?= htmlspecialchars($item) ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </section>

                <!-- Section: Required Documents Checklist -->
                <section class="detail-section">
                    <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 12px;">
                        <h2>
                            <svg viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path></svg>
                            Required Documents Checklist
                        </h2>
                        <span id="doc-ready-count" style="font-size: 0.85rem; font-weight: 700; color: var(--primary);">0 of <?= count($scheme['documents']) ?> ready</span>
                    </div>
                    <p style="margin-bottom: 16px;">Check off the documents you have prepared to confirm application readiness:</p>
                    <ul class="checklist">
                        <?php foreach ($scheme['documents'] as $doc): ?>
                            <li class="checklist-item">
                                <input type="checkbox" id="doc-<?= md5($doc) ?>">
                                <label for="doc-<?= md5($doc) ?>" style="cursor: pointer;"><?= htmlspecialchars($doc) ?></label>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </section>

                <!-- Section: How to Apply (Step by Step) -->
                <section class="detail-section">
                    <h2>
                        <svg viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                        Step-by-Step Application Process
                    </h2>
                    <div class="step-guide">
                        <?php foreach ($scheme['steps'] as $idx => $step): ?>
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
                    <p class="eyebrow" style="margin-bottom: 6px;">Official Gateway</p>
                    <h3>Take the Next Step</h3>
                    <p>Applications for this program are processed securely on the official government ministry portal.</p>

                    <a class="button button-primary" href="<?= htmlspecialchars($scheme['portalUrl']) ?>" target="_blank" rel="noopener noreferrer" style="width: 100%; margin-bottom: 12px;">
                        Open Official Portal <span aria-hidden="true">&#8599;</span>
                    </a>
                    
                    <a class="button button-secondary" href="schemes.php" style="width: 100%;">
                        &larr; Back to All Schemes
                    </a>

                    <div class="official-notice">
                        <strong>&#9888; Citizen Advisory:</strong> Yojna Sathi never charges any fee or asks for OTPs. All government welfare applications are free of cost.
                    </div>
                </div>

                <div class="action-card">
                    <h3>Need Application Help?</h3>
                    <p>Visit your nearest Common Service Centre (CSC) or contact our citizen helpline team.</p>
                    <div style="font-size: 0.9rem; color: var(--ink);">
                        <strong>Toll-Free Helpline:</strong><br>
                        <span style="color: var(--primary); font-weight: 800; font-size: 1.1rem;">1800-111-2026</span>
                    </div>
                    <div style="margin-top: 14px;">
                        <a href="contact.php" class="text-link">Send support query &rarr;</a>
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
                    <p>Empowering citizens with direct, transparent, and verified access to public welfare schemes.</p>
                </div>

                <div class="footer-col">
                    <h4>Browse More</h4>
                    <ul class="footer-links">
                        <li><a href="schemes.php">All Government Schemes</a></li>
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
                    <h4>Assistance</h4>
                    <p style="font-size: 0.9rem; color: #94a3b8; line-height: 1.6;">
                        Citizen Helpline:<br>
                        <strong style="color: var(--accent-gold); font-size: 1.1rem;">1800-111-2026</strong>
                    </p>
                </div>
            </div>

            <div class="footer-bottom">
                <span>&copy; <?= date('Y') ?> Yojna Sathi. All government trademarks belong to respective ministries.</span>
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