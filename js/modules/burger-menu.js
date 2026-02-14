export function burgermenu() {
    const menu = document.querySelector("#sidebar");
    const hamburger = document.querySelector(".hamburger");

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        menu.classList.toggle('active');
    });
}