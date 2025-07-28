<?php
require_once('../includes/db.php'); // Adjust path based on your file structure

$sql = "SELECT * FROM newsletter_subscribers";
// Execute the query
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Subscribers</title>
    <link rel="stylesheet" href="../css/style.css"> 
</head>
<body>
    <h2>View Subscribers</h2>
    <table>
        <tr>
            <th>Email</th>
        </tr>
    </table>

    <?php
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row["email"]) . "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='1'>No newsletter_subscribers found</td></tr>";
    }
    $conn->close();
    ?>
</body>
</html>