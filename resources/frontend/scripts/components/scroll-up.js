import { fadeIn, fadeOut } from '../core/fade.js';

export function initScrollUp() {
    const scrollUpButton = document.getElementById('scroll-up');
    if (!scrollUpButton) return;

    const onScroll = () => {
        if (window.scrollY > 400) fadeIn(scrollUpButton, 300);
        else fadeOut(scrollUpButton, 300);
    };

    const scrollToTop = (e, duration = 800) => {
        e.preventDefault();
        const start = window.scrollY;
        const startTime = performance.now();
        const distance = start;

        const animateScroll = (timestamp) => {
            const timeElapsed = timestamp - startTime;
            const progress = Math.min(timeElapsed / duration, 1);
            const eased = progress < 0.5
                ? 4 * progress * progress * progress
                : (progress - 1) * (2 * progress - 2) * (2 * progress - 2) + 1;
            window.scrollTo(0, Math.floor(start - distance * eased));
            if (timeElapsed < duration) requestAnimationFrame(animateScroll);
        };
        requestAnimationFrame(animateScroll);
    };

    window.addEventListener('scroll', onScroll);
    scrollUpButton.addEventListener('click', scrollToTop);
}
