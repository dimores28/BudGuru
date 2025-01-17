// Підключення з node_modules
import * as noUiSlider from 'nouislider';
import wNumb from 'wnumb';


// Підключення стилів з scss/base/forms/range.scss 
// у файлі scss/forms/forms.scss

// Підключення стилів з node_modules
import 'nouislider/dist/nouislider.css';

export function rangeInit() {
	const priceSlider = document.querySelector('#range');
	const designPriceSlider = document.querySelector('#design-range');
	const repairPriceSlider = document.querySelector('#repair-range');

	// Функція для створення слайдера з однаковими налаштуваннями
	function createSlider(slider, inputId) {
		if (slider) {
			let textFrom = slider.getAttribute('data-from');
			
			noUiSlider.create(slider, {
				start: 0,
				connect: [true, false],
				range: {
					'min': [0],
					'max': [700]
				},
				step: 1,
				tooltips: wNumb({ decimals: 0, suffix: ' м²' })
			});

			// Перевіряємо наявність input елемента перед встановленням обробника
			const inputElement = document.querySelector(inputId);
			if (inputElement) {
				slider.noUiSlider.on('update', function (values) {
					inputElement.value = values[0];
				});
			}
		}
	}

	// Ініціалізація всіх слайдерів
	if (priceSlider) createSlider(priceSlider, '#range-input');
	if (designPriceSlider) createSlider(designPriceSlider, '#design-range-input');
	if (repairPriceSlider) createSlider(repairPriceSlider, '#repair-range-input');
}

// Викликаємо ініціалізацію після завантаження DOM
document.addEventListener('DOMContentLoaded', rangeInit);
