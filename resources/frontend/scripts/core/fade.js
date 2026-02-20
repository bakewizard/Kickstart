export function fadeIn(element, duration, callback) {
    element.style.opacity = 0;
    element.style.display = '';

    let start = null;
    const animate = (timestamp) => {
        if (!start)
            start = timestamp;
        const progress = timestamp - start;
        element.style.opacity = progress / duration;
        if (progress < duration) {
            requestAnimationFrame(animate);
        } else {
            if (callback && typeof callback === 'function') {
                callback.call(element);
            }
        }
    };

    requestAnimationFrame(animate);
}

export function fadeOut(element, duration, callback) {
    let start = null;
    const animate = (timestamp) => {
        if (!start)
            start = timestamp;
        const progress = timestamp - start;
        element.style.opacity = 1 - progress / duration;
        if (progress < duration) {
            requestAnimationFrame(animate);
        } else {
            element.style.display = 'none';
            if (callback && typeof callback === 'function') {
                callback.call(element);
            }
        }
    };

    requestAnimationFrame(animate);
}
