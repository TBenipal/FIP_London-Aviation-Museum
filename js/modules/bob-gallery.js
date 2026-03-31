export function bobgallery() {

    const mainPicture = document.querySelector('#bg-main picture');
    const thumbnails = document.querySelectorAll('#bg-content .bg-img');

    thumbnails.forEach((thumb, index) => {
        thumb.addEventListener('click', () => {
            thumbnails.forEach(t => t.classList.remove('active'));
            thumb.classList.add('active');
            const thumbPicture = thumb.querySelector('picture');

            if (thumbPicture) {
                const clonedPicture = thumbPicture.cloneNode(true);
                mainPicture.innerHTML = '';
                mainPicture.appendChild(clonedPicture);
            }
        });
    });

    if (thumbnails[0]) {
        thumbnails[0].classList.add('active');
    }
}