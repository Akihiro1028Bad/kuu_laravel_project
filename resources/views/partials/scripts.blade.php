{{-- resources/views/partials/scripts.blade.php --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const loadingScreen = document.getElementById('loading-screen');
        const siteHeader = document.querySelector('.site-header');
        const mainContent = document.querySelector('.main-content');
        const siteFooter = document.querySelector('.site-footer');

        // ローディング画面を非表示にする
        setTimeout(() => {
            if (loadingScreen) loadingScreen.classList.add('hidden');
            if (siteHeader) siteHeader.classList.add('visible');
            if (mainContent) mainContent.classList.add('visible');
            if (siteFooter) siteFooter.classList.add('visible');
        }, 2500);

        // --- Menu Toggle ---
        const menuToggle = document.getElementById('menu-toggle');
        const closeNavBtn = document.getElementById('close-nav-btn');
        const fullscreenNav = document.getElementById('fullscreen-nav');

        if (menuToggle && fullscreenNav && closeNavBtn) {
            const navLinks = fullscreenNav.querySelectorAll('.nav-links a');

            function openMenu() {
                fullscreenNav.classList.add('active');
                document.body.style.overflow = 'hidden';
                menuToggle.setAttribute('aria-expanded', 'true');
            }

            function closeMenu() {
                fullscreenNav.classList.remove('active');
                document.body.style.overflow = '';
                menuToggle.setAttribute('aria-expanded', 'false');
            }

            menuToggle.addEventListener('click', openMenu);
            closeNavBtn.addEventListener('click', closeMenu);

            navLinks.forEach(link => link.addEventListener('click', closeMenu));

            fullscreenNav.addEventListener('click', (e) => {
                if (e.target === fullscreenNav) closeMenu();
            });
        } else {
            console.error("Menu elements not found!");
        }

        // --- Scroll Animation ---
        const fadeElements = document.querySelectorAll('.fade-in-section');
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    obs.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1
        });

        fadeElements.forEach(el => observer.observe(el));
    });
</script>
