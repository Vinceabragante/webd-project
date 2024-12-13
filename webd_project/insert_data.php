<?php 
include('dbcon.php');

if(isset($_POST['add_students'])){
  
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $Age = $_POST['Age'];

    if($fname == "" || empty($fname)){
        header('Location: index.php?message=You need to fill in the first name!');
        exit();
    } else {
       
        $query = "INSERT INTO students (first_name, last_name, age) VALUES ('$fname', '$lname', '$Age')";

        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Query Failed: " . mysqli_error($connection));
        } else {
            header('Location: index.php?insert_msg=Your data has been added successfully');
            exit();
        }
    }
}
?>
