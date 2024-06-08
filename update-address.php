<?php
// update-address.php

// Include your database configuration file
include 'conn.php';

// Check if the form is submitted and if the required fields are set
if (isset($_POST['edit-submit']) && isset($_POST['id']) && isset($_POST['barangay']) && isset($_POST['municipality'])) {
    // Get the values from the form
    $id = intval($_POST['id']);
    $barangay = $_POST['barangay'];
    $municipality = $_POST['municipality'];

    // Prepare the SQL statement to update the record
    $sql = "UPDATE address_tb SET barangay = ?, municipality = ? WHERE id = ?";
    
    // Initialize a statement and prepare the query
    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters to the statement
        $stmt->bind_param('ssi', $barangay, $municipality, $id);
        
        // Execute the statement
        if ($stmt->execute()) {
            // Record updated successfully, redirect to a success page or show a success message
            header('Location: address-management.php');
            exit;
        } else {
            // An error occurred, show an error message
            echo "Error updating record: " . $stmt->error;
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
    // Form submission or required fields are not set, show an error message
    echo "Form submission failed or required fields are missing.";
}
?>
