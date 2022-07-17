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
</style>";

// Attempt select query execution
$sql = "SELECT * FROM `addtocart`";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo "<h1>My Cart</h1>";
        $srno = 0;
        $finalbill = 0;
        echo '<table>';
        echo "<thead>";
        echo "<tr>";
        echo "<th>Sr No</th>";
        echo "<th>Food Item</th>";
        echo "<th>Price</th>";
        echo "<th>Quantity</th>";
        echo "<th>Total Price</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_array($result)) {
            $srno++;
            echo "<tr>";
            echo "<td>" . $srno . "</td>";
            echo "<td>" . $row['Food_Item'] . "</td>";
            echo "<td>" . $row['Price'] . "</td>";
            echo "<td>" . $row['Quantity'] . "</td>";
            echo "<td>" . $row['Price'] * $row['Quantity']. "</td>";
            $finalbill = $finalbill + $row['Price'] * $row['Quantity'];
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
        echo "<h1> Final Bill </h1>
        <p>Your Total Bill is : $finalbill </p>";
        $_SESSION['finalbill'] = $finalbill;
        echo"<form action='buy.html'><input type='submit' name='buy' value='Buy Now'></form>";
    } else {
        echo "<script>alert('Cart is Empty');
        window.history.back(1);
        </script>";
    }
} else {
    echo"<script>alert('Oops! Something went wrong. Please try again later.');
    window.history.back(1);
    </script>";
}

// Close connection
mysqli_close($link);
?>

