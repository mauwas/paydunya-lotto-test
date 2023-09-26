
/*
Template Name: Symox - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: product range slider init js
*/


var slider = document.getElementById('priceslider');

noUiSlider.create(slider, {
    start: [250, 800],
    connect: true,
    tooltips: true,
    range: {
        'min': 0,
        'max': 1000
    },
    pips: {mode: 'count', values: 5}
});

