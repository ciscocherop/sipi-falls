<?php
require_once('../includes/db.php'); // Adjust path based on your file structure

$sql = "Select *from bookings";
// Execute the query
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h2>View Bookings</h2>
    <table>
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Date of Travel</th>
            <th>Number of Adults</th>
            <th>Number of Children</th>
            <th>Preferred Activities</th>
            <th>Budget</th>
        </tr>
    </table>

    <?php
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row["fullname"]) . "</td>
                    <td>" . htmlspecialchars($row["email"]) . "</td>
                    <td>" . htmlspecialchars($row["date_of_travel"]) . "</td>
                    <td>" . htmlspecialchars($row["num_adults"]) . "</td>
                    <td>" . htmlspecialchars($row["num_children"]) . "</td>
                    <td>" . htmlspecialchars($row["preferred_activities"]) . "</td>
                    <td>" . htmlspecialchars($row["budget"]) . "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No bookings found</td></tr>";
    }
   $conn->close();
    ?>  

</body>
</html>
