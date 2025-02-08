const navToggle = document.getElementById('nav-toggle');
const contentWrapper = document.querySelector('.content-wrapper');

navToggle.addEventListener('change', () => {
    if (navToggle.checked) {
        contentWrapper.style.marginLeft = `calc(var(--navbar-width-min) + 1rem)`;
    } else {
        contentWrapper.style.marginLeft = `calc(var(--navbar-width) + 1rem)`;
    }
});