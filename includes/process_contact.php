<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('../includes/db.php'); // adjust path based on your file structure

    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $email     = $_POST['email'];
    $subject   = $_POST['subject'];
    $message   = $_POST['message'];

    $sql = "INSERT INTO contact_messages (first_name, last_name, email, subject, message)
            VALUES ('$firstname', '$lastname', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("Location: ../pages/contact.php?status=success");
        exit();
    } else {
        echo "Error: " . $conn->error;
        $conn->close();
    }
} else {
    // 🚫 Prevent direct access to the file
    header("Location: ../pages/contact.php");
    exit();
}
?>
