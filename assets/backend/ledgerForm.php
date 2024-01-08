<?php
require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $legerName = $_POST['legerName'];
    $legerType = $_POST['legerType'];

    // Create a new database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT t_id FROM category WHERE t_name = '$legerType'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $t_id = $row['t_id'];

        $insertSql = "INSERT INTO account (a_name, t_id) VALUES ('$legerName', $t_id)";

        if ($conn->query($insertSql) === TRUE) {
            echo "Leger saved successfully";
        } else {
            echo "Error: " . $insertSql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: Unable to find t_id for leger type '$legerType'";
    }

    // Close the database connection
    $conn->close();
}
?>