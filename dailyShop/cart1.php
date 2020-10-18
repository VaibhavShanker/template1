<?php
session_start();
require "config.php";
$cal="img/women";
$b=1;
$counta=0;
echo $_GET['id'];
$id=$_GET['id'];

    $sql="SELECT * from products ";
    $result=$conn->query($sql);
    if ($result->num_rows>0) {
        while ($row =$result->fetch_assoc()) {
            if ($row['product_id']==$_GET['id']) {
                $productname=$row['name'];
                $productprice=$row['price'];
                $productimage=$row['image'];
                $productid=$row['product_id'];
                $sql2="SELECT * from cart";
                $result1=$conn->query($sql2);
                if ($result1->num_rows>0) {
                    while ($row1 =$result1->fetch_assoc()) {
                        if ($row1["name"]==$productname && $row1["image"]==$productimage) {
                            $c=$row1['quantity']+1;
                            $sql3="UPDATE cart SET
                            quantity='".$c."'
                            WHERE cart_id='".$row1['cart_id']."'";
                            if ($conn->query($sql3)) {
                                echo "quantity increased.";
                                $counta++;
                            }
                        }                    
                    }
                    if ($counta==0) {
                        $sql1="INSERT INTO cart (image,name,price,quantity)
                            VALUES ('".$productimage."','".$productname."','".$productprice."',1)";
                        if ($conn->query($sql1)==true) {
                        echo "successfully added in cart";
                        }
                    }                
                } else {
                    $sql4="INSERT INTO cart (image,name,price,quantity)
                            VALUES ('".$productimage."','".$productname."','".$productprice."',1)";
                    if ($conn->query($sql4)==true) {
                        echo "successfully added in cartbox";
                    }
                    break;
                }
            }
        }
        header("Location:product.php");       
    }
?>