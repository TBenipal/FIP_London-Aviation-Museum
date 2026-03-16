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