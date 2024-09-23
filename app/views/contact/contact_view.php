<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <h1>Contact Us</h1>

    <!-- Display error or success messages -->
    <?php if (isset($_GET['status'])): ?>
        <?php if ($_GET['status'] === 'success'): ?>
            <p class="success-message">Your message has been sent successfully!</p>
        <?php elseif ($_GET['status'] === 'error'): ?>
            <p class="error-message">There was an error sending your message. Please try again.</p>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Contact Form -->
    <form action="../app/controllers/contactcontroller.php" method="post">
        <input type="text" name="full_name" placeholder="Full Name" required>
        <input type="email" name="email_address" placeholder="Email Address" required>
        <input type="tel" name="phone_number" placeholder="Phone Number" required>
        <input type="text" name="service_requested" placeholder="Services You Want" required>
        <textarea name="message" placeholder="Message" required></textarea>
        <button id="send" type="submit">Send Message</button>
    </form>
</body>
</html>
