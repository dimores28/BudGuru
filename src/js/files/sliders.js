/*
Документація по роботі у шаблоні: 
Документація слайдера: https://swiperjs.com/
Сніппет(HTML): swiper
*/

// Підключаємо слайдер Swiper з node_modules
// При необхідності підключаємо додаткові модулі слайдера, вказуючи їх у {} через кому
// Приклад: { Navigation, Autoplay }
import Swiper from 'swiper';
import { Navigation, Grid, Pagination } from 'swiper/modules';
/*
Основні модулі слайдера:
Navigation, Pagination, Autoplay, 
EffectFade, Lazy, Manipulation
Детальніше дивись https://swiperjs.com/
*/

// Стилі Swiper
// Базові стилі
import '../../scss/base/swiper.scss';
// Повний набір стилів з scss/libs/swiper.scss
import '../../scss/libs/swiper.scss';
// Повний набір стилів з node_modules
// import 'swiper/css';

// Ініціалізація слайдерів
function initSliders() {
   // Список слайдерів

   if (document.querySelector('.team-swiper')) {
      // Створюємо слайдер
      new Swiper('.team-swiper', {
         modules: [Navigation, Grid],
         slidesPerView: 2,
         grid: {
            rows: 2,
            fill: 'row'
         },
         spaceBetween: 8,
         navigation: {
            prevEl: '.our-team__prev',
            nextEl: '.our-team__next'
         },

         // Брейкпоінти
         breakpoints: {
            768: {
               slidesPerView: 2,
               spaceBetween: 16,
               grid: {
                  rows: 2,
                  fill: 'row'
               }
            },
            992: {
               slidesPerView: 3,
               spaceBetween: 30,
               grid: {
                  rows: 2,
                  fill: 'row'
               }
            }
         },

         // Події
         on: {}
      });
   }

   if (document.querySelector('.reviews__slider')) {
      new Swiper('.reviews__slider', {
         modules: [Navigation, Grid, Pagination],
         slidesPerView: 1,
         spaceBetween: 20,
         navigation: {
            prevEl: '.reviews__prev',
            nextEl: '.reviews__next'
         },
         pagination: {
            el: '.reviews__pagination',
            clickable: true, 
          },

         // Брейкпоінти
         breakpoints: {
            768: {
            	slidesPerView: 2,
            	spaceBetween: 20,
            },
            920: {
            	slidesPerView: 3,
            	spaceBetween: 30,
            },
         },

         // Події
         on: {}
      });
   }

   if (document.querySelector('.certificates__slider')) {
      new Swiper('.certificates__slider', {
         modules: [Navigation, Grid, Pagination],
         slidesPerView: 1,
         spaceBetween: 20,
         navigation: {
            prevEl: '.certificates__prev',
            nextEl: '.certificates__next'
         },
         // pagination: {
         //    el: '.reviews__pagination',
         //    clickable: true, 
         //  },

         // Брейкпоінти
         breakpoints: {
            768: {
            	slidesPerView: 2,
            	spaceBetween: 20,
            },
            920: {
            	slidesPerView: 3,
            	spaceBetween: 30,
            },
         },

         // Події
         on: {}
      });
   }
}
// Скролл на базі слайдера (за класом swiper scroll для оболонки слайдера)
function initSlidersScroll() {
   let sliderScrollItems = document.querySelectorAll('.swiper_scroll');
   if (sliderScrollItems.length > 0) {
      for (let index = 0; index < sliderScrollItems.length; index++) {
         const sliderScrollItem = sliderScrollItems[index];
         const sliderScrollBar =
            sliderScrollItem.querySelector('.swiper-scrollbar');
         const sliderScroll = new Swiper(sliderScrollItem, {
            observer: true,
            observeParents: true,
            direction: 'vertical',
            slidesPerView: 'auto',
            freeMode: {
               enabled: true
            },
            scrollbar: {
               el: sliderScrollBar,
               draggable: true,
               snapOnRelease: false
            },
            mousewheel: {
               releaseOnEdges: true
            }
         });
         sliderScroll.scrollbar.updateSize();
      }
   }
}

window.addEventListener('load', function (e) {
   // Запуск ініціалізації слайдерів
   initSliders();
   console.log('init slider');
   // Запуск ініціалізації скролла на базі слайдера (за класом swiper_scroll)
   //initSlidersScroll();
});
