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