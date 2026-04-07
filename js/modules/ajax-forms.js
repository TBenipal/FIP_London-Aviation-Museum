export function contactform() {

    const contactForm = document.querySelector('#contact-form');
    const contactBtn  = document.querySelector('#submit-btn');

    // --- CONTACT FORM ---
    if (contactForm) {
        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            contactBtn.disabled = true;
            contactBtn.textContent = 'Sending...';

            const formData = new FormData(contactForm);
            const feedback = document.querySelector('#contact-feedback');

            try {
                const res  = await fetch('includes/send.php', {
                    method: 'POST',
                    body: formData
                });

                const text = await res.text();
                let data;

                try {
                    data = JSON.parse(text);
                } catch {
                    feedback.innerHTML = `<p class="form-error">Server error — check console.</p>`;
                    console.error('Non-JSON response:', text);
                    return;
                }

                if (data.errors) {
                    feedback.innerHTML = `<p class="form-error">${data.errors.join('<br>')}</p>`;
                } else {
                    feedback.innerHTML = `<p class="form-success">${data.message}</p>`;
                    contactForm.reset();
                }

            } catch (err) {
                feedback.innerHTML = `<p class="form-error">Something went wrong. Please try again.</p>`;
                console.error(err);
            } finally {
                contactBtn.disabled = false;
                contactBtn.textContent = 'Submit!';
            }
        });
    }
}