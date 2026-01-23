import './bootstrap';
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.carousel-wrapper').forEach(wrapper => {
        const carousel = new bootstrap.Carousel(wrapper, {
            interval: 4000 // Auto-play enabled by default
        });

        // Pause carousel when cursor enters
        wrapper.addEventListener('mouseenter', () => {
            carousel.pause();
        });

        // Resume carousel when cursor leaves
        wrapper.addEventListener('mouseleave', () => {
            carousel.cycle();
        });
    });
});