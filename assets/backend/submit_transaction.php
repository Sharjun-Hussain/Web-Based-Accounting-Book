<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
include 'db.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $trans_date = $_POST['trans_date'];
    $trans_from = $_POST['trans_from'];
    $trans_to = $_POST['trans_to'];
    $trans_amount = $_POST['trans_amount'];
    $trans_desc = $_POST['trans_desc'];

    // Check if files are selected
    $uploadedFiles = [];
    if (!empty($_FILES['trans_attach']['name'][0])) {
        // Loop through each file
        for ($i = 0; $i < count($_FILES['trans_attach']['name']); $i++) {
            $upload = $_FILES['trans_attach']['name'][$i];
            $image_folder = 'C:\xampp\htdocs\Accounting\uploads/' . $upload;

            // Move uploaded file to the destination folder
            if (move_uploaded_file($_FILES['trans_attach']['tmp_name'][$i], $image_folder)) {
                $uploadedFiles[] = $upload;
            }
        }
    }

    // Combine uploaded file names into a comma-separated string
    $trans_attach = implode(',', $uploadedFiles);

    // Save data to the database using prepared statement
    $sql = "INSERT INTO transactions (trans_date, trans_from, trans_to, trans_amount, trans_desc, trans_attach) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $trans_date, $trans_from, $trans_to, $trans_amount, $trans_desc, $trans_attach);

    if ($stmt->execute()) {
        echo "Transaction created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}
?>