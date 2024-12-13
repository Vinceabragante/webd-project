<?php include('dbcon.php'); ?>

<?php 
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Correct SQL syntax
    $query = "DELETE FROM `students` WHERE `id` = '$id'";

    // Execute query
    $result = mysqli_query($connection, $query);

    if (!$result) {
        // Pass $connection to mysqli_error
        die("Query Failed: " . mysqli_error($connection));
    } else {
        // Redirect with a success message
        header('Location: index.php?delete_msg=You have deleted the record');
        exit; // Stop further script execution
    }
}
?>
