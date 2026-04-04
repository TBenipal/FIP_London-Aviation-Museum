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

            const activeThumbnail = document.querySelector('.ba-img.active');
            if (activeThumbnail) {
                loadContent(activeThumbnail);
            }
        });
    });

    function loadContent(thumbnail) {
        const modelViewer = document.querySelector('#ba-model model-viewer');
        const textContainer = document.querySelector('#ba-text');
        const headings = document.querySelectorAll('.ba-heading');

        const newModelSrc = thumbnail.dataset.model;
        const modelId = thumbnail.dataset.id;
        const title = thumbnail.dataset.title;

        if (title) {
            headings.forEach(h => h.textContent = title);
        }

        const activeTab = document.querySelector('.ba-tab.active');
        const tabType = activeTab ? activeTab.dataset.content : "mechanic";


        const templateId = modelId === "1" 
            ? tabType 
            : `${tabType}-${modelId}`;

        if (newModelSrc) {
            modelViewer.src = newModelSrc;
        }

        textContainer.innerHTML = "";
        const template = document.querySelector(`#${templateId}`);

        if (template) {
            textContainer.appendChild(template.content.cloneNode(true));
        } else {
            textContainer.innerHTML = `<p>No content found.</p>`;
        }
    }
}