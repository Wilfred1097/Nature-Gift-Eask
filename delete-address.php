<?php
// delete-address.php

// Include your database configuration file
include 'conn.php';

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    // Get the id from the URL
    $id = intval($_GET['id']);

    // Prepare the SQL statement to delete the record
    $sql = "DELETE FROM address_tb WHERE id = ?";
    
    // Initialize a statement and prepare the query
    if ($stmt = $conn->prepare($sql)) {
        // Bind the id parameter to the statement
        $stmt->bind_param('i', $id);
        
        // Execute the statement
        if ($stmt->execute()) {
            // Record deleted successfully, redirect to address-management.php
            header('Location: address-management.php');
            exit; // Ensure no further code is executed after the redirect
        } else {
            // An error occurred, show an error message
            echo "Error deleting record: " . $stmt->error;
        }
        
        // Close the statement
        $stmt->close();
    } else {
        // An error occurred preparing the statement, show an error message
        echo "Error preparing the statement: " . $conn->error;
    }
    
    // Close the database connection
    $conn->close();
} else {
    // No id parameter in URL, show an error message
    echo "No id parameter provided.";
}
?>
