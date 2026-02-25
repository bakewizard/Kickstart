const scrollUpButton = document.getElementById('scroll-up');

function scrollToTop(e, duration = 800) {
    e.preventDefault();
    const start = window.scrollY;
    const startTime = performance.now();
    const animate = (timestamp) => {
        const elapsed = timestamp - startTime;
        const progress = Math.min(elapsed / duration, 1);
        const eased = progress < 0.5
            ? 4 * progress ** 3
            : (progress - 1) * (2 * progress - 2) ** 2 + 1;
        window.scrollTo(0, Math.floor(start - start * eased));
        if (elapsed < duration) requestAnimationFrame(animate);
    };
    requestAnimationFrame(animate);
}

function onScroll() {
    if (!scrollUpButton) return;
    if (window.scrollY > 400) {
        scrollUpButton.style.opacity = 0;
        scrollUpButton.style.display = 'block';
        (function fade() {
            const val = parseFloat(scrollUpButton.style.opacity);
            if (!((val + 0.1) > 1)) {
                scrollUpButton.style.opacity = val + 0.1;
                requestAnimationFrame(fade);
            }
        })();
    } else {
        (function fade() {
            if ((scrollUpButton.style.opacity -= 0.1) < 0) {
                scrollUpButton.style.display = 'none';
            } else {
                requestAnimationFrame(fade);
            }
        })();
    }
}

export function initScrollToTop() {
    if (!scrollUpButton) return;
    scrollUpButton.addEventListener('click', scrollToTop);
    window.addEventListener('scroll', onScroll);
}
