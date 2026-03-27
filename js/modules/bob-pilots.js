export function pilot() {
    const items = document.querySelectorAll('.preview-row .item');
    const activeDisplay = document.querySelector('.active-display');
    let lastClone = null;

    function setActive(index) {
        const clicked = items[index];

        // Remove active class
        items.forEach(i => i.classList.remove('active'));
        clicked.classList.add('active');

        // Remove old clone
        if (lastClone) lastClone.remove();

        const displayRect = activeDisplay.getBoundingClientRect();
        const thumbRect = clicked.getBoundingClientRect();

        const grow = document.createElement('div');
        grow.classList.add('grow-clone');

        // Initial size & position
        grow.style.top = thumbRect.top - displayRect.top + 'px';
        grow.style.left = thumbRect.left - displayRect.left + 'px';
        grow.style.width = thumbRect.width + 'px';
        grow.style.height = thumbRect.height + 'px';

        // Set background from <img> inside the thumbnail
        const img = clicked.querySelector('img');
        if (img) grow.style.backgroundImage = `url(${img.src})`;

        activeDisplay.appendChild(grow);

        // Trigger transition
        grow.getBoundingClientRect();
        grow.classList.add('grow');

        // Clone content
        const content = clicked.querySelector('.content');
        if (content) {
            const clonedContent = content.cloneNode(true);
            clonedContent.classList.add('clone-content');
            clonedContent.style.display = 'block';
            grow.appendChild(clonedContent);
        }

        lastClone = grow;
    }

    items.forEach((item, i) => item.addEventListener('click', () => setActive(i)));

    // Initialize first item
    setActive(0);
}