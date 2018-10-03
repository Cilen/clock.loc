window.noUiSlider.create(slider, {
    start: [data.filter.minPrice, data.filter.maxPrice],
    animate: true,
    connect: true,
    step: 1,
    range: {
        'min': data.filter.minPrice,
        'max': data.filter.maxPrice
    },
    format: {
        to: function ( value ) {
            return parseInt(value, 10);
        },
        from: function ( value ) {
            return parseInt(value, 10);
        }
    }
});

// Передати значення слайдеру в поля input
var filterPriceInput = [minPriceInput, maxPriceInput];
slider.noUiSlider.on('update', function (values, handle) {
    filterPriceInput[handle].value = values[handle];
    minPriceInput.dispatchEvent(new Event('input'));
    maxPriceInput.dispatchEvent(new Event('input'));
});

// Запустити подію change в полі input
slider.noUiSlider.on('change', function (values, handle) {
    minPriceInput.dispatchEvent(new Event('change'));
});

// Встановити мінімальне значення слайдеру із поля input
minPriceInput.addEventListener('change', function () {
    slider.noUiSlider.set([this.value, null]);
});

// Встановити максимальне значення слайдеру із поля input
maxPriceInput.addEventListener('change', function () {
    slider.noUiSlider.set([null, this.value]);
});

