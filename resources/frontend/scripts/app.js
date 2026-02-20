import '../styles/app.scss';
import * as bootstrap from './libs/bootstrap.js';
import { Datepicker } from './libs/datepicker.js';
import { tns as Slider } from 'tiny-slider';
import { ajax } from './core/ajax.js';
import { fadeIn, fadeOut } from './core/fade.js';
import { initScrollUp } from './components/scroll-up.js';

export const app = {
    bootstrap,
    Slider,
    Datepicker,
    ajax,
    fadeIn,
    fadeOut,
    initScrollUp
};

app.initScrollUp();
