<?php
require_once("../includes/db.php");

// Count newsletter subscribers
$sql_subscribers = "SELECT COUNT(*) as total FROM newsletter_subscribers";
$subscribers_result = $conn->query($sql_subscribers);
if (!$subscribers_result) {
    echo "Query failed: " . $conn->error;
    $totalSubscribers = 0; // safe fallback
} else {
    $row = $subscribers_result->fetch_assoc();
    $totalSubscribers = $row['total'];
}

// Count bookings
$sql_booking = "SELECT COUNT(*) as total FROM bookings";
$booking_result = $conn->query($sql_booking);

if (!$booking_result) {
    echo "Query failed: " . $conn->error;
    $totalBookings = 0; // safe fallback
} else {
    $row = $booking_result->fetch_assoc();
    $totalBookings = $row['total'];
}


// Count contact messages
$sql_message = "SELECT COUNT(*) as total FROM contact_messages";
$message_result = $conn->query($sql_message);
if(!$message_result){
    echo "Query failed: " . $conn->error;
    $totalMessages = 0; // safe fallback
} else {
    $row = $message_result->fetch_assoc();
    $totalMessages = $row['total'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/responsive.css">
  <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
  <?php
  include('../includes/navbar.php'); // Include the navbar for the admin dashboard
?>
  <div class="d-flex">
    <!-- Sidebar -->
    <nav class="sidebar text-white p-3 ">
      <h4 class="text-center mb-4">Admin Panel</h4>
      <ul class="nav flex-column">
        <li class="nav-item"><a href="dashboard.php" class="nav-link text-white">Dashboard</a></li>
        <li class="nav-item"><a href="view_bookings.php" class="nav-link text-white">View Bookings</a></li>
        <li class="nav-item"><a href="view_contacts.php" class="nav-link text-white">Contact Messages</a></li>
        <li class="nav-item"><a href="view_subscribers.php" class="nav-link text-white">Subscribers</a></li>
      </ul>
    </nav>

    <!-- Main Content -->
    <div class="main-content flex-grow-1 p-4">
      <header class="mb-4">
        <h2 style="color: #228B22 !important;" class="text-center">Welcome to the Admin Dashboard</h2>
      </header>

      <!-- Stats Cards -->
      <div class="row g-4 viewings">
        <div class="col-md-4">
          <div class="card ">
            <div class="card-body">
              <h5 class="card-title">Total Bookings</h5>
              <?php echo "<p class='card-text fs-4 text-success">$totalBookings; ?></p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card ">
            <div class="card-body">
              <h5 class="card-title">Contact Messages</h5>
              <p class="card-text fs-4 text-success"><?php echo $totalMessages; ?></p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Subscribers</h5>
              <p class="card-text fs-4 text-success"><?php echo $totalSubscribers; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
include('../includes/footer.php'); // Include the footer
?>
  <!-- Bootstrap JS (Optional for dropdowns or modal later) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

