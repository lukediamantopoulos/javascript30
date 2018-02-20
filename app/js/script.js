'use strict';

function gE(e) {
  document.getElementById(e);
}
function gC(e) {
  document.querySelectorAll(e);
}

var slideElements = gC('.spacer');
var element = gE('element');

function checkSlide(e) {
  slideElements.forEach(function (sliderImage) {
    // half way through the image
    var slideInAt = window.scrollY + window.innerHeight - sliderImage.height / 4;
    // bottom of the image
    var imageBottom = sliderImage.offsetTop + sliderImage.height;
    var isHalfShown = slideInAt > sliderImage.offsetTop;
    var isNotScrolledPast = window.scrollY < imageBottom;
    if (isHalfShown && isNotScrolledPast) {
      sliderImage.classList.add('active');
    } else {
      sliderImage.classList.remove('active');
    }
  });
}
console.log('hi');

function print() {
  console.log('hi');
}

window.addEventListener('click', print);