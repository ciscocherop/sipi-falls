<?php
require_once('../includes/db.php'); // Adjust path based on your file structure
$sql = "SELECT * FROM contact_messages";
// Execute the query    
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">        
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Contacts</title>
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
    <h2 class="text-center mt-3 mb-3">View Contacts</h2>
    <!-- success Alert Placeholder -->
    <div id="alertContainer" class="text-center"></div>
    <table class="table table-bordered table-striped table-hover" style="width:80%; margin:0 auto;">
        <thead style="color: #228B22;">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Action</th> <!--  Added delete column -->
            </tr>
        </thead>

        <tbody>
            <?php
                     if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . htmlspecialchars($row["first_name"]) . "</td>
                    <td>" . htmlspecialchars($row["last_name"]) . "</td>
                    <td>" . htmlspecialchars($row["email"]) . "</td>
                    <td>" . htmlspecialchars($row["subject"]) . "</td>
                    <td>" . htmlspecialchars($row["message"]) . "</td>
                    <td>
                        <button class='btn btn-danger btn-sm delete-contact' data-id='" . $row['id'] . "'>Delete</button>
                    </td>
                  </tr>";
                }
            } else {
            echo "<tr><td colspan='5'>No contacts found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
    
   <div class="text-center mt-5 mb-3">
     <a href="dashboard.php" 
        class="text-white p-2 rounded-1" 
        style="text-decoration: none; background: #228B22;">
        ← Back to Dashboard
     </a>
    </div>

<?php
include('../includes/footer.php'); // Include the footer
?>
<script src="../js/script.js"></script> <!-- Include your custom script for handling delete actions -->
</body>
</html>