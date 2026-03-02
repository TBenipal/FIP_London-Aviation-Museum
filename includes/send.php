(() => {

<<<<<<< Updated upstream
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../includes/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $first_raw = $_POST['first_name'] ?? '';
    $last_raw  = $_POST['last_name']  ?? '';
    $email_raw = $_POST['email']      ?? '';
    $msg_raw   = $_POST['message']    ?? '';

    $first   = trim(strip_tags($first_raw));
    $last    = trim(strip_tags($last_raw));
    $message = trim(strip_tags($msg_raw));

    $email_clean = str_replace(["\r", "\n", "%0a", "%0d"], '', trim($email_raw));
    $visitor_email = filter_var($email_clean, FILTER_VALIDATE_EMAIL);

    $fail = [];

    if ($first === '')      $fail[] = 'first_name';
    if ($last === '')       $fail[] = 'last_name';
    if (!$visitor_email)   $fail[] = 'email';
    if ($message === '')   $fail[] = 'message';

    if (!empty($fail)) {
        echo '<p><strong>Validation failed.</strong></p>';
        echo '<p>Please fix: ' . htmlspecialchars(implode(', ', $fail), ENT_QUOTES, 'UTF-8') . '</p>';
        exit;
    }

    // Save to database
    try {
        $db = getConnection();
        $stmt = $db->prepare('
            INSERT INTO contact_submissions (first_name, last_name, email, message)
            VALUES (:first_name, :last_name, :email, :message)
        ');
        $stmt->execute([
            ':first_name' => $first,
            ':last_name'  => $last,
            ':email'      => $visitor_email,
            ':message'    => $message,
        ]);
    } catch (PDOException $e) {
        die('Failed to save submission: ' . $e->getMessage());
    }

    // Optional email notification
    $recipient   = 'museum@427wing.ca';         // ← update to real museum email
    $subject     = 'New Contact Form Submission - London Aviation Museum';
    $fromAddress = 'no-reply@london-aviation.local';
    $visitor_name = $first . ' ' . $last;

    $emailBody  = "New contact form submission:\r\n\r\n";
    $emailBody .= "Name: {$visitor_name}\r\n";
    $emailBody .= "Email: {$visitor_email}\r\n\r\n";
    $emailBody .= "Message:\r\n{$message}\r\n";

    $headers  = "From: London Aviation Museum <{$fromAddress}>\r\n";
    $headers .= "Reply-To: {$visitor_email}\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    mail($recipient, $subject, $emailBody, $headers);

    // Redirect with success message
    $msg = urlencode("Thank you for reaching out, " . htmlspecialchars($visitor_name, ENT_QUOTES, 'UTF-8') . ". We will get back to you soon.");
    header("Location: ../contact.html?msg=$msg");
    exit();

} else {
    echo "<p>Direct access not allowed.</p>";
    
}
=======
        // --- CONTACT FORM ---
    const contactForm = document.getElementById('contact-form');
    const contactBtn  = document.getElementById('submit-btn');

    if (contactForm) {
        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            contactBtn.disabled = true;
            contactBtn.textContent = 'Sending...';

            const formData = new FormData(contactForm);
            const feedback = document.getElementById('contact-feedback');

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

    // --- NEWSLETTER FORM ---
    const nlForm = document.getElementById('nl-form-con');
    const nlBtn  = document.getElementById('nl-subscribe');

    if (nlForm) {
        nlForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            nlBtn.disabled = true;
            nlBtn.textContent = 'Subscribing...';

            const formData = new FormData(nlForm);
            const feedback = document.getElementById('nl-feedback');

            try {
                const res  = await fetch('includes/newsletter.php', {
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
                    nlForm.reset();
                }

            } catch (err) {
                feedback.innerHTML = `<p class="form-error">Something went wrong. Please try again.</p>`;
                console.error(err);
            } finally {
                nlBtn.disabled = false;
                nlBtn.textContent = 'Subscribe';
            }
        });
    }

})();
>>>>>>> Stashed changes
