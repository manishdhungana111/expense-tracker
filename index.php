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
    <title>Expense tracker</title>
</head>
<body>
    <main>
        <section>
            <form action="add.php" method="post">
                <label for="Categories">Categories:</label>
                <select name="entry" id="entry">
                    <option value="Food & Groceries">Food & Groceries</option>
                    <option value="Transportation">Transportation</option>
                    <option value="Entertainment & Leisure">Entertainment & Leisure</option>
                    <option value="Education">Education</option>
                    <option value="Housing & Wellness">Housing & Wellness</option> 
                </select>
                <label for="title">Title:</label>
                <input type="text"  name="title" id="title">
                <label for="">Amount</label>
                <input type="text" name= "amount" id="amount"><br>
                <label for="description">Description:</label>
                <input type="text" name="description" id="description">
                <label for="expenses_date"> Expenses_Date: </label>
                <input type="date" name="expenses_date">
                <button type="submit">Add Expenses </button>
            </form>
        </section>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Expenses_Date</th>
                    <th>Created_At</th>
                    <th>Updated_At</th>
                    <th>Categories</th>
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
                echo "<td>" . $row['category_id'] . "</td>";
                echo "</tr>";
    }
}
?>
            </tbody>
        </table>
  
 
    </main>
</body>
</html>

