<?php
require "./connect.php";
$sql="Select * from expenses";
$result=mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Expense tracker</title>
</head>
<body>
    <main>
        <section>
            <form action="add.php" method="post">
            <div class="mb-3">
                <label for="Categories">Categories:</label>
                <select class="form-select" aria-label="Default select example" name="entry" id="entry">
                <option selected>Open this select menu</option>
                    <option value="Food & Groceries">Food & Groceries</option>
                    <option value="Transportation">Transportation</option>
                    <option value="Entertainment & Leisure">Entertainment & Leisure</option>
                    <option value="Education">Education</option>
                    <option value="Housing & Wellness">Housing & Wellness</option> 
                </select>
                </div>
                <div class="mb-3">
                <label for="title">Title:</label>
                <input type="text"  name="title" id="title">
                </div>
                <div class="mb-3">
                <label for="">Amount:</label>
                <input type="text" name= "amount" id="amount"><br>
                </div>
                <div class="mb-3">
                <label for="description">Description:</label>
                <input type="text" name="description" id="description">
                </div>
                <div class="mb-3">
                <label for="expenses_date"> Expenses_Date: </label>
                <input type="date" name="expenses_date">
                <div class="mb-3">
                <button type="submit" class="btn btn-primary">Add Expenses </button>
            </form>
        </section>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Description</th>
                    <th scope="col">Expenses_Date</th>
                    <th scope="col">Created_At</th>
                    <th scope="col">Updated_At</th>
                    <th scope="col">Actions</th>

                    <!-- <th scope="col">Categories</th> -->
                </tr>
            </thead>
            <tbody>
            <?php
                 if(mysqli_num_rows($result)>0){
                 while($row=mysqli_fetch_assoc($result)){
                //echo $row['title'] ."".$row['amount']."".$row['description']."".$row['created_at']."".$row['updated_at']."<br>";
                echo "<tr>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['expenses_date'] . "</td>";
                echo "<td>" . $row['created_at'] . "</td>";
                echo "<td>" . $row['updated_at'] . "</td>";
                // echo "<td>" . $row['category_id'] . "</td>";
                echo "<td>
                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editModal" . $row['id'] . "'>Edit</button>
              </td>";
                echo "<td><a href='index.php?delete_id=" . $row['id'] . "' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";


                echo "<div class='modal fade' id='editModal" . $row['id'] . "' tabindex='-1' aria-labelledby='editModalLabel" . $row['id'] . "' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='editModalLabel" . $row['id'] . "'>Edit Expense</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            <form action='index.php' method='post'>
                                <input type='hidden' name='edit_id' value='" . $row['id'] . "'>
                                <div class='mb-3'>
                                    <label for='new_title'>Title:</label>
                                    <input type='text' name='new_title' id='new_title' value='" . $row['title'] . "'>
                                </div>
                                <div class='mb-3'>
                                    <label for='new_amount'>Amount:</label>
                                    <input type='text' name='new_amount' id='new_amount' value='" . $row['amount'] . "'>
                                </div>
                                <div class='mb-3'>
                                    <label for='new_description'>Description:</label>
                                    <input type='text' name='new_description' id='new_description' value='" . $row['description'] . "'>
                                </div>
                                <div class='mb-3'>
                                    <label for='new_expenses_date'>Expenses Date:</label>
                                    <input type='date' name='new_expenses_date' id='new_expenses_date' value='" . $row['expenses_date'] . "'>
                                </div>
                               
                                <button type='submit' class='btn btn-primary'>Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>";

    }
}
?>
            </tbody>
        </table>
  
 
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

