<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Find government schemes, scholarships, and support programs with Yojna Sathi.">
    <title>Yojna Sathi | Government Support, Made Simple</title>
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/validation.css">
</head>

<body>
    <header class="site-header">
        <div class="container nav-wrap">
            <a class="brand" href="index.php" aria-label="Yojna Sathi home">
                <span class="brand-mark">YS</span>
                <span class="brand-copy"><strong>Yojna Sathi</strong><small>Your benefits, one place</small></span>
            </a>
            <nav class="main-nav" aria-label="Primary navigation">
                <a class="active" href="#schemes">Find schemes</a>
                <a href="#how-it-works">How it works</a>
                <a href="user/about.php">About us</a>
                <a href="user/announcements.php">Updates</a>
                <a href="user/contact.php">Contact</a>
                <a href="user/login.php">Login</a>
                <a class="nav-login" href="user/register.php">Register</a>
            </nav>
            <button class="menu-toggle" type="button" aria-label="Toggle navigation" aria-expanded="false">Menu</button>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container hero-grid">
                <div class="hero-copy">
                    <p class="eyebrow">A simpler way to access support</p>
                    <h1>Discover government schemes made for <em>your next step.</em></h1>
                    <p class="hero-text">Search scholarships, financial support, and public services in one trusted place. Start with what you need today.</p>
                    <div class="hero-actions">
                        <a class="button button-primary" href="#schemes">Explore schemes <span aria-hidden="true">&#8594;</span></a>
                        <a class="button button-quiet" href="#how-it-works">Learn how it works</a>
                    </div>
                    <div class="trust-row"><span class="trust-dot"></span><strong>Free to use</strong><span>Updated for citizens</span></div>
                </div>
                <div class="hero-panel" aria-label="Yojna Sathi overview">
                    <div class="panel-topline"><span class="live-dot"></span> Support finder</div>
                    <div class="panel-question">What are you looking for today?</div>
                    <div class="mini-search"><span aria-hidden="true">&#9906;</span><span>Try "student scholarship"</span></div>
                    <div class="match-card"><span class="match-icon">01</span><span><strong>Personalised matches</strong><small>Browse by need, not paperwork</small></span><span class="match-arrow">&#8599;</span></div>
                    <div class="match-card pale"><span class="match-icon">02</span><span><strong>Clear next steps</strong><small>Know what to prepare before you apply</small></span><span class="match-arrow">&#8599;</span></div>
                </div>
            </div>
            <div class="hero-shape shape-one"></div>
            <div class="hero-shape shape-two"></div>
        </section>

        <section class="stats-strip">
            <div class="container stats-grid">
                <div><strong>120+</strong><span>Government schemes</span></div>
                <div><strong>35</strong><span>Support categories</span></div>
                <div><strong>24/7</strong><span>Information access</span></div>
                <div class="stats-note">Built to help you move<br><strong>from searching to doing.</strong></div>
            </div>
        </section>

        <section class="schemes-section" id="schemes">
            <div class="container">
                <div class="section-heading">
                    <div>
                        <p class="eyebrow">Start here</p>
                        <h2>Find the right support</h2>
                    </div>
                    <p>Explore popular programs or search by your goal.</p>
                </div>
                <div class="search-bar"><span aria-hidden="true">&#9906;</span><input id="scheme-search" type="search" placeholder="Search schemes, scholarships, or needs..." aria-label="Search schemes"></div>
                <div class="category-row" aria-label="Scheme categories">
                    <button class="category active" type="button" data-filter="all">All programs</button><button class="category" type="button" data-filter="education">Education</button><button class="category" type="button" data-filter="business">Business</button><button class="category" type="button" data-filter="farmer">Farmers</button><button class="category" type="button" data-filter="family">Family support</button>
                </div>
                <div class="scheme-grid" id="scheme-list">
                    <article class="scheme-card" data-category="education" data-search="merit scholarship undergraduate education student">
                        <div class="card-meta"><span class="card-icon yellow">ED</span><span class="status">Open now</span></div>
                        <h3>Merit Scholarship</h3>
                        <p>Support for academically outstanding students from low-income households.</p><a href="user/scholarship-details.php">View eligibility <span>&#8594;</span></a>
                    </article>
                    <article class="scheme-card" data-category="farmer" data-search="farm loan assistance farmer agriculture loan">
                        <div class="card-meta"><span class="card-icon green">AG</span><span class="status">Open now</span></div>
                        <h3>Farm Loan Assistance</h3>
                        <p>Financial support to help farmers invest in equipment and improve their harvest.</p><a href="user/scheme-details.php">View eligibility <span>&#8594;</span></a>
                    </article>
                    <article class="scheme-card" data-category="business" data-search="small business startup enterprise business grant">
                        <div class="card-meta"><span class="card-icon coral">BU</span><span class="status">Applications soon</span></div>
                        <h3>Small Business Support</h3>
                        <p>Guidance and assistance for local entrepreneurs building a stronger business.</p><a href="#announcements">Get notified <span>&#8594;</span></a>
                    </article>
                </div>
                <p class="empty-state" id="empty-state" hidden>No programs match that search. Try a broader term.</p>
            </div>
        </section>

        <section class="how-section" id="how-it-works">
            <div class="container how-grid">
                <div>
                    <p class="eyebrow">No confusing forms here</p>
                    <h2>Support that starts with a clear answer.</h2>
                    <p class="section-copy">Yojna Sathi helps you understand what is available, whether you may qualify, and where to take your next step.</p>
                </div>
                <div class="steps">
                    <div class="step"><b>01</b><span><strong>Tell us what you need</strong><small>Choose a category or search in your own words.</small></span></div>
                    <div class="step"><b>02</b><span><strong>Compare your options</strong><small>Read eligibility and benefits in plain language.</small></span></div>
                    <div class="step"><b>03</b><span><strong>Take the next step</strong><small>Prepare your documents and follow the official route.</small></span></div>
                </div>
            </div>
        </section>

        <section class="announcement-section" id="announcements">
            <div class="container announcement">
                <div>
                    <p class="eyebrow">Stay informed</p>
                    <h2>Never miss an application window.</h2>
                    <p>Get updates about new schemes and important deadlines.</p>
                </div>
                <form class="subscribe-form" id="subscribeForm" novalidate><label class="sr-only" for="email">Email address</label><input id="email" type="email" placeholder="Your email address" required><button class="button button-primary" type="submit">Notify me</button></form>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container footer-wrap"><span class="brand-footer">YS <strong>Yojna Sathi</strong></span><span>Information for citizens, designed for action.</span><a href="admin/index.php">Administrator access</a></div>
    </footer>
    <script>
        const search = document.querySelector('#scheme-search');
        const cards = [...document.querySelectorAll('.scheme-card')];
        const emptyState = document.querySelector('#empty-state');
        let activeFilter = 'all';

        function filterCards() {
            const term = search.value.toLowerCase().trim();
            let visible = 0;
            cards.forEach((card) => {
                const matchesFilter = activeFilter === 'all' || card.dataset.category === activeFilter;
                const matchesSearch = !term || card.dataset.search.includes(term);
                card.hidden = !(matchesFilter && matchesSearch);
                if (!card.hidden) visible += 1;
            });
            emptyState.hidden = visible !== 0;
        }
        search.addEventListener('input', filterCards);
        document.querySelectorAll('.category').forEach((button) => button.addEventListener('click', () => {
            document.querySelector('.category.active').classList.remove('active');
            button.classList.add('active');
            activeFilter = button.dataset.filter;
            filterCards();
        }));
        const menuToggle = document.querySelector('.menu-toggle');
        const nav = document.querySelector('.main-nav');
        menuToggle.addEventListener('click', () => {
            const open = nav.classList.toggle('open');
            menuToggle.setAttribute('aria-expanded', open);
        });
    </script>
    <script src="assets/js/validation.js"></script>
</body>

</html>