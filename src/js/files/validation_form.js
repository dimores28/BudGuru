// Підключення функціоналу "Чертоги Фрілансера"
import { flsModules } from './modules.js';

// Функції валідації
function isValidPhone(p) {
    const phoneRe = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/g;
    const digits = p.replace(/\D/g, "");
    return phoneRe.test(digits);
}

function isValidName(value) {
    return /^[а-яёъыэА-ЯЁЪЫЭіІїЇєЄґҐ\-\s']+$/.test(value);
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

// Ініціалізуємо форму при завантаженні сторінки
document.addEventListener('DOMContentLoaded', function() {
    initConsultationForm();
    initCooperationForm();
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


