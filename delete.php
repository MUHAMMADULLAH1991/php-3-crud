<?php
include 'config.php';
?>

<?php

if (isset($_GET['id'])) {

        $singleId = $_GET['id'];

        $query = "DELETE FROM students WHERE id=$singleId";

        $deleteData = mysqli_query($connections, $query);

        if ($deleteData == true) {
            header('location: index.php');
        } 
        else {
            echo "Failed to delete";
        }
    }
?>