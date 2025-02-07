// Підключення функціоналу "Чертоги Фрілансера"
import { flsModules } from './modules.js';

// Функції валідації
function isValidName(name) {
    return name.length >= 2 && !/\d/.test(name);
}

function isValidPhone(phone) {
    const cleanPhone = phone.replace(/[\s()-]/g, '');
    return cleanPhone.length >= 10 && /^\d+$/.test(cleanPhone);
}

function isValidReview(review) {
    return review.trim().length >= 6;
}

function isValidRating() {
    const selectedRating = document.querySelector('input[name="rating"]:checked');
    return selectedRating !== null;
}

// Функція ініціалізації форми
function initConsultationForm() {
    // Шукаємо всі форми на сторінці
    const consultationForms = document.querySelectorAll('.consultation__form');
    
    if (!consultationForms.length) return;

    consultationForms.forEach(consultationForm => {
        // Знаходимо поля в межах конкретної форми
        const userName = consultationForm.querySelector('#user-name');
        const userPhone = consultationForm.querySelector('#input-phone');
        const userQuestion = consultationForm.querySelector('#input-question');

        // Валідація при введенні
        userName?.addEventListener('input', function() {
            if (!isValidName(userName.value)) {
                userName.classList.add('_notvalid');
            } else {
                userName.classList.remove('_notvalid');
            }
        });

        userPhone?.addEventListener('input', function() {
            if (!isValidPhone(userPhone.value)) {
                userPhone.classList.add('_notvalid');
            } else {
                userPhone.classList.remove('_notvalid');
            }
        });

        // Обробка відправки форми
        consultationForm.addEventListener('submit', async function(e) {
            e.preventDefault();

            // Перевіряємо валідність
            let isValid = 
                isValidName(userName.value) && 
                isValidPhone(userPhone.value) && 
                userQuestion.value.trim() !== '';

            if (isValid) {
                consultationForm.classList.add('_sending');

                try {
                    let formData = new FormData(consultationForm);
                    formData.append('action', 'consultation_form_handler');
                    formData.append('nonce', budguruAjax.nonce);

                    let response = await fetch(budguruAjax.ajaxurl, {
                        method: 'POST',
                        body: formData,
                    });

                    if (response.ok) {
                        const result = await response.json();
                        if (result.success) {
                            consultationForm.classList.add('success');
                            consultationForm.reset();
                        } else {
                            console.error('Помилка обробки форми:', result.data.message);
                        }
                    } else {
                        console.error('Помилка відправки форми. Статус:', response.status);
                    }
                } catch (error) {
                    console.error('Помилка:', error);
                } finally {
                    consultationForm.classList.remove('_sending');
                }
            } else {
                if (!isValidName(userName.value)) userName.classList.add('_notvalid');
                if (!isValidPhone(userPhone.value)) userPhone.classList.add('_notvalid');
                if (userQuestion.value.trim() === '') userQuestion.classList.add('_notvalid');
            }
        });
    });
}

// Функція ініціалізації форми співпраці
function initCooperationForm() {
    const cooperationForm = document.querySelector('#cooperation-form');
    if (!cooperationForm) return;

    const userName = cooperationForm.querySelector('#user-name');
    const userPhone = cooperationForm.querySelector('#input-phone');
    const userQuestion = cooperationForm.querySelector('#input-question');
    const company = cooperationForm.querySelector('#company');
    const siteUrl = cooperationForm.querySelector('#site-url');

    // Валідація при введенні
    userName?.addEventListener('input', function() {
        if (!isValidName(userName.value)) {
            userName.classList.add('_notvalid');
        } else {
            userName.classList.remove('_notvalid');
        }
    });

    userPhone?.addEventListener('input', function() {
        if (!isValidPhone(userPhone.value)) {
            userPhone.classList.add('_notvalid');
        } else {
            userPhone.classList.remove('_notvalid');
        }
    });

    // Обробка відправки форми
    cooperationForm.addEventListener('submit', async function(e) {
        e.preventDefault();

        // Перевіряємо валідність обов'язкових полів
        let isValid = 
            isValidName(userName.value) && 
            isValidPhone(userPhone.value) && 
            company.value.trim() !== '' &&
            userQuestion.value.trim() !== '';

        if (isValid) {
            cooperationForm.classList.add('_sending');

            try {
                let formData = new FormData(cooperationForm);
                formData.append('action', 'cooperation_form_handler');
                formData.append('nonce', budguruAjax.nonce);

                let response = await fetch(budguruAjax.ajaxurl, {
                    method: 'POST',
                    body: formData,
                });

                if (response.ok) {
                    const result = await response.json();
                    if (result.success) {
                        cooperationForm.classList.add('success');
                        cooperationForm.reset();
                    } else {
                        console.error('Помилка обробки форми:', result.data.message);
                    }
                } else {
                    console.error('Помилка відправки форми. Статус:', response.status);
                }
            } catch (error) {
                console.error('Помилка:', error);
            } finally {
                cooperationForm.classList.remove('_sending');
            }
        } else {
            // Підсвічуємо невалідні поля
            if (!isValidName(userName.value)) userName.classList.add('_notvalid');
            if (!isValidPhone(userPhone.value)) userPhone.classList.add('_notvalid');
            if (company.value.trim() === '') company.classList.add('_notvalid');
            if (userQuestion.value.trim() === '') userQuestion.classList.add('_notvalid');
        }
    });
}

// Додаємо нову функцію для валідації форми відгуків
function initFeedbackForm() {
    const feedbackForm = document.querySelector('#feedback-form');
    if (!feedbackForm) return;

    const nameField = feedbackForm.querySelector('#name');
    const phoneField = feedbackForm.querySelector('#phone');
    const reviewField = feedbackForm.querySelector('#review');
    const ratingWrapper = feedbackForm.querySelector('[data-rating="set"]');
    const ratingInput = feedbackForm.querySelector('input[name="rating"]');
    const fileInput = feedbackForm.querySelector('#photo');

    // Додаємо обробник зміни рейтингу
    ratingWrapper?.addEventListener('change', function() {
        const rating = ratingInput.value;
        this.classList.toggle('_notvalid', !rating || rating === '0');
    });

    // Валідація при введенні
    nameField?.addEventListener('input', function() {
        this.classList.toggle('_notvalid', !isValidName(this.value));
    });

    phoneField?.addEventListener('input', function() {
        this.classList.toggle('_notvalid', !isValidPhone(this.value));
    });

    // Функція перевірки рейтингу
    const isValidRating = () => {
        const rating = ratingInput.value;
        return rating && rating !== '0';
    };

    // Функція скидання форми
    const resetForm = () => {
        feedbackForm.reset();
        nameField?.classList.remove('_notvalid');
        phoneField?.classList.remove('_notvalid');
        reviewField?.classList.remove('_notvalid');
        ratingWrapper?.classList.remove('_notvalid');
        if (ratingInput) ratingInput.value = '0';
    };

    // Обробка відправки форми
    feedbackForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        let isValid = true;

        // Перевірка полів
        if (!isValidName(nameField.value)) {
            nameField.classList.add('_notvalid');
            isValid = false;
        }
        if (!isValidPhone(phoneField.value)) {
            phoneField.classList.add('_notvalid');
            isValid = false;
        }
        if (!isValidReview(reviewField.value)) {
            reviewField.classList.add('_notvalid');
            isValid = false;
        }
        if (!isValidRating()) {
            ratingWrapper.classList.add('_notvalid');
            isValid = false;
        }

        if (isValid) {
            feedbackForm.classList.add('_sending');
            
            try {
                const formData = new FormData(feedbackForm);
                formData.append('action', 'feedback_form_handler');
                formData.append('nonce', budguruAjax.nonce);
                
                if (fileInput.files[0]) {
                    formData.append('photo', fileInput.files[0]);
                }

                const response = await fetch(budguruAjax.ajaxurl, {
                    method: 'POST',
                    body: formData,
                });

                const result = await response.json();

                if (result.success) {
                    feedbackForm.querySelector('.feedback-form__message-success').hidden = false;
                    resetForm(); // Використовуємо нову функцію для скидання форми
                    setTimeout(() => {
                        feedbackForm.querySelector('.feedback-form__message-success').hidden = true;
                        flsModules.popup.close();
                    }, 3000);
                } else {
                    feedbackForm.querySelector('.feedback-form__message-error').hidden = false;
                    setTimeout(() => {
                        feedbackForm.querySelector('.feedback-form__message-error').hidden = true;
                    }, 3000);
                }
            } catch (error) {
                console.error('Помилка:', error);
                feedbackForm.querySelector('.feedback-form__message-error').hidden = false;
            } finally {
                feedbackForm.classList.remove('_sending');
            }
        }
    });
}

// Ініціалізуємо форму при завантаженні сторінки
document.addEventListener('DOMContentLoaded', function() {
    initConsultationForm();
    initCooperationForm();
    initFeedbackForm();
});

// Обробник кліку по кнопці відкриття попапу
document.querySelector('.sticker__btn')?.addEventListener('click', function () {
    flsModules.popup.open('#popup');
});

// Валідація форми калькулятора
const calculatorForm = document.querySelector('#calculator-form');
const calculatorName = calculatorForm?.querySelector('input[name="user-name"]');
const calculatorPhone = calculatorForm?.querySelector('input[name="user-phone"]');
const calculatorQuestion = calculatorForm?.querySelector('textarea[name="user-question"]');

// Обробка відправки форми
calculatorForm?.addEventListener('submit', async function(e) {
    e.preventDefault();

    // Збираємо всі дані з кроків
    const roomType = calculatorForm.querySelector('input[name="rooms"]:checked')?.id || '';
    const area = calculatorForm.querySelector('input[name="area"]')?.value || '';
    const designNeeded = calculatorForm.querySelector('input[name="desing"]:checked')?.id || '';
    
    let isValid = 
        roomType && 
        area && 
        designNeeded && 
        isValidName(calculatorName.value) && 
        isValidPhone(calculatorPhone.value);

    if (isValid) {
        calculatorForm.classList.add('_sending');

        try {
            let formData = new FormData(calculatorForm);
            formData.append('action', 'calculator_form_handler');
            formData.append('room_type', roomType);
            formData.append('area', area);
            formData.append('design_needed', designNeeded);

            let response = await fetch(budguruAjax.ajaxurl, {
                method: 'POST',
                body: formData
            });

            if (response.ok) {
                const result = await response.json();
                if (result.success) {
                    calculatorForm.classList.add('success');
                    calculatorForm.reset();
                } else {
                    console.error('Помилка:', result.data.message);
                }
            }
        } catch (error) {
            console.error('Помилка:', error);
        } finally {
            calculatorForm.classList.remove('_sending');
        }
    } else {
        // Підсвічуємо невалідні поля
        if (!roomType) {
            // Додати клас помилки для радіо кнопок
            calculatorForm.querySelector('.calculator__step-1').classList.add('_error');
        }
        if (!area) {
            calculatorForm.querySelector('.calculator__step-2').classList.add('_error');
        }
        if (!designNeeded) {
            calculatorForm.querySelector('.calculator__step-3').classList.add('_error');
        }
        if (!isValidName(calculatorName.value)) calculatorName.classList.add('_notvalid');
        if (!isValidPhone(calculatorPhone.value)) calculatorPhone.classList.add('_notvalid');
    }
});


