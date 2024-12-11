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
