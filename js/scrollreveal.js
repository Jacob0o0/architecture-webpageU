
document.addEventListener("DOMContentLoaded", function(event) {
    // Tu código JavaScript para el scroll reveal
    // Seleccionar todos los elementos con la clase "reveal"
    const elementos = document.querySelectorAll('.container-section.shadow');

    elementos.forEach(elemento => {
        gsap.from(elemento, {
            opacity: 0,
            y: 50,
            duration: 1,
            scrollTrigger: {
            trigger: elemento,
            start: 'top 60%',
            }
        });
    });
});
