<?php
require 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $address = $_POST['address'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT complete_name FROM members_tb WHERE address = ? AND remarks = 'Active' ORDER BY complete_name ASC");
    $stmt->bind_param("s", $address);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['complete_name'] . "'>" . $row['complete_name'] . "</option>";
        }
    } else {
        echo "<option value=''>No members available</option>";
    }

    $stmt->close();
    $conn->close();
}
?>
