export function bor() {
    const API = 'includes/bor.php';
    let allPilots = [];

    async function loadPilots() {
        const res = await fetch(API);
        allPilots = await res.json();
        renderPilots(allPilots);
    }

    const searchInput = document.querySelector('#pilot-search-input');
    searchInput.addEventListener('input', handleSearch);

    function handleSearch() {
        const query = searchInput.value.toLowerCase().trim();
        if (query === '') {
            renderPilots(allPilots);
            return;
        }
        const filtered = allPilots.filter(p => p.last_name.toLowerCase().includes(query));
        renderPilots(filtered);
    }

    function renderPilots(pilots) {
        const grid = document.querySelector('#pilot-grid');

        if (!pilots.length) {
            grid.innerHTML = '<p style="opacity:0.5;">No pilots found.</p>';
            return;
        }

        grid.innerHTML = pilots.map(p => `
            <a href="bor-profile.php?id=${p.id}" class="pilot-card">
                <div class="pilot-card-img">
                    ${p.photo_path
                        ? `<img src="${esc(p.photo_path)}" alt="${esc(p.last_name)}" loading="lazy">`
                        : `<div class="pilot-placeholder">✦</div>`}
                </div>
                <div class="pilot-card-body">
                    <p class="pilot-name">${esc(p.last_name)}${p.initials ? ', ' + esc(p.initials) : ''}</p>
                    <p class="pilot-status">${esc(p.in_book || '')}</p>
                </div>
            </a>
        `).join('');
    }

    function esc(s) {
        return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    }

    loadPilots();
}