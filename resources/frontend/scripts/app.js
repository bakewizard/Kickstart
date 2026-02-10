import * as bootstrap from 'bootstrap';
import 'blueimp-gallery/js/blueimp-helper';
import 'blueimp-gallery/js/blueimp-gallery';
import 'blueimp-gallery/js/blueimp-gallery-indicator';
import Inputmask from 'inputmask';
import UseBootstrapSelect from 'use-bootstrap-select'
import { tns as Slider } from 'tiny-slider';
import * as noUiSlider from 'nouislider/dist/nouislider';
import { Datepicker } from 'vanillajs-datepicker';
import uk from 'vanillajs-datepicker/locales/uk';

Object.assign(Datepicker.locales, uk);

window.bootstrap = bootstrap;
window.Slider = Slider;
window.Datepicker = Datepicker;
window.ComboBox = UseBootstrapSelect;
window.noUiSlider = noUiSlider;

let scrollUpButton = document.getElementById('scroll-up');

export async function ajax({
    url,
    method = "GET",
    data = null,
    headers = {},
    dataType = "json",
    timeout = 10000
}) {
    const controller = new AbortController();
    const timeoutId = setTimeout(() => controller.abort(), timeout);

    const acceptTypes = {
        json: "application/json",
        text: "text/plain",
        html: "text/html",
        any: "*/*"
    };

    headers = {
        'X-Requested-With': 'XMLHttpRequest',
        'Accept': acceptTypes[dataType] || acceptTypes.any,
        ...headers
    };

    let options = { method, headers, signal: controller.signal };

    if (data) {
        if (method.toUpperCase() === "GET") {
            url += "?" + new URLSearchParams(data).toString();
        } else if (data instanceof FormData) {
            options.body = data; // Let fetch handle FormData
        } else {
            headers["Content-Type"] = "application/json";
            options.body = JSON.stringify(data);
        }
    }

    try {
        const response = await fetch(url, options);
        clearTimeout(timeoutId);

        if (!response.ok) throw new Error(`${response.status}: ${response.statusText}`);

        return dataType === "json" ? response.json() : response.text();
    } catch (err) {
        if (err.name === "AbortError") throw new Error("Request timed out");
        throw err;
    }
}

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

function onScroll() {
    if (window.scrollY > 400) {
        scrollUpButton.style.opacity = 0;
        scrollUpButton.style.display = 'block';

        (function fade() {
            var val = parseFloat(scrollUpButton.style.opacity);
            if (!((val += .1) > 1)) {
                scrollUpButton.style.opacity = val;
                requestAnimationFrame(fade);
            }
        })();
    } else {
        scrollUpButton.style.opacity = 1;

        (function fade() {
            if ((scrollUpButton.style.opacity -= .1) < 0) {
                scrollUpButton.style.display = "none";
            } else {
                requestAnimationFrame(fade);
            }
        })();
    }
}

function scrollToTop(e, duration = 800) {
    e.preventDefault();
    const start = window.scrollY;
    const startTime = 'now' in window.performance ? performance.now() : new Date().getTime();
    const distance = start;
    const animateScroll = (timestamp) => {
        const currentTime = 'now' in window.performance ? performance.now() : new Date().getTime();
        const timeElapsed = currentTime - startTime;
        const progress = Math.min(timeElapsed / duration, 1);
        const easedProgress = progress < 0.5 ? 4 * progress * progress * progress : (progress - 1) * (2 * progress - 2) * (2 * progress - 2) + 1;
        window.scrollTo(0, Math.floor(start - distance * easedProgress));
        if (timeElapsed < duration) {
            requestAnimationFrame(animateScroll);
        }
    };
    requestAnimationFrame(animateScroll);
}

window.addEventListener('scroll', onScroll);
scrollUpButton.addEventListener('click', scrollToTop);