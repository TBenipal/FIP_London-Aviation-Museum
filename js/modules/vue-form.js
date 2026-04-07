export function nlform() {
    const container = document.querySelector('#newsletter-app');
    if (!container) return;

    const app = Vue.createApp({
        data() {
            return {
                firstName: '',
                email: '',
                loading: false,
                feedbackMessage: '',
                feedbackClass: '',
            };
        },
        methods: {
            submitNewsletter() {
                this.loading = true;
                this.feedbackMessage = '';

                const formData = new FormData();
                formData.append('first_name', this.firstName);
                formData.append('email', this.email);

                fetch('includes/newsletter.php', {
                    method: 'POST',
                    body: formData,
                })
                .then(res => res.json())
                .then(data => {
                    if (data.errors) {
                        this.feedbackMessage = data.errors.join('<br>');
                        this.feedbackClass = 'form-error';
                    } else {
                        this.feedbackMessage = data.message;
                        this.feedbackClass = 'form-success';
                        this.firstName = '';
                        this.email = '';
                    }

                    setTimeout(() => {
                        this.feedbackMessage = '';
                        this.loading = false;
                    }, 2000);
                })
                .catch(err => {
                    this.feedbackMessage = 'SYSTEM ERROR';
                    this.feedbackClass = 'form-error';
                    
                    setTimeout(() => {
                        this.feedbackMessage = '';
                        this.loading = false;
                    }, 2000);
                    console.error(err);
                });
            }
        }
    }).mount('#newsletter-app');
}