<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    // Email settings
    $to = "beninuryahya3@gmail.com";  // Your email address
    $from = "noreply@yourdomain.com"; // A valid sender email address
    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
    // Email subject and body
    $email_subject = "New Contact Form Submission: $subject";
    $email_body = "
    <html>
    <head>
        <title>$subject</title>
    </head>
    <body>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Subject:</strong> $subject</p>
        <p><strong>Message:</strong><br>$message</p>
    </body>
    </html>
    ";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<script>alert('Your message has been sent. Thank you!'); window.location.href = 'thank-you.html';</script>";
    } else {
        echo "<script>alert('Oops, something went wrong. Please try again later.');</script>";
    }
}
?>
