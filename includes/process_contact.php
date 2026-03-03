
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('../includes/db.php');

    // Sanitize inputs to prevent SQL injection
    $firstname = isset($_POST['firstname']) ? trim($_POST['firstname']) : '';
    $lastname  = isset($_POST['lastname']) ? trim($_POST['lastname']) : '';
    $email     = isset($_POST['email']) ? trim($_POST['email']) : '';
    $subject   = isset($_POST['subject']) ? trim($_POST['subject']) : '';
    $message   = isset($_POST['message']) ? trim($_POST['message']) : '';

    // Validate inputs
    if (empty($firstname) || empty($lastname) || empty($email) || empty($subject) || empty($message)) {
        header("Location: ../pages/contact.html?status=error&msg=All fields are required&form=contact");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../pages/contact.html?status=error&msg=Invalid email address&form=contact");
        exit();
    }

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO contact_messages (first_name, last_name, email, subject, message) VALUES (?, ?, ?, ?, ?)");
    
    if ($stmt) {
        $stmt->bind_param('sssss', $firstname, $lastname, $email, $subject, $message);
        
        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            header("Location: ../pages/contact.html?status=success&msg=Thank you! Your message has been sent successfully. We'll get back to you soon!&form=contact");
            exit();
        } else {
            header("Location: ../pages/contact.html?status=error&msg=Error saving your message. Please try again.&form=contact");
            exit();
        }
    } else {
        header("Location: ../pages/contact.html?status=error&msg=Database error. Please try again.&form=contact");
        exit();
    }
} else {
    header("Location: ../pages/contact.html");
    exit();
}
?>
