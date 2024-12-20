<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['telefone']);
    $message = htmlspecialchars($_POST['mensagem']);

    $recipient = "offshore@cix.capital";
    $subject = "Website Contact - $name";
    $emailBody = "You have received a new message:\n\n";
    $emailBody .= "Name: $name\n";
    $emailBody .= "Email: $email\n";
    $emailBody .= "Phone: $phone\n";
    $emailBody .= "Message:\n$message\n";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($recipient, $subject, $emailBody, $headers)) {
        $successMessage = "Thank you! Your message has been sent successfully.";
    } else {
        $errorMessage = "There was an error sending your message. Please try again later.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Form Response</title>
</head>
<body>
    <?php if (isset($successMessage)): ?>
        <p style="color: green;"><?php echo $successMessage; ?></p>
    <?php elseif (isset($errorMessage)): ?>
        <p style="color: red;"><?php echo $errorMessage; ?></p>
    <?php endif; ?>
</body>
</html>

