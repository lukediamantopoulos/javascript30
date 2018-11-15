'use strict';

// Basic Functions
//-----------------------------------------------------------

function gE(id) {
  return document.getElementById(id);
}
function gCA(cl) {
  return document.querySelectorAll(classes);
}
function gCA(cl) {
  return document.querySelectorAll(classes);
}

//-----------------------------------------------------------
// Find height of Element
//-----------------------------------------------------------

var elHeight;

function getHeight(element) {
  var el = gE(element);
  return elHeight = el.offsetHeight;
}

//-----------------------------------------------------------
// Lesson Number
//-----------------------------------------------------------

var days = document.getElementsByClassName('day');
var classes = [].slice.call(days);

for (var i = 0; i < classes.length; i++) {
  var classInt = classes[i];
  var classNumber = classInt.childNodes[1].childNodes[1].childNodes[1];
  classNumber.innerHTML = i + 1;
}

//-----------------------------------------------------------
// Nav Size on scroll
//-----------------------------------------------------------

var nav = gE('nav');
var body = document.querySelector('body');
var newHeight;

function checkNav() {
  var scrollDist = window.scrollY;
  if (scrollDist > 0) {
    nav.classList.add('active');
  } else if (scrollDist === 0) {
    nav.classList.remove('active');
  }
}

window.addEventListener('scroll', checkNav);

//-----------------------------------------------------------
// Change color on 'color'
//-----------------------------------------------------------

var pressed = [];
var code = 'color'; // Colors will change on 
var colors = ['#FF7767', '#ebda4e', '#e1f7d5', '#8DC5D3', '#F6DDA2', '#A992C9', '#949391', '#BEDECD'];

function randomColor(oldColor) {
  var newColor = colors[Math.floor(Math.random() * colors.length)];

  if (newColor === oldColor) {
    randomColor(oldColor); // Run function again
  } else {
    return newColor;
  }
}

window.addEventListener('keyup', function (e) {

  // Check if color is the same
  var currentColor = getComputedStyle(document.body).getPropertyValue('--c_accent');
  var color = randomColor(currentColor);

  pressed.push(e.key);
  pressed.splice(-code.length - 1, pressed.length - code.length); // Removes a number each time
  if (pressed.join('').includes(code)) {
    document.documentElement.style.setProperty('--c_accent', color);
  }
});

//-----------------------------------------------------------
// Animate Day background
//-----------------------------------------------------------

function elTransition(element, direction, state) {

  var slider = element.querySelector('#day-bg');
  var startPoint = void 0;
  var endPoint = void 0;

  if (state === 'enter') {
    endPoint = 'translate(0%, 0%)';

    switch (direction) {
      case 'top':
        startPoint = 'translate(0%, -100%)';
        break;

      case 'bottom':
        startPoint = 'translate(0%, 100%)';
        break;

      case 'left':
        startPoint = 'translate(100%, 0%)';
        break;

      case 'right':
        startPoint = 'translate(-100%, 0%)';
        break;
    }
  }

  if (state === 'exit') {
    startPoint = 'translate(0%, -0%)';

    switch (direction) {
      case 'top':
        endPoint = 'translate(0%, -100%)';
        break;

      case 'bottom':
        endPoint = 'translate(0%, 100%)';
        break;

      case 'left':
        endPoint = 'translate(100%, 0%)';
        break;

      case 'right':
        endPoint = 'translate(-100%, 0%)';
        break;
    }
  }

  console.groupCollapsed('Animation');
  console.log('element' + element);
  console.log('direction' + direction);
  console.log('state' + state);
  console.log('Start Point ' + startPoint);
  console.log('End Point ' + endPoint);
  console.groupEnd();

  // Animation
  slider.style.transition = 'none';
  slider.style.transform = startPoint;
  setTimeout(function () {
    slider.style.transition = '.4s transform ease-in-out';
    slider.style.transform = endPoint;
  }, 50);
}

var side = void 0;

classes.forEach(function (day) {

  day.addEventListener('mouseenter', function (e) {

    if (e.offsetX <= 20) {
      side = 'right';
    } else if (e.offsetY <= 20) {
      side = 'top';
    } else if (e.offsetX >= e.target.offsetWidth - 20) {
      side = 'left';
    } else if (e.offsetY >= e.target.offsetHeight - 20) {
      side = 'bottom';
    }

    // elTransition( this, side, 'enter');
  });

  day.addEventListener('mouseleave', function (e) {

    if (e.offsetX <= 20) {
      side = 'right';
    } else if (e.offsetY <= 20) {
      side = 'top';
    } else if (e.offsetX >= e.target.offsetWidth - 20) {
      side = 'left';
    } else if (e.offsetY >= e.target.offsetHeight - 20) {
      side = 'bottom';
    }

    // elTransition( this, side, 'exit');
  });
});