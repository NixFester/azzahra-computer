import './bootstrap';
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.carousel-wrapper').forEach(wrapper => {
        const controls = wrapper.querySelectorAll('.carousel-control-prev, .carousel-control-next');

        wrapper.addEventListener('mouseenter', () => {
            controls.forEach(btn => btn.style.visibility = 'visible');
        });

        wrapper.addEventListener('mouseleave', () => {
            controls.forEach(btn => btn.style.visibility = 'hidden');
        });
    });
});