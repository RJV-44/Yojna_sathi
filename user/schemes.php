<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Government Schemes | Yojna Sathi</title>
    <link rel="stylesheet" href="../assets/css/home.css">
</head>

<body>
    <header class="site-header">
        <div class="container nav-wrap"><a class="brand" href="../index.php"><span class="brand-mark">YS</span><span class="brand-copy"><strong>Yojna Sathi</strong><small>Your benefits, one place</small></span></a>
            <nav class="main-nav" aria-label="Primary navigation"><a class="active" href="schemes.php">Find schemes</a><a href="scholarships.php">Scholarships</a><a href="about.php">About us</a><a href="announcements.php">Updates</a><a href="contact.php">Contact</a><a href="login.php">Login</a><a class="nav-login" href="register.php">Register</a></nav><button class="menu-toggle" type="button" aria-label="Toggle navigation" aria-expanded="false">Menu</button>
        </div>
    </header>
    <main>
        <section class="schemes-section">
            <div class="container">
                <p class="eyebrow">Citizen services</p>
                <div class="section-heading">
                    <div>
                        <h1>Government schemes</h1>
                        <p class="section-copy">Find support for farming, business, housing, health, and everyday needs.</p>
                    </div>
                </div>
                <div class="search-bar"><span aria-hidden="true">&#9906;</span><input id="scheme-search" type="search" placeholder="Search schemes or needs..." aria-label="Search schemes"></div>
                <div class="category-row"><button class="category active" type="button" data-filter="all">All programs</button><button class="category" type="button" data-filter="farmer">Farmers</button><button class="category" type="button" data-filter="business">Business</button><button class="category" type="button" data-filter="family">Family support</button></div>
                <div class="scheme-grid" id="scheme-list">
                    <article class="scheme-card" data-category="farmer" data-search="farm loan assistance farmer agriculture loan">
                        <div class="card-meta"><span class="card-icon green">AG</span><span class="status">Open now</span></div>
                        <h3>Farm Loan Assistance</h3>
                        <p>Financial support to help farmers invest in equipment and improve their harvest.</p><a href="scheme-details.php">Check eligibility <span>&#8594;</span></a>
                    </article>
                    <article class="scheme-card" data-category="business" data-search="small business startup enterprise business grant">
                        <div class="card-meta"><span class="card-icon coral">BU</span><span class="status">Applications soon</span></div>
                        <h3>Small Business Support</h3>
                        <p>Guidance and assistance for local entrepreneurs building a stronger business.</p><a href="scheme-details.php?type=business">Check eligibility <span>&#8594;</span></a>
                    </article>
                    <article class="scheme-card" data-category="family" data-search="healthcare support family medical health">
                        <div class="card-meta"><span class="card-icon yellow">HE</span><span class="status">Open now</span></div>
                        <h3>Healthcare Support Scheme</h3>
                        <p>Support to help eligible families access essential healthcare services.</p><a href="scheme-details.php?type=health">Check eligibility <span>&#8594;</span></a>
                    </article>
                </div>
                <p class="empty-state" id="empty-state" hidden>No programs match that search.</p>
            </div>
        </section>
    </main>
    <footer class="site-footer">
        <div class="container footer-wrap"><span class="brand-footer">YS <strong>Yojna Sathi</strong></span><a href="../index.php">Back to home</a><a href="../admin/index.php">Administrator access</a></div>
    </footer>
    <script>
        const search = document.querySelector('#scheme-search'),
            cards = [...document.querySelectorAll('.scheme-card')],
            empty = document.querySelector('#empty-state');
        let filter = 'all';

        function update() {
            const term = search.value.toLowerCase().trim();
            let count = 0;
            cards.forEach(card => {
                card.hidden = !((filter === 'all' || card.dataset.category === filter) && (!term || card.dataset.search.includes(term)));
                if (!card.hidden) count++
            });
            empty.hidden = count > 0
        }
        search.addEventListener('input', update);
        document.querySelectorAll('.category').forEach(button => button.addEventListener('click', () => {
            document.querySelector('.category.active').classList.remove('active');
            button.classList.add('active');
            filter = button.dataset.filter;
            update()
        }));
    </script>
</body>

</html>