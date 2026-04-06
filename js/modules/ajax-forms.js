const contactForm = document.querySelector('#contact-form');
const contactBtn  = document.querySelector('#submit-btn');
const nlForm      = document.querySelector('#nl-form-con');
const nlBtn       = document.querySelector('#nl-subscribe');

// flags to block duplicate submissions 
let contactSubmitting = false;
let nlSubmitting      = false;

function showContactFeedback(html) {
    const el = document.querySelector('#contact-feedback');
    if (el) {
        el.innerHTML = html;
    }
}

function showNlFeedback(html) {
    const el = document.querySelector('#nl-feedback');
    if (el) {
        el.innerHTML = html;
    }
}

async function handleContactSubmit(event) {
    event.preventDefault();

    if (contactSubmitting) {
        return;
    }

    contactSubmitting     = true;
    contactBtn.disabled   = true;
    contactBtn.textContent = 'Sending...';

    const formData = new FormData(contactForm);

    try {
        const res  = await fetch('includes/send.php', { method: 'POST', body: formData });
        const text = await res.text();

        let data;
        try {
            data = JSON.parse(text);
        } catch (parseErr) {
            showContactFeedback('<p class="form-error">Server error. Please try again.</p>');
            return;
        }

        if (data.errors) {
            showContactFeedback('<p class="form-error">' + data.errors.join('<br>') + '</p>');
        } else {
            showContactFeedback('<p class="form-success">' + data.message + '</p>');
            contactForm.reset();
        }

    } catch (err) {
        showContactFeedback('<p class="form-error">Something went wrong. Please try again.</p>');
    } finally {
        contactSubmitting     = false;
        contactBtn.disabled   = false;
        contactBtn.textContent = 'Submit !';
    }
}

async function handleNlSubmit(event) {
    event.preventDefault();

    if (nlSubmitting) {
        return;
    }

    nlSubmitting     = true;
    nlBtn.disabled   = true;
    nlBtn.textContent = 'Subscribing...';

    const formData = new FormData(nlForm);

    try {
        const res  = await fetch('includes/newsletter.php', { method: 'POST', body: formData });
        const text = await res.text();

        let data;
        try {
            data = JSON.parse(text);
        } catch (parseErr) {
            showNlFeedback('<p class="form-error">Server error. Please try again.</p>');
            return;
        }

        if (data.errors) {
            showNlFeedback('<p class="form-error">' + data.errors.join('<br>') + '</p>');
        } else {
            showNlFeedback('<p class="form-success">' + data.message + '</p>');
            nlForm.reset();
        }

    } catch (err) {
        showNlFeedback('<p class="form-error">Something went wrong. Please try again.</p>');
    } finally {
        nlSubmitting     = false;
        nlBtn.disabled   = false;
        nlBtn.textContent = 'Subscribe';
    }
}

if (contactForm) {
    contactForm.addEventListener('submit', handleContactSubmit);
}

if (nlForm) {
    nlForm.addEventListener('submit', handleNlSubmit);
}