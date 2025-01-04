class CalculatorManager {
    constructor() {
        this.tabs = document.querySelectorAll('.calculator__tab');
        this.calculators = document.querySelectorAll('.calculator-container');
        this.activeCalculator = 'repair'; // За замовчуванням

        this.initTabs();
    }

    initTabs() {
        this.tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const calculatorType = tab.dataset.calculator;
                this.switchCalculator(calculatorType);
            });
        });
    }

    switchCalculator(type) {
        // Оновлюємо таби
        this.tabs.forEach(tab => {
            tab.classList.toggle('active', tab.dataset.calculator === type);
        });

        // Оновлюємо контейнери калькуляторів
        this.calculators.forEach(calc => {
            calc.classList.toggle('active', calc.dataset.calculator === type);
        });

        this.activeCalculator = type;
    }
}

// Ініціалізація
document.addEventListener('DOMContentLoaded', () => {
    new CalculatorManager();
}); 