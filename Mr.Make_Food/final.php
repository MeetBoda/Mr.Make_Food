<?php
// Include config file
require_once "configure.php";
session_start();
echo "<style>
h1{ 
    text-align:center;
    font-family: 'Pacifico', cursive;
    background-color:black;
    color:white;
}
table {
    font-family: times new roman, sans-serif;
    border-collapse: collapse;
    width:100%;
}
th {
    border: 1px solid red;
    background-color:black;
    color:white;
    padding: 12px;
    font-family: 'Pacifico', cursive;
    font-size:25px;
}
td {
    border: 1px solid red;
    text-align: left;
    padding: 12px;
    font-size:25px;
    font-family: 'Pacifico', cursive;
}
    tr:nth-child(odd) {
    background-color:#fea116;
}
    tr:nth-child(even) {
    background-color:white;
}

p{
    font-size: 25px;
    margin-left: 50px;
    text-align:center;
    font-family: 'Pacifico', cursive;
}
input[type=submit]{
    font-size:25px;
    font-family: 'Pacifico', cursive;
    margin-left:47%;
}
button[type=submit]{
    background-color: #fea116;
    font-size:25px;
    border-radius:5px; 
    margin-left:47%;
  }
</style>";

// Attempt select query execution
$username = $_SESSION['username'];
$date = date("Y-m-d");
$sql = "SELECT * FROM `order_record` WHERE `Customer_name`='$username' AND `Order_Date`='$date'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo "<h1>Your Bill</h1>";
        $srno = 0;
        // $finalbill = 0;
        echo '<table>';
        echo "<thead>";
        echo "<tr>";
        echo "<th>Order_ID</th>";
        echo "<th>Customer Name</th>";
        echo "<th>Address</th>";
        echo "<th>Contact No</th>";
        echo "<th>Amount</th>";
        echo "<th>Payment Mode</th>";
        echo "<th>Order Date</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_array($result)) {
            $srno++;
            echo "<tr>";
            echo "<td>" . $row['Order_ID'] . "</td>";
            echo "<td>" . $row['Customer_name'] . "</td>";
            echo "<td>" . $row['Address'] . "</td>";
            echo "<td>" . $row['Phone_No'] . "</td>";
            echo "<td>" . $row['Amount'] . "</td>";
            echo "<td>" . $row['Payment_Mode'] . "</td>";
            echo "<td>" . $row['Order_Date'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "<br>";
        echo "<br>";
        // Free result set
        mysqli_free_result($result);
        // echo"<script>alert('Thank You, Visit Again! Happy Meal');
        // window.history.back(1);
        // </script>";
        $sql = "DELETE FROM `addtocart`";   
        $result = mysqli_query($link, $sql);
        echo"<h1>Thank You, Visit Again! Happy Meal</h1>";
        echo "<br>";
        echo "<br>";
        echo"<a href='index.php'><button type='submit'>Home</button></a>";
        
    } else {
        echo "<script>alert('Order not Found');
        window.history.back(1);
        </script>";
    }
} else {
    echo"<script>alert('Oops! Something went wrong. Please try again later.');
    window.history.back(1);
    </script>";
}
//header("Location: index.php");
// Close connection
mysqli_close($link);
?>

