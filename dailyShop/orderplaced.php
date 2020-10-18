<?php

        require "config.php";

        session_start();
        if (isset($_SESSION['cartarray'])) {
            $cart=$_SESSION['cartarray'];
        } else {
            $cart=array();
        }

        $totalcartitems=0;
        $totalitemsprice=0;

        $sql5="SELECT * from cart";

        $result=$conn->query($sql5);
        if ($result->num_rows>0) {
        while ($row =$result->fetch_assoc()) {
        $totalcartitems=$totalcartitems+$row["quantity"];
        $totalitemsprice=$totalitemsprice+
        (($row["quantity"])*($row["price"]));
        }
        }  
        $sql="SELECT * from cart";
            $result=$conn->query($sql);
            if ($result->num_rows>0) {
                while ($row =$result->fetch_assoc()) {
                        $cartid=$row['cart_id'];
                        $productname=$row['name'];
                        $productprice=$row['price'];
                        $productimage=$row['image'];
                        $productquantity=$row['quantity'];
                        $newarray=array("cartid"=>$cartid,
                        "productname"=>$productname,
                        "productprice"=>$productprice,
                        "productimage"=>$productimage,
                        "productquantity"=>$productquantity
                        );
                        $_SESSION['cartarray']=$newarray;
                        array_push($cart, $_SESSION['cartarray']);
                }
                $_SESSION['cartarray']=$cart;
                $json= json_encode($_SESSION['cartarray']);
                $sql1="INSERT INTO orders (cartdata,datetime,carttotal,status) 
                VALUES ('".$json."',
                current_timestamp(),'".$totalitemsprice."','Pending') ";
                if ($conn->query($sql1)==true) {
                    echo "<div style='margin-top:70px'>";
                    echo "<center><h2>Order Placed</h2></center>";
                    echo "<center><h1>Thank You</h1></center>";
                    echo '<center><a class="add-to-cart" href="product.php"
                    name="anchortag">Continue Shopping</a></center>';
                    echo "</div>";
                    $sql3="SELECT * from cart";
                    $result1=$conn->query($sql3);
                    if ($result1->num_rows>0) {
                        while ($row1 =$result1->fetch_assoc()) {                  
                                $sql4="DELETE from cart WHERE cart_id='".$row1['cart_id']."'";
                                if ($conn->query($sql4)) {
                                }       
                        }
                    }
                }
                unset($_SESSION['cartarray']);
            } else {
                echo "<center><h1>Please Add atleast one product in cart.</h1></center>";
                echo "<center><h2>Order Not Placed</h2></center>";
                echo '<center><a class="add-to-cart" href="product.php"
                    name="anchortag">Go to shop to Order</a></center>';
            }
?>