<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: ../includes/admin/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Social Posts — Admin</title>
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/grid.css" rel="stylesheet">
    <style>
        #admin-social { max-width: 1000px; margin: 3rem auto; padding: 0 1.5rem; }
        .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; }
        .btn { padding: 0.5rem 1.2rem; border-radius: 4px; font-size: 0.9rem; cursor: pointer; border: none; }
        .btn-primary { background: var(--color-accent, #c8a96e); color: #000; }
        .btn-danger  { background: #8b0000; color: #fff; }
        .btn-sm      { padding: 0.3rem 0.8rem; font-size: 0.8rem; }
        .posts-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 1.2rem; }
        .post-card { background: var(--color-surface, #1a1a1a); border: 1px solid var(--color-border, #333); border-radius: 8px; overflow: hidden; }
        .post-card img, .post-card video { width: 100%; height: 160px; object-fit: cover; display: block; }
        .post-card-body { padding: 0.8rem; }
        .post-platform { font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.08em; opacity: 0.6; }
        .post-caption { font-size: 0.85rem; margin: 0.4rem 0; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical; }
        .post-actions { display: flex; gap: 0.5rem; margin-top: 0.75rem; }
        .badge { display: inline-block; padding: 0.15rem 0.5rem; border-radius: 4px; font-size: 0.7rem; }
        .badge-published { background: #1a4a1a; color: #6fcf6f; }
        .badge-draft     { background: #3a3a1a; color: #cfcf6f; }

        /* Upload modal */
        .modal-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.7); z-index: 100; align-items: center; justify-content: center; }
        .modal-overlay.active { display: flex; }
        .modal { background: var(--color-bg, #111); border: 1px solid var(--color-border, #333); border-radius: 8px; padding: 2rem; width: 100%; max-width: 560px; max-height: 90vh; overflow-y: auto; }
        .modal h2 { margin-top: 0; }
        .form-group { margin-bottom: 1.2rem; }
        .form-group label { display: block; font-size: 0.85rem; margin-bottom: 0.4rem; opacity: 0.75; }
        .form-group input, .form-group textarea, .form-group select {
            width: 100%; padding: 0.6rem 0.8rem; background: var(--color-surface, #1a1a1a);
            border: 1px solid var(--color-border, #444); border-radius: 4px;
            color: inherit; font-size: 0.9rem; box-sizing: border-box;
        }
        .form-group textarea { min-height: 80px; resize: vertical; }
        .drop-zone { border: 2px dashed var(--color-border, #444); border-radius: 8px; padding: 2rem; text-align: center; cursor: pointer; transition: border-color 0.2s; }
        .drop-zone:hover, .drop-zone.over { border-color: var(--color-accent, #c8a96e); }
        .drop-zone p { margin: 0; opacity: 0.5; font-size: 0.85rem; }
        .preview-box { margin-top: 1rem; text-align: center; }
        .preview-box img, .preview-box video { max-width: 100%; max-height: 200px; border-radius: 4px; }
        .modal-actions { display: flex; gap: 0.75rem; justify-content: flex-end; margin-top: 1.5rem; }
        #feedback { padding: 0.6rem 1rem; border-radius: 4px; margin-bottom: 1rem; display: none; }
        #feedback.success { background: #1a4a1a; color: #6fcf6f; display: block; }
        #feedback.error   { background: #4a1a1a; color: #cf6f6f; display: block; }
        #loading { opacity: 0.5; text-align: center; padding: 3rem; }
    </style>
</head>
<body>
<div id="admin-social">
    <div class="page-header">
        <div>
            <a href="dashboard.php" style="font-size:0.85rem; opacity:0.6; text-decoration:none;">← Dashboard</a>
            <h1 style="margin:0.25rem 0 0;">Social Media Posts</h1>
        </div>
        <button class="btn btn-primary" onclick="openModal()">+ Upload Post</button>
    </div>

    <div id="feedback"></div>
    <div id="posts-container"><div id="loading">Loading posts...</div></div>
</div>

<!-- Upload Modal -->
<div class="modal-overlay" id="modal">
    <div class="modal">
        <h2>Upload Post</h2>

        <div class="form-group">
            <label>Platform *</label>
            <select id="f-platform">
                <option value="">— Select Platform —</option>
                <option value="instagram">Instagram</option>
                <option value="facebook">Facebook</option>
                <option value="twitter">Twitter / X</option>
                <option value="youtube">YouTube</option>
            </select>
        </div>

        <div class="form-group">
            <label>Media (Image or Video) *</label>
            <div class="drop-zone" id="drop-zone" onclick="document.getElementById('f-media').click()">
                <p>Click or drag & drop an image (JPG, PNG, WebP) or video (MP4)</p>
            </div>
            <input type="file" id="f-media" accept="image/jpeg,image/png,image/webp,video/mp4" style="display:none">
            <div class="preview-box" id="preview-box"></div>
        </div>

        <div class="form-group">
            <label>Caption</label>
            <textarea id="f-caption" placeholder="Write a caption..."></textarea>
        </div>
        <div class="form-group">
            <label>Hashtags (optional)</label>
            <input type="text" id="f-hashtags" placeholder="#BCATP #LondonOntario">
        </div>
        <div class="form-group">
            <label>External Link (optional)</label>
            <input type="url" id="f-link" placeholder="https://instagram.com/p/...">
        </div>
        <div class="form-group">
            <label>Status</label>
            <select id="f-status">
                <option value="draft">Draft</option>
                <option value="published">Published</option>
            </select>
        </div>

        <div class="modal-actions">
            <button class="btn" onclick="closeModal()" style="background:transparent; border:1px solid #555;">Cancel</button>
            <button class="btn btn-primary" id="save-btn" onclick="savePost()">Upload Post</button>
        </div>
    </div>
</div>

<script>
(function () {
    const API = '../includes/social-posts.php';
    let selectedFile = null;

    // Drag-and-drop
    const dz = document.getElementById('drop-zone');
    dz.addEventListener('dragover', e => { e.preventDefault(); dz.classList.add('over'); });
    dz.addEventListener('dragleave', () => dz.classList.remove('over'));
    dz.addEventListener('drop', e => {
        e.preventDefault(); dz.classList.remove('over');
        if (e.dataTransfer.files[0]) setFile(e.dataTransfer.files[0]);
    });
    document.getElementById('f-media').addEventListener('change', e => {
        if (e.target.files[0]) setFile(e.target.files[0]);
    });

    function setFile(file) {
        selectedFile = file;
        const preview = document.getElementById('preview-box');
        const url = URL.createObjectURL(file);
        if (file.type.startsWith('image')) {
            preview.innerHTML = `<img src="${url}" alt="preview">`;
        } else {
            preview.innerHTML = `<video src="${url}" controls></video>`;
        }
        dz.querySelector('p').textContent = file.name;
    }

    async function loadPosts() {
        const res  = await fetch(API + '?all=1');
        const data = await res.json();
        const container = document.getElementById('posts-container');

        if (!data.length) {
            container.innerHTML = '<p style="opacity:0.5;">No posts yet. Upload your first one.</p>';
            return;
        }

        container.innerHTML = `<div class="posts-grid">${
            data.map(p => `
                <div class="post-card">
                    ${p.media_type === 'video'
                        ? `<video src="../${esc(p.media_url)}" muted></video>`
                        : `<img src="../${esc(p.media_url)}" alt="Post image" loading="lazy">`
                    }
                    <div class="post-card-body">
                        <span class="post-platform">${esc(p.platform)}</span>
                        <span class="badge badge-${p.status}" style="margin-left:0.4rem;">${p.status}</span>
                        <p class="post-caption">${esc(p.caption || '—')}</p>
                        <div class="post-actions">
                            <button class="btn btn-sm btn-danger" onclick="deletePost(${p.id})">Delete</button>
                            ${p.external_link ? `<a href="${esc(p.external_link)}" target="_blank" class="btn btn-sm" style="background:transparent;border:1px solid #555;font-size:0.8rem;">View</a>` : ''}
                        </div>
                    </div>
                </div>
            `).join('')
        }</div>`;
    }

    window.openModal = function () {
        selectedFile = null;
        document.getElementById('preview-box').innerHTML = '';
        document.getElementById('drop-zone').querySelector('p').textContent = 'Click or drag & drop an image (JPG, PNG, WebP) or video (MP4)';
        ['f-platform','f-caption','f-hashtags','f-link'].forEach(id => document.getElementById(id).value = '');
        document.getElementById('f-status').value = 'draft';
        document.getElementById('modal').classList.add('active');
    };

    window.closeModal = function () {
        document.getElementById('modal').classList.remove('active');
    };

    window.savePost = async function () {
        if (!selectedFile) { showFeedback('Please select a media file.', true); return; }
        const platform = document.getElementById('f-platform').value;
        if (!platform) { showFeedback('Please select a platform.', true); return; }

        const btn = document.getElementById('save-btn');
        btn.textContent = 'Uploading...';
        btn.disabled = true;

        const form = new FormData();
        form.append('media',         selectedFile);
        form.append('platform',      platform);
        form.append('caption',       document.getElementById('f-caption').value);
        form.append('hashtags',      document.getElementById('f-hashtags').value);
        form.append('external_link', document.getElementById('f-link').value);
        form.append('status',        document.getElementById('f-status').value);

        const res  = await fetch(API, { method: 'POST', body: form });
        const data = await res.json();

        btn.textContent = 'Upload Post';
        btn.disabled = false;

        showFeedback(data.error || data.message, !!data.error);
        if (!data.error) { closeModal(); loadPosts(); }
    };

    window.deletePost = async function (id) {
        if (!confirm('Delete this post? This cannot be undone.')) return;
        const res  = await fetch(API + '?id=' + id, { method: 'DELETE' });
        const data = await res.json();
        showFeedback(data.message, false);
        loadPosts();
    };

    function showFeedback(msg, isError) {
        const el = document.getElementById('feedback');
        el.textContent = msg;
        el.className   = isError ? 'error' : 'success';
        setTimeout(() => el.className = '', 4000);
    }

    function esc(s) {
        return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
    }

    loadPosts();
})();
</script>
</body>
</html>