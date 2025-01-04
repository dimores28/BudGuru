document.addEventListener("DOMContentLoaded", function () { 
    // Збираємо всі секції і кнопки
const steps = document.querySelectorAll('.calculator__step');
const nextButtons = document.querySelectorAll('.calculator__nextstep-btn');

let currentStep = 0;

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

// Функція валідації кроків
function validateStep(stepIndex) {
    const currentStepElement = steps[stepIndex];
    
    switch(stepIndex) {
        case 0: // Перший крок - тип приміщення
            const roomType = currentStepElement.querySelector('input[name="rooms"]:checked');
            if (!roomType) {
                currentStepElement.classList.add('_error');
                return false;
            }
            currentStepElement.classList.remove('_error');
            return true;

        case 1: // Другий крок - площа
            const area = currentStepElement.querySelector('#range-nput').value;
            if (!area || area < 1) {
                currentStepElement.classList.add('_error');
                return false;
            }
            currentStepElement.classList.remove('_error');
            return true;

        case 2: // Третій крок - дизайн
            const design = currentStepElement.querySelector('input[name="desing"]:checked');
            if (!design) {
                currentStepElement.classList.add('_error');
                return false;
            }
            currentStepElement.classList.remove('_error');
            return true;

        case 3: // Четвертий крок - контактні дані
            const name = currentStepElement.querySelector('input[name="user-name"]');
            const phone = currentStepElement.querySelector('input[name="user-phone"]');
            
            let isValid = true;
            
            if (!isValidName(name.value)) {
                name.classList.add('_notvalid');
                isValid = false;
            } else {
                name.classList.remove('_notvalid');
            }
            
            if (!isValidPhone(phone.value)) {
                phone.classList.add('_notvalid');
                isValid = false;
            } else {
                phone.classList.remove('_notvalid');
            }
            
            return isValid;

        default:
            return true;
    }
}

// Функція для показу помилки
function showError(stepElement) {
    // Додаємо анімацію струсу
    stepElement.classList.add('shake');
    setTimeout(() => {
        stepElement.classList.remove('shake');
    }, 500);
    
    // Додаємо текст помилки
    const errorMessage = stepElement.querySelector('.error-message') || 
                        document.createElement('div');
    errorMessage.className = 'error-message';
    errorMessage.textContent = 'Будь ласка, заповніть це поле';
    
    if (!stepElement.querySelector('.error-message')) {
        stepElement.appendChild(errorMessage);
    }
}

// Ініціалізуємо перший крок
showStep(currentStep);

// Додаємо обробник подій для кнопок
nextButtons.forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        
        if (validateStep(currentStep)) {
            if (currentStep < steps.length - 1) {
                currentStep++;
                showStep(currentStep);
                steps[currentStep - 1].classList.remove('_error');
            }
        } else {
            showError(steps[currentStep]);
        }
    });
});

// Додаємо обробники для радіо кнопок і range для зняття помилок при виборі
steps.forEach((step, index) => {
    // Для радіо кнопок
    const radioInputs = step.querySelectorAll('input[type="radio"]');
    radioInputs.forEach(input => {
        input.addEventListener('change', () => {
            step.classList.remove('_error');
            const errorMessage = step.querySelector('.error-message');
            if (errorMessage) {
                errorMessage.remove();
            }
        });
    });

    // Для range input
    const rangeInput = step.querySelector('#range-nput');
    if (rangeInput) {
        rangeInput.addEventListener('input', () => {
            step.classList.remove('_error');
            const errorMessage = step.querySelector('.error-message');
            if (errorMessage) {
                errorMessage.remove();
            }
        });
    }
});

    // Додаємо CSS для анімації
    const style = document.createElement('style');
    style.textContent = `
        .shake {
            animation: shake 0.5s cubic-bezier(.36,.07,.19,.97) both;
        }
        
        .error-message {
            color: #ff0000;
            font-size: 14px;
            margin-top: 10px;
        }

        @keyframes shake {
            10%, 90% { transform: translate3d(-1px, 0, 0); }
            20%, 80% { transform: translate3d(2px, 0, 0); }
            30%, 50%, 70% { transform: translate3d(-4px, 0, 0); }
            40%, 60% { transform: translate3d(4px, 0, 0); }
        }
    `;
    
    document.head.appendChild(style);
});