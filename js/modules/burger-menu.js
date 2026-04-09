export function burgermenu() {
    const menu = document.querySelector("#sidebar");
    const hamburger = document.querySelector(".hamburger");

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        menu.classList.toggle('active');
    });

    // DROPDOWN
    const dropdowns = document.querySelectorAll('.dropdown');

    dropdowns.forEach(dropdown => {
        const select = dropdown.querySelector('.select');
        const caret = dropdown.querySelector('.caret');
        const menu = dropdown.querySelector('.menu');

        select.addEventListener('click', () => {
            caret.classList.toggle('caret-rotate');
            menu.classList.toggle('menu-open');
            // select.classList.toggle('active');
        });
    });
}