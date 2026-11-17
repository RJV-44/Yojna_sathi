/**
 * Yojna Sathi - Pure JavaScript Form Validation
 * (No Bootstrap dependency - Native Vanilla JS)
 */

(function () {
    'use strict';

    // SVG icon for error messages
    const ERROR_ICON_SVG = '<svg viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>';

    // Email validation regex (RFC 5322 simplified standard)
    const EMAIL_REGEX = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)+$/;

    /**
     * Show validation error for a specific field
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

        // If input is part of a complex container (like search bar or subscribe form), position correctly
        if (input.closest('.subscribe-form')) {
            const form = input.closest('.subscribe-form');
            form.insertAdjacentElement('afterend', errorEl);
        } else if (input.parentElement && input.parentElement.classList.contains('form-group')) {
            input.parentElement.appendChild(errorEl);
        } else {
            input.insertAdjacentElement('afterend', errorEl);
        }
    }

    /**
     * Clear validation error for a specific field
     */
    function clearError(input) {
        input.classList.remove('js-invalid');
        input.removeAttribute('aria-invalid');

        // Look for adjacent error message or within parent
        let errorEl = null;
        if (input.closest('.subscribe-form')) {
            const form = input.closest('.subscribe-form');
            if (form.nextElementSibling && form.nextElementSibling.classList.contains('js-error-message')) {
                errorEl = form.nextElementSibling;
            }
        } else if (input.parentElement && input.parentElement.querySelector('.js-error-message')) {
            errorEl = input.parentElement.querySelector('.js-error-message');
        } else if (input.nextElementSibling && input.nextElementSibling.classList.contains('js-error-message')) {
            errorEl = input.nextElementSibling;
        }

        if (errorEl) {
            errorEl.remove();
        }
    }

    /**
     * Mark input as valid
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
     * Validate an individual input element
     * Returns true if valid, false if invalid
     */
    function validateField(input) {
        const val = input.value !== undefined ? input.value.trim() : '';
        const id = input.id || input.name || '';
        const type = input.type || '';
        const isRequired = input.hasAttribute('required') || input.dataset.required === 'true';

        // Check required
        if (isRequired && val === '') {
            const label = getFieldLabel(input);
            showError(input, `${label} is required.`);
            return false;
        }

        // Check select default
        if (input.tagName.toLowerCase() === 'select') {
            if (isRequired && (val === '' || val.toLowerCase().includes('select') || val.toLowerCase().includes('choose'))) {
                showError(input, 'Please select an option.');
                return false;
            }
        }

        // If optional and empty, clear error and return true
        if (!isRequired && val === '') {
            clearError(input);
            input.classList.remove('js-valid');
            return true;
        }

        // Email validation
        if (type === 'email' || id.toLowerCase().includes('email')) {
            if (!EMAIL_REGEX.test(val)) {
                showError(input, 'Please enter a valid email address (e.g. name@example.com).');
                return false;
            }
        }

        // Name validation
        if (id === 'name' || id === 'full-name') {
            if (val.length < 2) {
                showError(input, 'Name must be at least 2 characters long.');
                return false;
            }
            if (!/^[a-zA-Z\s.'-]+$/.test(val)) {
                showError(input, 'Name should only contain letters and standard punctuation.');
                return false;
            }
        }

        // District validation (letters only)
        if (id === 'district') {
            if (val.length > 0 && !/^[a-zA-Z\s.-]+$/.test(val)) {
                showError(input, 'District should only contain letters.');
                return false;
            }
        }

        // Password validation
        if (type === 'password' || id === 'password') {
            const minLen = parseInt(input.getAttribute('minlength') || '6', 10);
            if (val.length < minLen) {
                showError(input, `Password must be at least ${minLen} characters long.`);
                return false;
            }
        }

        // Confirm password validation
        if (id === 'confirm_password' || id === 'confirm-password') {
            const pwdInput = document.querySelector('#password') || document.querySelector('input[type="password"]');
            if (pwdInput && val !== pwdInput.value) {
                showError(input, 'Passwords do not match. Please re-enter.');
                return false;
            }
        }

        // Message / Textarea validation
        if (id === 'message') {
            if (val.length < 10) {
                showError(input, 'Message must be at least 10 characters long.');
                return false;
            }
        }

        // Field passed validation
        markValid(input);
        return true;
    }

    /**
     * Get a user-friendly label name for an input
     */
    function getFieldLabel(input) {
        if (input.getAttribute('aria-label')) {
            return input.getAttribute('aria-label');
        }
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
     * Display a floating feedback toast
     */
    function showToast(message, type = 'success') {
        const existingToast = document.querySelector('.js-toast');
        if (existingToast) existingToast.remove();

        const toast = document.createElement('div');
        toast.className = `js-toast ${type}`;
        const iconSvg = type === 'success'
            ? '<svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>'
            : ERROR_ICON_SVG;

        toast.innerHTML = `${iconSvg}<span>${message}</span>`;
        document.body.appendChild(toast);

        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transform = 'translateY(15px)';
            setTimeout(() => toast.remove(), 300);
        }, 4000);
    }

    /**
     * Initialize validation on a form
     */
    function initFormValidation(form) {
        if (!form) return;

        // Disable standard browser tooltips
        form.setAttribute('novalidate', 'true');

        const inputs = form.querySelectorAll('input:not([type="hidden"]):not([type="submit"]):not([type="button"]):not([type="checkbox"]), select, textarea');

        // Attach live input / blur handlers
        inputs.forEach(input => {
            input.addEventListener('input', () => {
                if (input.classList.contains('js-invalid')) {
                    validateField(input);
                }
            });

            input.addEventListener('blur', () => {
                if (input.value.trim() !== '') {
                    validateField(input);
                }
            });

            if (input.tagName.toLowerCase() === 'select') {
                input.addEventListener('change', () => validateField(input));
            }
        });

        // Special handling for confirm password if password changes
        const pwdInput = form.querySelector('#password');
        const confirmPwdInput = form.querySelector('#confirm_password') || form.querySelector('#confirm-password');
        if (pwdInput && confirmPwdInput) {
            pwdInput.addEventListener('input', () => {
                if (confirmPwdInput.value.trim() !== '') {
                    validateField(confirmPwdInput);
                }
            });
        }
    }

    // Attach to DOMContentLoaded
    document.addEventListener('DOMContentLoaded', () => {
        // 1. Subscribe form on homepage
        const subscribeForm = document.querySelector('.subscribe-form');
        if (subscribeForm) {
            initFormValidation(subscribeForm);
            subscribeForm.removeAttribute('onsubmit'); // Remove inline handler
            subscribeForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const emailInput = subscribeForm.querySelector('#email') || subscribeForm.querySelector('input[type="email"]');
                if (emailInput && validateField(emailInput)) {
                    subscribeForm.classList.add('submitted');
                    const btn = subscribeForm.querySelector('button');
                    if (btn) btn.textContent = 'You are on the list';
                    showToast('Thank you for subscribing! We will keep you updated.', 'success');
                    emailInput.value = '';
                    emailInput.classList.remove('js-valid');
                } else if (emailInput) {
                    emailInput.focus();
                }
            });
        }

        // 2. User Login Form
        const loginForm = document.querySelector('.auth-card-public form');
        const isLoginPage = window.location.pathname.includes('login.php');
        if (loginForm && isLoginPage) {
            initFormValidation(loginForm);
            loginForm.addEventListener('submit', (e) => {
                const inputs = loginForm.querySelectorAll('input:not([type="checkbox"]):not([type="hidden"])');
                let isFormValid = true;
                let firstInvalid = null;

                inputs.forEach(input => {
                    const valid = validateField(input);
                    if (!valid) {
                        isFormValid = false;
                        if (!firstInvalid) firstInvalid = input;
                    }
                });

                if (!isFormValid) {
                    e.preventDefault();
                    if (firstInvalid) firstInvalid.focus();
                }
            });
        }

        // 3. User Register Form
        const isRegisterPage = window.location.pathname.includes('register.php');
        if (loginForm && isRegisterPage) {
            initFormValidation(loginForm);
            loginForm.addEventListener('submit', (e) => {
                const inputs = loginForm.querySelectorAll('input:not([type="checkbox"]):not([type="hidden"])');
                let isFormValid = true;
                let firstInvalid = null;

                inputs.forEach(input => {
                    const valid = validateField(input);
                    if (!valid) {
                        isFormValid = false;
                        if (!firstInvalid) firstInvalid = input;
                    }
                });

                if (!isFormValid) {
                    e.preventDefault();
                    if (firstInvalid) firstInvalid.focus();
                }
            });
        }

        // 4. Contact Form
        const contactForm = document.querySelector('.contact-form');
        if (contactForm) {
            initFormValidation(contactForm);
            contactForm.removeAttribute('onsubmit'); // Remove inline handler
            contactForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const inputs = contactForm.querySelectorAll('input, textarea');
                let isFormValid = true;
                let firstInvalid = null;

                inputs.forEach(input => {
                    const valid = validateField(input);
                    if (!valid) {
                        isFormValid = false;
                        if (!firstInvalid) firstInvalid = input;
                    }
                });

                if (!isFormValid) {
                    if (firstInvalid) firstInvalid.focus();
                } else {
                    const successMsg = document.querySelector('#contact-success');
                    if (successMsg) successMsg.hidden = false;
                    showToast('Thank you! Your message has been sent successfully.', 'success');
                    contactForm.reset();
                    inputs.forEach(i => i.classList.remove('js-valid'));
                }
            });
        }

        // 5. User Profile Form
        const profileForm = document.querySelector('.profile-form');
        if (profileForm) {
            initFormValidation(profileForm);
            profileForm.addEventListener('submit', (e) => {
                const inputs = profileForm.querySelectorAll('input, select');
                let isFormValid = true;
                let firstInvalid = null;

                inputs.forEach(input => {
                    const valid = validateField(input);
                    if (!valid) {
                        isFormValid = false;
                        if (!firstInvalid) firstInvalid = input;
                    }
                });

                if (!isFormValid) {
                    e.preventDefault();
                    if (firstInvalid) firstInvalid.focus();
                }
            });
        }
    });

    // Expose helpers globally if needed
    window.YojnaValidation = {
        validateField,
        showError,
        clearError,
        showToast
    };
})();
