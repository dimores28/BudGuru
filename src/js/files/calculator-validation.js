class CalculatorValidator {
    constructor(formId) {
        this.form = document.getElementById(formId);
        if (!this.form) return; // Перевіряємо чи знайдена форма

        this.formType = this.form.dataset.calculatorType;
        this.steps = this.form.querySelectorAll('.calculator__step');
        this.nextButtons = this.form.querySelectorAll('.calculator__nextstep-btn');
        this.currentStep = 0;


        this.initValidation();
        this.initEventListeners();
        this.initFormSubmit();
    }

    initValidation() {
        this.showStep(this.currentStep);

        this.nextButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                
                e.preventDefault();
                e.stopPropagation(); // Додаємо це
                
                if (this.validateStep(this.currentStep)) {
                    if (this.currentStep < this.steps.length - 1) {
                        this.currentStep++;
                        this.showStep(this.currentStep);
                        this.steps[this.currentStep - 1].classList.remove('_error');
                    }
                } else {
                    this.showError(this.steps[this.currentStep]);
                }
            });
        });
    }

    showStep(index) {
        this.steps.forEach((step, i) => {
            if (i === index) {
                step.classList.add('active');
            } else {
                step.classList.remove('active');
            }
        });
    }

    validateStep(stepIndex) {
        const currentStepElement = this.steps[stepIndex];
        
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
                const rangeInput = currentStepElement.querySelector(`#${this.formType}-range-input`);
                if (!rangeInput || !rangeInput.value || rangeInput.value < 1) {
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
                const name = currentStepElement.querySelector(`#${this.formType}-user-name`);
                const phone = currentStepElement.querySelector(`#${this.formType}-user-phone`);
                
                let isValid = true;
                
                if (!this.isValidName(name.value)) {
                    name.classList.add('_notvalid');
                    isValid = false;
                } else {
                    name.classList.remove('_notvalid');
                }
                
                if (!this.isValidPhone(phone.value)) {
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

    isValidPhone(p) {
        const phoneRe = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/g;
        const digits = p.replace(/\D/g, "");
        return phoneRe.test(digits);
    }

    isValidName(value) {
        return /^[а-яёъыэА-ЯЁЪЫЭіІїЇєЄґҐ\-\s']+$/.test(value);
    }

    showError(stepElement) {
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

    initEventListeners() {
        // Додаємо обробники для радіо кнопок і range для зняття помилок при виборі
        this.steps.forEach(step => {
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
            const rangeInput = step.querySelector(`#${this.formType}-range-input`);
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
    }

    initFormSubmit() {
        this.form.addEventListener('submit', async (e) => {
            e.preventDefault();

            if (this.validateStep(this.steps.length - 1)) {
                this.form.classList.add('_sending');

                try {
                    let formData = new FormData(this.form);
                    formData.append('action', `${this.formType}_calculator_handler`);

                    let response = await fetch(budguruAjax.ajaxurl, {
                        method: 'POST',
                        body: formData
                    });

                    if (response.ok) {
                        const result = await response.json();
                        if (result.success) {
                            this.form.classList.add('success');
                            this.form.reset();
                        } else {
                            console.error('Помилка:', result.data.message);
                            this.showError(this.steps[this.currentStep], result.data.message);
                        }
                    }
                } catch (error) {
                    console.error('Помилка:', error);
                    this.showError(this.steps[this.currentStep], 'Сталася помилка при відправці');
                } finally {
                    this.form.classList.remove('_sending');
                }
            }
        });
    }
}

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

// Ініціалізація
document.addEventListener('DOMContentLoaded', () => {
    const repairCalculator = new CalculatorValidator('repair-calculator-form');
    const designCalculator = new CalculatorValidator('design-calculator-form');
}); 