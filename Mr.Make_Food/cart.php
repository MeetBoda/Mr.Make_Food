<?php
include "configure.php";
session_start();
function itemname($itemno){
    if($itemno == 1){
        $name = "Manchurian & Noodles";
    }
    else if($itemno == 2){
        $name = "Burger";
    }
    else if($itemno == 3){
        $name = "Chole Bhature";
    }
    else if($itemno == 4){
        $name = "Dabeli";
    }
    else if($itemno == 5){
        $name = "Dosa";
    }
    else if($itemno == 6){
        $name = "Pizza";
    }
    else if($itemno == 7){
        $name = "Pavbhaji";
    }
    else if($itemno == 8){
        $name = "Idli Sambhar";
    }
    return $name;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // $username = $_SESSION['username'];
    $itemno = $_POST["itemno"];
    if(isset($_POST['addtocart'])) {
        $name = itemname($itemno);
        // Check whether this item exists
        $existSql = "SELECT * FROM `addtocart` WHERE `Food_Item` = '$name'";
        $result = mysqli_query($link, $existSql);
        $numExistRows = mysqli_num_rows($result);
        if($numExistRows > 0){
            $row = mysqli_fetch_assoc($result);
            $quantity = $row['Quantity'];
            $quantity++;
            $sql = "UPDATE `addtocart` SET `Quantity`='$quantity' WHERE `Food_Item` = '$name'";   
            $result = mysqli_query($link, $sql);
            echo "<script>alert('Item Added to Cart Again.');
                    window.history.back(1);
                    </script>";
        }
        else{
            $squel = "SELECT * FROM `fooditem` WHERE `Itemno`=$itemno";
            $result = mysqli_query($link, $squel);
            $row = mysqli_fetch_assoc($result);
            $price = $row['Price'];
            $quantity = 1;
            $sql = "INSERT INTO `addtocart` (`Food_Item`, `Price`,`Quantity`) VALUES ('$name', '$price','$quantity')";   
            $result = mysqli_query($link, $sql);
            if ($result){
                echo "<script>alert('Item Added to Cart.');
                    window.history.back(1);
                    </script>";
            }
        }
    }
    if(isset($_POST['removeItem'])) {
        $name = itemname($itemno);
        $existSql = "SELECT * FROM `addtocart` WHERE `Food_Item` = '$name'";
        $result = mysqli_query($link, $existSql);
        $numExistRows = mysqli_num_rows($result);
        if($numExistRows == 0){
            echo "<script>alert('Item is not there in Cart');
                window.history.back(1);
            </script>";
        }
        else{
            $row = mysqli_fetch_assoc($result);
            $quantity = $row['Quantity'];
            if($quantity == 1){
                $sql = "DELETE FROM `addtocart` WHERE `Food_Item`='$name'";   
                $result = mysqli_query($link, $sql);
                echo "<script>alert('Item removed from Cart');
                    window.history.back(1);
                </script>";
            }
            else{
                $quantity--;
                $sql = "UPDATE `addtocart` SET `Quantity`='$quantity' WHERE `Food_Item` = '$name'";   
                $result = mysqli_query($link, $sql);
                echo "<script>alert('Item Quantity has been reduced.');
                    window.history.back(1);
                    </script>";
            }
        }
    }
}
$link->close();
?>