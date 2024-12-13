<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $query = "SELECT * FROM `students` WHERE `id` = '$id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result); 
    }
}
?>

<?php 

if (isset($_POST['update_student'])) {
    $id = $_GET['id']; 
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $Age = $_POST['Age'];

    
    $query = "UPDATE `students` SET `first_name` = '$fname', `last_name` = '$lname', `age` = '$Age' WHERE `id` = '$id'";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        
        header('Location: index.php?update_msg=You have successfully updated the data.');
        exit;
    }
}
?>

<form method="post" action="?id=<?php echo $id; ?>">
    <div class="form-group">
        <label for="f_name">First Name</label>
        <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']; ?>" required>
    </div>
    <div class="form-group">
        <label for="l_name">Last Name</label>
        <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name']; ?>" required>
    </div>
    <div class="form-group">
        <label for="Age">Age</label>
        <input type="text" name="Age" class="form-control" value="<?php echo $row['age']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary" name="update_student">Update</button>
</form>

<?php include('footer.php'); ?>


