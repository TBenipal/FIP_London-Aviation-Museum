<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
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
<body id="social-panel">

<div id="admin-social">
    <div class="page-header">
        <div>
            <a href="dashboard.php" style="font-size:0.85rem; opacity:0.6; text-decoration:none;">← Dashboard</a>
            <h1 style="margin:0.25rem 0 0;">Social Media Posts</h1>
        </div>
        <button class="btn btn-primary" id="upload-btn">+ Upload Post</button>
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
            <div class="drop-zone" id="drop-zone">
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
            <button class="btn" id="cancel-btn" style="background:transparent; border:1px solid #555;">Cancel</button>
            <button class="btn btn-primary" id="save-btn">Upload Post</button>
        </div>
    </div>
</div>

<script>
const API            = '../includes/social-posts.php';
let selectedFile     = null;

const dropZone       = document.querySelector('#drop-zone');
const fileInput      = document.querySelector('#f-media');
const previewBox     = document.querySelector('#preview-box');
const modal          = document.querySelector('#modal');
const saveBtn        = document.querySelector('#save-btn');
const feedbackEl     = document.querySelector('#feedback');
const postsContainer = document.querySelector('#posts-container');

function escapeHtml(str) {
    // I use split/join to avoid regex per the no-regex rule
    const s = String(str);
    return s.split('&').join('&amp;').split('<').join('&lt;').split('>').join('&gt;').split('"').join('&quot;');
}

function buildPostCard(post) {
    let mediaHtml;
    if (post.media_type === 'video') {
        mediaHtml = '<video src="../' + escapeHtml(post.media_url) + '" muted></video>';
    } else {
        mediaHtml = '<img src="../' + escapeHtml(post.media_url) + '" alt="Post image" loading="lazy">';
    }

    let viewLinkHtml = '';
    if (post.external_link) {
        viewLinkHtml = '<a href="' + escapeHtml(post.external_link) + '" target="_blank" class="btn btn-sm" style="background:transparent;border:1px solid #555;font-size:0.8rem;">View</a>';
    }

    let caption = '—';
    if (post.caption) {
        caption = post.caption;
    }

    return '<div class="post-card">' +
        mediaHtml +
        '<div class="post-card-body">' +
        '<span class="post-platform">' + escapeHtml(post.platform) + '</span>' +
        '<span class="badge badge-' + escapeHtml(post.status) + '" style="margin-left:0.4rem;">' + escapeHtml(post.status) + '</span>' +
        '<p class="post-caption">' + escapeHtml(caption) + '</p>' +
        '<div class="post-actions">' +
        '<button class="btn btn-sm btn-danger" data-id="' + post.id + '">Delete</button>' +
        viewLinkHtml +
        '</div>' +
        '</div>' +
        '</div>';
}

function attachDeleteListeners() {
    const deleteButtons = postsContainer.querySelectorAll('.btn-danger[data-id]');
    let i = 0;
    while (i < deleteButtons.length) {
        deleteButtons[i].addEventListener('click', handleDeleteClick);
        i++;
    }
}

async function loadPosts() {
    const res  = await fetch(API + '?all=1');
    const data = await res.json();

    if (data.error) {
        postsContainer.innerHTML = '<p style="opacity:0.5;">Could not load posts.</p>';
        return;
    }

    if (!data.length) {
        postsContainer.innerHTML = '<p style="opacity:0.5;">No posts yet. Upload your first one.</p>';
        return;
    }

    let cardsHtml = '';
    let i = 0;
    while (i < data.length) {
        cardsHtml += buildPostCard(data[i]);
        i++;
    }

    postsContainer.innerHTML = '<div class="posts-grid">' + cardsHtml + '</div>';
    attachDeleteListeners();
}

function setFile(file) {
    selectedFile = file;
    const url    = URL.createObjectURL(file);

    if (file.type.startsWith('image')) {
        previewBox.innerHTML = '<img src="' + url + '" alt="preview">';
    } else {
        previewBox.innerHTML = '<video src="' + url + '" controls></video>';
    }

    dropZone.querySelector('p').textContent = file.name;
}

function openModal() {
    selectedFile = null;
    previewBox.innerHTML = '';
    dropZone.querySelector('p').textContent = 'Click or drag & drop an image (JPG, PNG, WebP) or video (MP4)';
    document.querySelector('#f-platform').value = '';
    document.querySelector('#f-caption').value  = '';
    document.querySelector('#f-hashtags').value = '';
    document.querySelector('#f-link').value     = '';
    document.querySelector('#f-status').value   = 'draft';
    modal.classList.add('active');
}

function closeModal() {
    modal.classList.remove('active');
}

function showFeedback(msg, isError) {
    feedbackEl.textContent = msg;
    if (isError) {
        feedbackEl.className = 'error';
    } else {
        feedbackEl.className = 'success';
    }
    setTimeout(clearFeedback, 4000);
}

function clearFeedback() {
    feedbackEl.className = '';
}

async function savePost() {
    if (!selectedFile) {
        showFeedback('Please select a media file.', true);
        return;
    }

    const platform = document.querySelector('#f-platform').value;
    if (!platform) {
        showFeedback('Please select a platform.', true);
        return;
    }

    saveBtn.textContent = 'Uploading...';
    saveBtn.disabled    = true;

    const form = new FormData();
    form.append('media',         selectedFile);
    form.append('platform',      platform);
    form.append('caption',       document.querySelector('#f-caption').value);
    form.append('hashtags',      document.querySelector('#f-hashtags').value);
    form.append('external_link', document.querySelector('#f-link').value);
    form.append('status',        document.querySelector('#f-status').value);

    const res  = await fetch(API, { method: 'POST', body: form });
    const data = await res.json();

    saveBtn.textContent = 'Upload Post';
    saveBtn.disabled    = false;

    let feedbackMsg;
    if (data.error) {
        feedbackMsg = data.error;
    } else {
        feedbackMsg = data.message;
    }

    let isError;
    if (data.error) {
        isError = true;
    } else {
        isError = false;
    }

    showFeedback(feedbackMsg, isError);

    if (!data.error) {
        closeModal();
        loadPosts();
    }
}

async function deletePost(id) {
    if (!confirm('Delete this post? This cannot be undone.')) {
        return;
    }
    const res  = await fetch(API + '?id=' + id, { method: 'DELETE' });
    const data = await res.json();
    showFeedback(data.message, false);
    loadPosts();
}

function handleDragOver(event) {
    event.preventDefault();
    dropZone.classList.add('over');
}

function handleDragLeave() {
    dropZone.classList.remove('over');
}

function handleDrop(event) {
    event.preventDefault();
    dropZone.classList.remove('over');
    const file = event.dataTransfer.files[0];
    if (file) {
        setFile(file);
    }
}

function handleFileChange(event) {
    const file = event.target.files[0];
    if (file) {
        setFile(file);
    }
}

function handleDropZoneClick() {
    fileInput.click();
}

function handleDeleteClick(event) {
    const id = event.currentTarget.getAttribute('data-id');
    deletePost(id);
}

dropZone.addEventListener('dragover',  handleDragOver);
dropZone.addEventListener('dragleave', handleDragLeave);
dropZone.addEventListener('drop',      handleDrop);
dropZone.addEventListener('click',     handleDropZoneClick);
fileInput.addEventListener('change',   handleFileChange);

document.querySelector('#upload-btn').addEventListener('click', openModal);
document.querySelector('#cancel-btn').addEventListener('click', closeModal);
document.querySelector('#save-btn').addEventListener('click',   savePost);

loadPosts();
</script>
</body>
</html>