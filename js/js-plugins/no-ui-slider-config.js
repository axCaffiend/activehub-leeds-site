console.log("no-ui-slider-config running");

const priceMinNumInput = document.getElementById("price-min");
const priceMaxNumInput = document.getElementById("price-max");
const priceRange = document.getElementById('price-range');


noUiSlider.create(priceRange, {
    start: [0, 50],
    step: 1,
    connect: true,
    range: {
        'min': 0,
        'max': 50
    },
    pips: {
        mode: 'count',
        values: 6,
        density: 4
    }
});

priceRange.noUiSlider.on('update', function (values, handle) {

    // Where 'handle' is the index of the handle that caused the event on the slider i.e. value in initialised options 'start:[1, 100]'.
    let value = values[handle];

    if (handle==1) {
        // Second handle
        priceMaxNumInput.value = value;
    } else { 
        // First handle
        priceMinNumInput.value = value;
    }
});

priceMaxNumInput.addEventListener('change', function () {
    priceRange.noUiSlider.set([null, this.value]);
});

priceMinNumInput.addEventListener('change', function () {
    priceRange.noUiSlider.set([this.value, null], true, true);
});