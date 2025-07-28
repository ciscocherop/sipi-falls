<?php
require_once("../includes/db.php");


//count the number of subscribers
$sql_subscriber = "SELECT COUNT(*) as total FROM newsletter_subscribers";
$newsletter_result = $conn->query($sql_subscriber);
if ($newsletter_result->num_rows > 0) {
    $row = $newsletter_result->fetch_assoc();
    $totalSubscribers = $row['total'];
} else {
    $totalSubscribers = 0;
}

//COUNT THE NUMBER OF BOOKINGS
$sql_booking = "SELECT COUNT (*) as total FROM bookings";
$booking_result = $conn->query($sql_booking);
if ($booking_result->num_rows > 0){
    $row = $booking_result->fetch_assoc();
    $totalBookings = $row['total'];
}else{
    $totalBookings = 0;
}

//count contact messages
$sql_message = "SELECT COUNT (*) as total FROM contact_messages";
$message_result = $conn->query($sql_message);
if($message_result->num_rows>0){
    $totalMessages = $row['total'];
}else{
    $totalMessages = 0;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - Sipi Falls</title>
  <link rel="stylesheet" href="../css/style.css"> <!-- Your custom CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <div class="container mt-5">
    <h1 class="text-center mb-4">Welcome to Sipi Falls Admin Panel 🌿</h1>

    <div class="row text-center">

      <div class="col-md-4 mb-3">
        <div class="card bg-light shadow">
          <div class="card-body">
            <h4>📬 Bookings</h4>
            <p class="fs-3"><?php echo $totalBookings; ?></p>
            <a href="view_bookings.php" class="btn btn-primary">View Bookings</a>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-3">
        <div class="card bg-light shadow">
          <div class="card-body">
            <h4>📥 Contact Messages</h4>
            <p class="fs-3"><?php echo $totalMessages; ?></p>
            <a href="view_contacts.php" class="btn btn-success">View Messages</a>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-3">
        <div class="card bg-light shadow">
          <div class="card-body">
            <h4>📧 Subscribers</h4>
            <p class="fs-3"><?php echo $totalSubscribers; ?></p>
            <a href="view_subscribers.php" class="btn btn-warning">View Subscribers</a>
          </div>
        </div>
      </div>

    </div>
  </div>

</body>
</html>
