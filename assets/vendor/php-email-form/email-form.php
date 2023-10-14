<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // Set up email
  $to = 'your-email@example.com'; // Replace with your email address
  $headers = "From: $name <$email>\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

  // Compose and send the email
  $emailContent = "Name: $name\n";
  $emailContent .= "Email: $email\n\n";
  $emailContent .= "Subject: $subject\n";
  $emailContent .= "Message:\n$message";
  $success = mail($to, $subject, $emailContent, $headers);

  if ($success) {
    echo "OK"; // Return success message to the JavaScript code
  } else {
    echo "Error sending email."; // Return error message to the JavaScript code
  }
} else {
  echo "Invalid request.";
}
?>
