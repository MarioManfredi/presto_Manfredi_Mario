import './bootstrap';
import 'bootstrap';
import '../css/style.css';
import '../css/masthead.css';
import '../css/errorMessage.css';
import '../css/card.css';
import '../css/pagination.css';
import '@fortawesome/fontawesome-free/css/all.min.css';

// swiper
import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

const swiper = new Swiper('.mySwiper', {
    modules: [Navigation, Pagination],

    pagination: {
        el: '.swiper-pagination',
        type: 'progressbar',
    },

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});