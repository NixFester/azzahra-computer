import './bootstrap';
document.addEventListener('DOMContentLoaded', function () {
    const wrapper = document.querySelector('.carousel-wrapper');
    const controls = wrapper.querySelectorAll('.carousel-control-prev, .carousel-control-next');
    console.log("lol");

    wrapper.addEventListener('mouseenter', () => {
        controls.forEach(btn => btn.style.visibility = 'visible');
    });

    wrapper.addEventListener('mouseleave', () => {
        controls.forEach(btn => btn.style.visibility = 'hidden');
    });
});