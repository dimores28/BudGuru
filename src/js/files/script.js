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
});
