<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('../includes/db.php'); // adjust path based on your file location

    $fullname   = $_POST['fullname'];
    $email      = $_POST['email-booking'];
    $date       = $_POST['travel-date'];
    $adults     = $_POST['num_adults'];
    $children   = $_POST['num_children'];
    $activities = $_POST['preferred_activities'];
    $budget     = $_POST['budget'];

    $sql = "INSERT INTO bookings (fullname, email, date_of_travel, num_adults, num_children, preferred_activities, budget)
            VALUES ('$fullname', '$email', '$date', '$adults', '$children', '$activities', '$budget')";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("Location: ../pages/contact.php?status=success");
        exit(); // 🔥 stop script here to avoid echo
    } else {
        echo "Error: " . $conn->error;
        $conn->close();
    }

} else {
    // Someone tried to access the file without submitting a form
    header("Location: ../index.php");
    exit();
}
?>
