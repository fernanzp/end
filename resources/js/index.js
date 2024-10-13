// js del index
const slides = document.querySelectorAll('.content-slide');
let currentIndex = 0;

function showSlide(index) {
    slides.forEach((slide, i) => {
        if (i === index * 2 || i === index * 2 + 1) {
            slide.classList.remove('hidden');
        } else {
            slide.classList.add('hidden');
        }
    });
}

document.getElementById('next').addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % (slides.length / 2);
    showSlide(currentIndex);
});

document.getElementById('prev').addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + slides.length / 2) % (slides.length / 2);
    showSlide(currentIndex);
});

// Mostrar el primer slide inicialmente
showSlide(0);

var perfilBtn = document.getElementById('perfilBtn');
var perfilContent = document.getElementById('perfilContent');

// Toggle para mostrar/ocultar el contenido de perfil
perfilBtn.addEventListener('click', function () {
    perfilContent.classList.toggle('hidden');
});

// Ocultar el contenido de perfil si se hace clic fuera del área
window.addEventListener('click', function (e) {
    if (!perfilBtn.contains(e.target) && !perfilContent.contains(e.target)) {
        perfilContent.classList.add('hidden');
    }
});

// js de donations
var perfilBtn = document.getElementById('perfilBtn');
var perfilContent = document.getElementById('perfilContent');

// Toggle para mostrar/ocultar el contenido de perfil
perfilBtn.addEventListener('click', function () {
    perfilContent.classList.toggle('hidden');
});

// Ocultar el contenido de perfil si se hace clic fuera del área
window.addEventListener('click', function (e) {
    if (!perfilBtn.contains(e.target) && !perfilContent.contains(e.target)) {
        perfilContent.classList.add('hidden');
    }
});