/**
 * Yojna Sathi - Core Interactive Components (main.js)
 * Native Vanilla JavaScript - Handles Navigation, Search, Filters, Accordions & UI
 */

(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', () => {

        // ======================================================================
        // 1. Universal Mobile Navigation Toggle
        // ======================================================================
        const menuToggle = document.querySelector('.menu-toggle');
        const mainNav = document.querySelector('.main-nav');
        let navBackdrop = document.querySelector('.nav-backdrop');

        // Create backdrop if not already in DOM
        if (!navBackdrop && mainNav) {
            navBackdrop = document.createElement('div');
            navBackdrop.className = 'nav-backdrop';
            document.body.appendChild(navBackdrop);
        }

        function toggleMobileNav(forceState) {
            if (!mainNav || !menuToggle) return;
            const isOpen = forceState !== undefined ? forceState : !mainNav.classList.contains('open');

            mainNav.classList.toggle('open', isOpen);
            menuToggle.classList.toggle('is-active', isOpen);
            menuToggle.setAttribute('aria-expanded', String(isOpen));
            if (navBackdrop) {
                navBackdrop.classList.toggle('open', isOpen);
            }
            document.body.style.overflow = isOpen && window.innerWidth <= 960 ? 'hidden' : '';
        }

        if (menuToggle && mainNav) {
            menuToggle.addEventListener('click', (e) => {
                e.stopPropagation();
                toggleMobileNav();
            });

            if (navBackdrop) {
                navBackdrop.addEventListener('click', () => toggleMobileNav(false));
            }

            // Close on escape key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && mainNav.classList.contains('open')) {
                    toggleMobileNav(false);
                }
            });

            // Close when clicking nav links on mobile
            mainNav.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth <= 960) {
                        toggleMobileNav(false);
                    }
                });
            });
        }

        // ======================================================================
        // Dropdown Navigation Support (Mobile & Keyboard accessibility)
        // ======================================================================
        const dropdownToggles = document.querySelectorAll('.nav-dropdown-toggle');
        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', (e) => {
                e.stopPropagation();
                const dropdown = toggle.closest('.nav-dropdown');
                if (!dropdown) return;
                const isExpanded = dropdown.classList.contains('is-open');

                document.querySelectorAll('.nav-dropdown.is-open').forEach(d => {
                    if (d !== dropdown) {
                        d.classList.remove('is-open');
                        const t = d.querySelector('.nav-dropdown-toggle');
                        if (t) t.setAttribute('aria-expanded', 'false');
                    }
                });

                dropdown.classList.toggle('is-open', !isExpanded);
                toggle.setAttribute('aria-expanded', String(!isExpanded));
            });
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.nav-dropdown')) {
                document.querySelectorAll('.nav-dropdown.is-open').forEach(d => {
                    d.classList.remove('is-open');
                    const t = d.querySelector('.nav-dropdown-toggle');
                    if (t) t.setAttribute('aria-expanded', 'false');
                });
            }
        });

        // Close dropdown on Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                document.querySelectorAll('.nav-dropdown.is-open').forEach(d => {
                    d.classList.remove('is-open');
                    const t = d.querySelector('.nav-dropdown-toggle');
                    if (t) t.setAttribute('aria-expanded', 'false');
                });
            }
        });

        // ======================================================================
        // 2. Sticky Header Elevation on Scroll
        // ======================================================================
        const siteHeader = document.querySelector('.site-header');
        if (siteHeader) {
            window.addEventListener('scroll', () => {
                siteHeader.classList.toggle('scrolled', window.scrollY > 15);
            }, { passive: true });
        }

        // ======================================================================
        // 3. Scheme & Scholarship Search & Category Filtering
        // ======================================================================
        const searchInput = document.querySelector('#scheme-search');
        const clearBtn = document.querySelector('#search-clear');
        const cards = [...document.querySelectorAll('.scheme-card')];
        const categoryButtons = document.querySelectorAll('.category');
        const emptyState = document.querySelector('#empty-state');
        const resultsCountEl = document.querySelector('#results-count');
        const resetFiltersBtn = document.querySelector('#reset-filters-btn');

        let activeCategory = 'all';

        function applyCardFilters() {
            if (!cards.length) return;

            const term = searchInput ? searchInput.value.toLowerCase().trim() : '';
            let visibleCount = 0;

            cards.forEach(card => {
                const category = card.dataset.category || '';
                const searchData = (card.dataset.search || card.textContent || '').toLowerCase();

                const matchesCategory = activeCategory === 'all' || category === activeCategory;
                const matchesSearch = !term || searchData.includes(term);

                const isVisible = matchesCategory && matchesSearch;
                card.hidden = !isVisible;

                if (isVisible) visibleCount++;
            });

            // Update clear button
            if (clearBtn) {
                clearBtn.classList.toggle('visible', term.length > 0);
            }

            // Update results counter
            if (resultsCountEl) {
                resultsCountEl.textContent = `Showing ${visibleCount} of ${cards.length} programs`;
            }

            // Empty state display
            if (emptyState) {
                emptyState.hidden = visibleCount > 0;
            }
        }

        if (searchInput && cards.length) {
            searchInput.addEventListener('input', applyCardFilters);
        }

        if (clearBtn && searchInput) {
            clearBtn.addEventListener('click', () => {
                searchInput.value = '';
                searchInput.focus();
                applyCardFilters();
            });
        }

        if (categoryButtons.length) {
            categoryButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    const currentActive = document.querySelector('.category.active');
                    if (currentActive) currentActive.classList.remove('active');

                    btn.classList.add('active');
                    activeCategory = btn.dataset.filter || 'all';
                    applyCardFilters();
                });
            });
        }

        if (resetFiltersBtn) {
            resetFiltersBtn.addEventListener('click', () => {
                if (searchInput) searchInput.value = '';
                const allBtn = document.querySelector('.category[data-filter="all"]');
                if (allBtn) {
                    const currentActive = document.querySelector('.category.active');
                    if (currentActive) currentActive.classList.remove('active');
                    allBtn.classList.add('active');
                }
                activeCategory = 'all';
                applyCardFilters();
            });
        }

        // ======================================================================
        // 4. Hero Quick Search Pill Triggers
        // ======================================================================
        const heroSearchPill = document.querySelector('#hero-search-pill');
        if (heroSearchPill && searchInput) {
            heroSearchPill.addEventListener('click', () => {
                const targetText = heroSearchPill.dataset.query || 'scholarship';
                searchInput.value = targetText;

                // Smooth scroll to schemes section
                const schemesSection = document.querySelector('#schemes');
                if (schemesSection) {
                    schemesSection.scrollIntoView({ behavior: 'smooth' });
                }

                setTimeout(() => {
                    searchInput.focus();
                    applyCardFilters();
                }, 400);
            });
        }

        // ======================================================================
        // 5. FAQ Accordion Components
        // ======================================================================
        const faqQuestions = document.querySelectorAll('.faq-question');
        faqQuestions.forEach(btn => {
            btn.addEventListener('click', () => {
                const item = btn.closest('.faq-item');
                if (!item) return;

                const isOpen = item.classList.contains('open');

                // Optionally close others in same accordion
                const parentAccordion = item.closest('.faq-list');
                if (parentAccordion) {
                    parentAccordion.querySelectorAll('.faq-item.open').forEach(openItem => {
                        if (openItem !== item) openItem.classList.remove('open');
                    });
                }

                item.classList.toggle('open', !isOpen);
                btn.setAttribute('aria-expanded', String(!isOpen));
            });
        });

        // ======================================================================
        // 6. Password Visibility Toggle
        // ======================================================================
        const passwordToggles = document.querySelectorAll('.password-toggle-btn');
        passwordToggles.forEach(toggle => {
            toggle.addEventListener('click', () => {
                const input = toggle.parentElement.querySelector('input');
                if (!input) return;

                const isPassword = input.type === 'password';
                input.type = isPassword ? 'text' : 'password';
                toggle.textContent = isPassword ? 'Hide' : 'Show';
                toggle.setAttribute('aria-label', isPassword ? 'Hide password' : 'Show password');
            });
        });

        // ======================================================================
        // 7. Demo Account Filler Button
        // ======================================================================
        const fillDemoBtn = document.querySelector('#fill-demo-btn');
        if (fillDemoBtn) {
            fillDemoBtn.addEventListener('click', () => {
                const emailInput = document.querySelector('#email');
                const passwordInput = document.querySelector('#password');
                if (emailInput && passwordInput) {
                    emailInput.value = 'citizen@yojnasathi.in';
                    passwordInput.value = 'password123';
                    if (window.YojnaValidation) {
                        window.YojnaValidation.validateField(emailInput);
                        window.YojnaValidation.validateField(passwordInput);
                    }
                }
            });
        }

        // ======================================================================
        // 8. Dynamic Profile Progress Calculation
        // ======================================================================
        const profileForm = document.querySelector('#profileForm');
        const progressFill = document.querySelector('#profile-progress-fill');
        const progressPercentText = document.querySelector('#profile-progress-percent');

        function updateProfileProgress() {
            if (!profileForm || !progressFill || !progressPercentText) return;

            const nameInput = profileForm.querySelector('#full-name');
            const districtInput = profileForm.querySelector('#district');
            const interestSelect = profileForm.querySelector('#interest');

            let score = 25; // Base score for having an email/account
            if (nameInput && nameInput.value.trim().length >= 2) score += 25;
            if (districtInput && districtInput.value.trim().length >= 2) score += 25;
            if (interestSelect && interestSelect.value && !interestSelect.value.toLowerCase().includes('choose')) score += 25;

            progressFill.style.width = `${score}%`;
            progressPercentText.textContent = `${score}% Complete`;
        }

        if (profileForm) {
            updateProfileProgress();
            profileForm.addEventListener('input', updateProfileProgress);
            profileForm.addEventListener('change', updateProfileProgress);
        }

        // ======================================================================
        // 9. Interactive Document Checklist in Detail Views
        // ======================================================================
        const docCheckboxes = document.querySelectorAll('.checklist-item input[type="checkbox"]');
        const docCountEl = document.querySelector('#doc-ready-count');

        function updateDocCounter() {
            if (!docCountEl || !docCheckboxes.length) return;
            const checkedCount = [...docCheckboxes].filter(c => c.checked).length;
            docCountEl.textContent = `${checkedCount} of ${docCheckboxes.length} documents ready`;
        }

        if (docCheckboxes.length && docCountEl) {
            docCheckboxes.forEach(cb => cb.addEventListener('change', updateDocCounter));
            updateDocCounter();
        }

        // Run initial card filter
        if (cards.length) {
            applyCardFilters();
        }
    });

})();
