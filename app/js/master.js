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