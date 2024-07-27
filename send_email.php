<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    // Collect selected services
    $services = [];
    if (isset($_POST['service1'])) $services[] = $_POST['service1'];
    if (isset($_POST['service2'])) $services[] = $_POST['service2'];
    if (isset($_POST['service3'])) $services[] = $_POST['service3'];
    if (isset($_POST['service4'])) $services[] = $_POST['service4'];
    if (isset($_POST['service5'])) $services[] = $_POST['service5'];
    
    $services_list = implode(", ", $services);
    
    // Email details
    $to = "sam.restehcnam08@gmail.com";  
    $subject = "New Contact Form Submission";
    $body = "Name: $name\nEmail: $email\nMessage: $message\n\nServices: $services_list";
    $headers = "From: $email";
    
    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully.";
    } else {
        echo "Failed to send message.";
    }
} else {
    echo "Invalid request.";
}
?>
