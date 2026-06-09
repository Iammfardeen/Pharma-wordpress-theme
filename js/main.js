/**
 * Daniyal Pharma Theme - Main JavaScript
 */
document.addEventListener('DOMContentLoaded', function() {

    /* ============================================
       STICKY HEADER SHADOW
    ============================================ */
    const header = document.getElementById('masthead');
    if (header) {
        window.addEventListener('scroll', function() {
            header.classList.toggle('scrolled', window.scrollY > 50);
        }, { passive: true });
    }

    /* ============================================
       MOBILE MENU TOGGLE
    ============================================ */
    const toggleBtn = document.getElementById('menu-toggle-btn');
    const mobileNav = document.getElementById('mobile-nav');

    if (toggleBtn && mobileNav) {
        toggleBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            var isOpen = mobileNav.classList.toggle('open');
            toggleBtn.classList.toggle('active', isOpen);
            toggleBtn.setAttribute('aria-expanded', isOpen);
            mobileNav.setAttribute('aria-hidden', !isOpen);
        });

        // Close when a menu link is clicked
        mobileNav.querySelectorAll('a').forEach(function(link) {
            link.addEventListener('click', function() {
                mobileNav.classList.remove('open');
                toggleBtn.classList.remove('active');
                toggleBtn.setAttribute('aria-expanded', 'false');
                mobileNav.setAttribute('aria-hidden', 'true');
            });
        });

        // Close on outside click
        document.addEventListener('click', function(e) {
            if (!header.contains(e.target)) {
                mobileNav.classList.remove('open');
                toggleBtn.classList.remove('active');
                toggleBtn.setAttribute('aria-expanded', 'false');
                mobileNav.setAttribute('aria-hidden', 'true');
            }
        });
    }

    /* ============================================
       SCROLL REVEAL
    ============================================ */
    if ('IntersectionObserver' in window) {
        var revealEls = document.querySelectorAll(
            '.category-card, .segment-card, .service-card, .feature-card, .post-card, .product-card'
        );
        revealEls.forEach(function(el, i) {
            el.style.opacity = '0';
            el.style.transform = 'translateY(24px)';
            el.style.transition = 'opacity 0.5s ease ' + ((i % 4) * 0.08) + 's, transform 0.5s ease ' + ((i % 4) * 0.08) + 's';
        });
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
        revealEls.forEach(function(el) { observer.observe(el); });
    }

    /* ============================================
       PRODUCT FILTER
    ============================================ */
    var filterBtns   = document.querySelectorAll('.filter-btn');
    var productCards = document.querySelectorAll('.product-card[data-segment]');
    if (filterBtns.length && productCards.length) {
        filterBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                filterBtns.forEach(function(b) { b.classList.remove('active'); });
                btn.classList.add('active');
                var filter = btn.dataset.filter;
                productCards.forEach(function(card) {
                    card.style.display = (filter === 'all' || card.dataset.segment === filter) ? '' : 'none';
                });
            });
        });
    }

    /* ============================================
       CONTACT FORM (AJAX)
    ============================================ */
    var contactForm = document.getElementById('dp-contact-form');
    if (contactForm && typeof daniyalData !== 'undefined') {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            var btn = contactForm.querySelector('[type="submit"]');
            var msg = contactForm.querySelector('.form-message');
            btn.disabled = true;
            btn.textContent = 'Sending...';
            var data = new FormData(contactForm);
            data.append('action', 'daniyal_contact');
            data.append('nonce', daniyalData.nonce);
            fetch(daniyalData.ajaxUrl, { method: 'POST', body: data })
                .then(function(r) { return r.json(); })
                .then(function(json) {
                    if (msg) {
                        msg.textContent = (json.data && json.data.message) ? json.data.message : (json.success ? 'Message sent!' : 'Error. Try again.');
                        msg.style.color = json.success ? 'var(--accent)' : '#e53e3e';
                    }
                    if (json.success) contactForm.reset();
                    btn.disabled = false;
                    btn.textContent = 'Send Inquiry';
                })
                .catch(function() {
                    if (msg) { msg.textContent = 'Network error. Please try again.'; msg.style.color = '#e53e3e'; }
                    btn.disabled = false;
                    btn.textContent = 'Send Inquiry';
                });
        });
    }

});
