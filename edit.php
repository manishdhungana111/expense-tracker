<?php
require "./connect.php";

if(isset($_POST['edit_id'])) {
    $edit_id = $_POST['edit_id'];
    $new_title = $_POST['new_title'];
    $new_amount = $_POST['new_amount'];
    $new_description = $_POST['new_description'];
    $new_expenses_date = $_POST['new_expenses_date'];
    $new_category_id = $_POST['new_category_id'];

    $sql_update = "UPDATE expenses 
                   SET title = '$new_title', 
                       amount = '$new_amount', 
                       description = '$new_description', 
                       expenses_date = '$new_expenses_date', 
                       category_id = '$new_category_id' 
                   WHERE id = $edit_id";
}