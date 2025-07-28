<?php
include('db.php');

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
    <link rel="stylesheet" href="../css/style.css"> 
</head>
<body>
    <h2>View Contacts</h2>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
        </tr>
    </table>

    <?php
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row["firstname"]) . "</td>
                    <td>" . htmlspecialchars($row["lastname"]) . "</td>
                    <td>" . htmlspecialchars($row["email"]) . "</td>
                    <td>" . htmlspecialchars($row["subject"]) . "</td>
                    <td>" . htmlspecialchars($row["message"]) . "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No contacts found</td></tr>";
    }
    $conn->close();
    ?>
</body>
</html>