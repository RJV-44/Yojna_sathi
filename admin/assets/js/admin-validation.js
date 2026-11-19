/**
 * Yojna Sathi - Admin Portal Pure JavaScript Form Validation
 * (No Bootstrap dependency - Native Vanilla JS)
 */

(function () {
    'use strict';

    // SVG icon for validation error messages
    const ERROR_ICON_SVG = '<svg viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>';

    // Email validation regex (RFC 5322 simplified standard)
    const EMAIL_REGEX = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)+$/;

    /**
     * Show validation error on an admin form control
     */
    function showError(input, message) {
        clearError(input);

        input.classList.add('js-invalid');
        input.classList.remove('js-valid');
        input.setAttribute('aria-invalid', 'true');

        const errorEl = document.createElement('div');
        errorEl.className = 'js-error-message';
        errorEl.setAttribute('role', 'alert');
        errorEl.innerHTML = `${ERROR_ICON_SVG}<span>${message}</span>`;

        const group = input.closest('.form-group');
        if (group) {
            group.appendChild(errorEl);
        } else {
            input.insertAdjacentElement('afterend', errorEl);
        }
    }

    /**
     * Clear validation error on an admin form control
     */
    function clearError(input) {
        input.classList.remove('js-invalid');
        input.removeAttribute('aria-invalid');

        const group = input.closest('.form-group');
        if (group) {
            const errorEl = group.querySelector('.js-error-message');
            if (errorEl) errorEl.remove();
        } else if (input.nextElementSibling && input.nextElementSibling.classList.contains('js-error-message')) {
            input.nextElementSibling.remove();
        }
    }

    /**
     * Mark an admin form control as valid
     */
    function markValid(input) {
        clearError(input);
        if (input.value && input.value.trim() !== '') {
            input.classList.add('js-valid');
        } else {
            input.classList.remove('js-valid');
        }
    }

    /**
     * Get user-friendly label for field
     */
    function getFieldLabel(input) {
        if (input.id) {
            const labelEl = document.querySelector(`label[for="${input.id}"]`);
            if (labelEl && labelEl.textContent) {
                return labelEl.textContent.trim().replace(/[*:]/g, '');
            }
        }
        if (input.placeholder) {
            return input.placeholder.trim();
        }
        if (input.name) {
            return input.name.charAt(0).toUpperCase() + input.name.slice(1).replace(/_/g, ' ');
        }
        return 'This field';
    }

    /**
     * Validate an individual admin input field
     */
    function validateAdminField(input) {
        const val = input.value !== undefined ? input.value.trim() : '';
        const id = (input.id || input.name || '').toLowerCase();
        const type = input.type || '';
        const isRequired = input.hasAttribute('required');

        // If optional and empty, clear errors and return true
        if (!isRequired && val === '') {
            clearError(input);
            input.classList.remove('js-valid');
            return true;
        }

        // Check empty for required fields
        if (isRequired && val === '') {
            const label = getFieldLabel(input);
            showError(input, `${label} is required.`);
            return false;
        }

        // Check select default option
        if (input.tagName.toLowerCase() === 'select') {
            if (val === '' || val.toLowerCase().includes('select category') || val.toLowerCase() === 'select') {
                showError(input, 'Please select a valid option from the list.');
                return false;
            }
        }

        // Email validation
        if (type === 'email' || id.includes('email')) {
            if (!EMAIL_REGEX.test(val)) {
                showError(input, 'Please enter a valid email address (e.g. admin@yojnasathi.in).');
                return false;
            }
        }

        // Password validation
        if (type === 'password' || id === 'password') {
            if (val.length < 6) {
                showError(input, 'Password must be at least 6 characters long.');
                return false;
            }
        }

        // Date validation
        if (type === 'date' || id.includes('date') || id === 'deadline') {
            if (isNaN(Date.parse(val))) {
                showError(input, 'Please select a valid date.');
                return false;
            }
        }

        // Name / Title / Slug validation
        if (id === 'scheme-name' || id === 'scholarship-name') {
            if (val.length < 3) {
                showError(input, 'Name must be at least 3 characters long.');
                return false;
            }
        }

        if (id === 'slug') {
            if (!/^[a-z0-9-]+$/.test(val)) {
                showError(input, 'Slug can only contain lowercase letters, numbers, and hyphens (e.g. state-scheme).');
                return false;
            }
        }

        if (id === 'amount') {
            // Allows numbers with optional currency symbol e.g. ₹25,000 or 25000
            if (!/^[0-9₹$,.\s]+$/.test(val) || !/\d/.test(val)) {
                showError(input, 'Please enter a valid amount (e.g. ₹25,000 or 25000).');
                return false;
            }
        }

        // Textarea length validation
        if (input.tagName.toLowerCase() === 'textarea') {
            if (val.length < 10) {
                showError(input, 'Description / content must be at least 10 characters long.');
                return false;
            }
        }

        markValid(input);
        return true;
    }

    /**
     * Show floating toast notification for admin actions
     */
    function showAdminToast(message, type = 'success') {
        const existing = document.querySelector('.admin-toast');
        if (existing) existing.remove();

        const toast = document.createElement('div');
        toast.className = `admin-toast ${type}`;
        const iconSvg = type === 'success'
            ? '<svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>'
            : ERROR_ICON_SVG;

        toast.innerHTML = `${iconSvg}<span>${message}</span>`;
        document.body.appendChild(toast);

        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transform = 'translateY(16px)';
            setTimeout(() => toast.remove(), 300);
        }, 4000);
    }

    /**
     * Auto-slug generation for category form
     */
    function setupSlugAutoGeneration() {
        const nameInput = document.querySelector('#name');
        const slugInput = document.querySelector('#slug');
        if (nameInput && slugInput && window.location.pathname.includes('categories')) {
            nameInput.addEventListener('input', () => {
                // Only auto-fill if user hasn't typed a custom slug
                if (!slugInput.dataset.manual) {
                    slugInput.value = nameInput.value
                        .toLowerCase()
                        .trim()
                        .replace(/[^\w\s-]/g, '')
                        .replace(/[\s_-]+/g, '-')
                        .replace(/^-+|-+$/g, '');
                    if (slugInput.value) {
                        markValid(slugInput);
                    }
                }
            });

            slugInput.addEventListener('input', () => {
                slugInput.dataset.manual = 'true';
            });
        }
    }

    /**
     * Initialize validation on an admin form
     */
    function initAdminForm(form, successMessage) {
        if (!form) return;

        form.setAttribute('novalidate', 'true');

        const inputs = form.querySelectorAll('input:not([type="hidden"]):not([type="checkbox"]):not([type="radio"]):not([type="button"]):not([type="submit"]):not([type="reset"]), select, textarea');

        // Attach live input / blur handlers
        inputs.forEach(input => {
            input.addEventListener('input', () => {
                if (input.classList.contains('js-invalid')) {
                    validateAdminField(input);
                }
            });

            input.addEventListener('blur', () => {
                if (input.value.trim() !== '') {
                    validateAdminField(input);
                }
            });

            if (input.tagName.toLowerCase() === 'select') {
                input.addEventListener('change', () => validateAdminField(input));
            }
        });

        // Form submit handler
        form.addEventListener('submit', (e) => {
            let isFormValid = true;
            let firstInvalid = null;

            inputs.forEach(input => {
                const valid = validateAdminField(input);
                if (!valid) {
                    isFormValid = false;
                    if (!firstInvalid) firstInvalid = input;
                }
            });

            if (!isFormValid) {
                e.preventDefault();
                if (firstInvalid) {
                    firstInvalid.focus();
                    showAdminToast('Please correct the highlighted errors before saving.', 'error');
                }
            } else {
                // If this is the login form, let it submit to dashboard.php
                if (form.getAttribute('action') === 'dashboard.php') {
                    return true;
                }

                // For admin management forms without backend endpoints, provide feedback
                e.preventDefault();
                showAdminToast(successMessage || 'Changes saved successfully!', 'success');
            }
        });

        // Reset button clears validation styles
        const resetBtn = form.querySelector('button[type="reset"]');
        if (resetBtn) {
            resetBtn.addEventListener('click', () => {
                setTimeout(() => {
                    inputs.forEach(i => clearError(i));
                }, 50);
            });
        }
    }

    // Attach to DOMContentLoaded
    document.addEventListener('DOMContentLoaded', () => {
        // Setup slug generator if present
        setupSlugAutoGeneration();

        // Mobile Sidebar Toggle
        const sidebarToggle = document.querySelector('#adminSidebarToggle');
        const sidebar = document.querySelector('.sidebar');
        if (sidebarToggle && sidebar) {
            sidebarToggle.addEventListener('click', (e) => {
                e.stopPropagation();
                sidebar.classList.toggle('mobile-open');
            });

            document.addEventListener('click', (e) => {
                if (sidebar.classList.contains('mobile-open') && !sidebar.contains(e.target) && e.target !== sidebarToggle) {
                    sidebar.classList.remove('mobile-open');
                }
            });
        }

        // 1. Admin Login Form (admin/index.php)
        const loginForm = document.querySelector('.admin-auth form');
        if (loginForm) {
            initAdminForm(loginForm, 'Signing in...');
        }

        // 2. Form panel forms (schemes, scholarships, categories, notifications, content, settings)
        const panelForm = document.querySelector('.form-panel form');
        if (panelForm) {
            const pagePath = window.location.pathname;
            let msg = 'Changes saved successfully!';

            if (pagePath.includes('add-scheme')) {
                msg = 'Scheme created successfully!';
            } else if (pagePath.includes('edit-scheme')) {
                msg = 'Scheme updated successfully!';
            } else if (pagePath.includes('add-scholarship')) {
                msg = 'Scholarship created successfully!';
            } else if (pagePath.includes('edit-scholarship')) {
                msg = 'Scholarship updated successfully!';
            } else if (pagePath.includes('add-category')) {
                msg = 'Category added successfully!';
            } else if (pagePath.includes('add-notification')) {
                msg = 'Notification sent successfully!';
            } else if (pagePath.includes('homepage')) {
                msg = 'Homepage content updated successfully!';
            } else if (pagePath.includes('profile')) {
                msg = 'Admin profile updated successfully!';
            } else if (pagePath.includes('settings')) {
                msg = 'System settings saved successfully!';
            }

            initAdminForm(panelForm, msg);
        }
    });

    // Expose globally
    window.AdminValidation = {
        validateAdminField,
        showError,
        clearError,
        showAdminToast
    };
})();
