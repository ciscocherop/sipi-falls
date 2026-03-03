<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('db.php'); // adjust path based on your file location
    
    $email =$_POST['email'];

    $sql = "INSERT INTO newsletter_subscribers (email) VALUES ('$email')";
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("Location: ../pages/in.php?status= you for subscribing!");
        exit();
    } else {
        echo "Error: " . $conn->error;
        $conn->close();
    }
}
else {
    // If accessed directly, redirect to the homepage
    header("Location: ../index.php");
    exit();
}

?>