export function bobairplane() {
    const modelViewer = document.querySelector('#ba-model model-viewer');
    const textContainer = document.querySelector('#ba-text');
    const thumbnails = document.querySelectorAll('.ba-img');

    if (thumbnails[0]) {
        loadContent(thumbnails[0]);
    }


    thumbnails.forEach((thumb, index) => {
        thumb.addEventListener('click', () => {
            thumbnails.forEach(t => t.classList.remove('active'));
            thumb.classList.add('active');
            loadContent(thumb);
        });
    });

    const tabs = document.querySelectorAll('.ba-tab');
    tabs.forEach(tab => {
        tab.addEventListener("click", function () {
            tabs.forEach(t => t.classList.remove("active"));
            this.classList.add("active");
            textContainer.innerHTML = "";
            const template = document.querySelector(`#${this.dataset.content}`);
            if (template) {
                textContainer.appendChild(template.content.cloneNode(true));
            }
        });
    });
}

function loadContent(thumbnail) {
    const modelViewer = document.querySelector('#ba-model model-viewer');
    const textContainer = document.querySelector('#ba-text');
    const newModelSrc = thumbnail.dataset.model;
    const templateId = thumbnail.dataset.template || "name";

    if (newModelSrc) {
        modelViewer.src = newModelSrc;

        modelViewer.style.opacity = "0.6";
        modelViewer.addEventListener('load', () => {
            modelViewer.style.opacity = "1";
        }, { once: true });

        modelViewer.addEventListener('error', (e) => {
            modelViewer.style.opacity = "1";
        }, { once: true });
    }
    textContainer.innerHTML = "";
    const template = document.querySelector(`#${templateId}`);
    if (template) {
        textContainer.appendChild(template.content.cloneNode(true));
    } else {
        textContainer.innerHTML = `<p>Template "${templateId}" not found.</p>`;
    }
}