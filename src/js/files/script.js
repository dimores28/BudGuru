// Підключення функціоналу "Чертоги Фрілансера"
import { isMobile } from "./functions.js";
// Підключення списку активних модулів
import { flsModules } from "./modules.js";

document.addEventListener("DOMContentLoaded", function () {
    // Збираємо всі секції і кнопки
    const steps = document.querySelectorAll('.calculator__step');
    const nextButtons = document.querySelectorAll('.calculator__nextstep-btn');

    let currentStep = 0; // Індекс активної секції

    // Функція для оновлення видимості секцій
    function showStep(index) {
        steps.forEach((step, i) => {
            if (i === index) {
                step.classList.add('active');
            } else {
                step.classList.remove('active');
            }
        });
    }

    // Ініціалізуємо перший крок
    showStep(currentStep);

    // Додаємо обробник подій для кнопок
    nextButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            if (currentStep < steps.length - 1) {
                currentStep++;
                showStep(currentStep);
            }
        });
    });


    const video = document.getElementById("videoPlayer");
    const playButton = document.getElementById("btn-play");

    // Функція для запуску/паузи відео
    const togglePlay = () => {
        if (video.paused) {
            video.play(); // Запуск відео
            playButton.style.display = "none"; // Приховати кнопку
        } else {
            video.pause(); // Пауза відео
        }
    };

    // Обробник кліку на кнопку Play
    playButton.addEventListener("click", togglePlay);

    // Показати кнопку, коли відео зупинено або на паузі
    video.addEventListener("pause", () => {
        playButton.style.display = "block";
    });

    // Додатково: Обробка завершення відео (повернення кнопки)
    video.addEventListener("ended", () => {
        playButton.style.display = "block";
    });

});


    // Отримуємо елементи
    const tabs = document.querySelectorAll(".calculator__tab");
    const headings = document.querySelectorAll(".calculator__heading");

    // Додаємо обробник подій для кожної кнопки-таб
    tabs?.forEach((tab, index) => {
        tab.addEventListener("click", function () {
            // Прибираємо клас active у всіх табах
            tabs.forEach((t) => t.classList.remove("active"));
            // Додаємо клас active до поточного табу
            tab.classList.add("active");

            // Перемикаємо видимість заголовків
            headings.forEach((heading, i) => {
                if (i === index) {
                    heading.style.display = "block"; // Показати вибраний заголовок
                } else {
                    heading.style.display = "none"; // Сховати інші заголовки
                }
            });
        });
    });

    // Ініціалізуємо стан при завантаженні сторінки
    headings?.forEach((heading, i) => {
        if (i !== 0) heading.style.display = "none"; // Сховати всі заголовки, крім першого
    });

    const customTabs = document.querySelectorAll(".custom-tab__tab");
    const customTabsContent = document.querySelectorAll(".custom-tab__content");

    customTabs?.forEach((tab, index) => {
        tab.addEventListener("click", function () {
            customTabs.forEach((t) => t.classList.remove("active"));
            tab.classList.add("active");

            customTabsContent.forEach((element, i) => {
                if (i === index) {
                    element.style.display = "block"; 
                } else {
                    element.style.display = "none";
                }
            });
        });
    });

    customTabsContent?.forEach((element, i) => {
        if (i !== 0) element.style.display = "none"; // Сховати всі заголовки, крім першого
    });

    const scrollTopButton = document.getElementById("scroll-top");

    scrollTopButton?.addEventListener("click", function (e) {
        e.preventDefault();

        window.scrollTo({
            top: 0,         
            behavior: "smooth"
        });
    });