<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/db.php';

    // Collect and sanitize inputs
    $fullname   = isset($_POST['fullname']) ? trim($_POST['fullname']) : '';
    $email      = isset($_POST['email-booking']) ? trim($_POST['email-booking']) : '';
    $date       = isset($_POST['travel-date']) ? trim($_POST['travel-date']) : '';
    $adults     = isset($_POST['num_adults']) ? (int)$_POST['num_adults'] : 0;
    $children   = isset($_POST['num_children']) ? (int)$_POST['num_children'] : 0;
    $activities = isset($_POST['preferred_activities']) ? trim($_POST['preferred_activities']) : '';
    $budget     = isset($_POST['budget']) ? trim($_POST['budget']) : '';

    // Validate inputs
    if (empty($fullname) || empty($email) || empty($date) || empty($activities)) {
        header('Location: ../pages/contact.html?status=error&msg=Please fill in all required fields&form=booking');
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: ../pages/contact.html?status=error&msg=Please enter a valid email address&form=booking');
        exit();
    }

    if ($adults < 1) {
        header('Location: ../pages/contact.html?status=error&msg=At least one adult is required&form=booking');
        exit();
    }

    // Use a prepared statement to avoid SQL injection
    $stmt = $conn->prepare(
        "INSERT INTO bookings (fullname, email, date_of_travel, num_adults, num_children, preferred_activities, budget)
         VALUES (?, ?, ?, ?, ?, ?, ?)"
    );

    if ($stmt) {
        $stmt->bind_param('sssiiss', $fullname, $email, $date, $adults, $children, $activities, $budget);

        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            $msg = "Booking confirmed! We've sent a confirmation email to $email. Our team will contact you soon!";
            header('Location: ../pages/contact.html?status=success&msg=' . urlencode($msg) . '&form=booking');
            exit();
        } else {
            error_log('Booking insert failed: ' . $stmt->error);
            header('Location: ../pages/contact.html?status=error&msg=Error saving your booking. Please try again later&form=booking');
            $stmt->close();
            $conn->close();
            exit();
        }
    } else {
        error_log('Prepare failed: ' . $conn->error);
        header('Location: ../pages/contact.html?status=error&msg=Server error. Please try again later&form=booking');
        $conn->close();
        exit();
    }

} else {
    header('Location: ../index1.html');
    exit();
}
?>
    exit();
}
?>
