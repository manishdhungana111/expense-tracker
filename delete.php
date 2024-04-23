<?php
require "./connect.php";
if(isset($_GET['delete_id']) && !empty($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql_delete = "DELETE FROM expenses WHERE id = $delete_id";
    if(mysqli_query($conn, $sql_delete)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

?>