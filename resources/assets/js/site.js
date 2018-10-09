if (window.location.pathname=='/ru'||window.location.pathname=='/uk'||window.location.pathname=='/ru/shop'||window.location.pathname=='/uk/shop') {
    let filterSlider = document.getElementById('filterSlider');
    window.noUiSlider.create(filterSlider, {
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
    let filterPriceInput = [minPriceInput, maxPriceInput];
    filterSlider.noUiSlider.on('update', function (values, handle) {
        filterPriceInput[handle].value = values[handle];
        minPriceInput.dispatchEvent(new Event('input'));
        maxPriceInput.dispatchEvent(new Event('input'));
    });

    // Запустити подію change в полі input
    filterSlider.noUiSlider.on('change', function (values, handle) {
        minPriceInput.dispatchEvent(new Event('change'));
    });

    // Встановити мінімальне значення слайдеру із поля input
    minPriceInput.addEventListener('change', function () {
        filterSlider.noUiSlider.set([this.value, null]);
    });

    // Встановити максимальне значення слайдеру із поля input
    maxPriceInput.addEventListener('change', function () {
        filterSlider.noUiSlider.set([null, this.value]);
    });
}


window.wait = function () {
    if(this.wait){
        return
    }
    this.wait = true
    setTimeout(() => this.wait = false, 1000);
}


