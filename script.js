// script.js - Funciones interactivas

// Menú móvil
function toggleMenu() {
    document.querySelector('nav ul').classList.toggle('show');
}

// Cerrar menú al hacer click en un enlace
document.querySelectorAll('nav a').forEach(link => {
    link.addEventListener('click', () => {
        document.querySelector('nav ul').classList.remove('show');
    });
});

// Smooth scroll para los enlaces internos
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Botón de WhatsApp con mensaje personalizado
document.querySelector('.whatsapp-float').addEventListener('click', function(e) {
    const mensaje = "Hola JServicios, necesito información sobre...";
    const url = `https://wa.me/1159085736?text=${encodeURIComponent(mensaje)}`;
    this.href = url;
});
