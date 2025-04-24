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

let searchField = document.getElementById('search-field');
let searchButton = document.getElementById('search-button');
let smallCartBlock = document.getElementById('small-cart-block');

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

export async function addToCart(url, productPicture) {
    const csrfToken = document.querySelector('meta[name="csrfToken"]').content;

    try {
        const data = await ajax({
            url: url,
            method: 'PUT',
            data: { quantity: 1 },
            headers: { 'X-CSRF-Token': csrfToken }
        });
        if (productPicture) {
            animateCart(productPicture, smallCartBlock);
        }
        let cartBlockQuantity = smallCartBlock.querySelector('#small-cart-quantity');
        let cartBlockSum = smallCartBlock.querySelector('#small-cart-sum');
        cartBlockQuantity.textContent = data.cart.total.count;
        cartBlockSum.textContent = data.cart.total.sum;
    } catch (e) {
        console.error(e.message);
    }
}

function onSearchButtonClick(e) {
    if (!searchField.value) {
        e.preventDefault();
    }
}

searchButton.addEventListener('click', onSearchButtonClick);