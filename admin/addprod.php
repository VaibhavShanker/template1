
<?php

require 'config.php';
$error=array();
if (isset($_POST['submit'])) {
    $name=isset($_POST['name'])?$_POST['name']:'';

    $price=isset($_POST['price'])?$_POST['price']:'';
    $image=isset($_POST['image'])?$_POST['image']:'';
    $select=isset($_POST['dropdown'])?$_POST['dropdown']:'';
    $textfield=isset($_POST['textfield'])?$_POST['textfield']:'';
    $short=isset($_POST['short'])?$_POST['short']:'';


    if ($name=="" || $price=="" || $textfield=="" || $short=="" || !empty($_POST['image'])) {
        $error[]=array("id"=>'form','msg'=>"Field cant be empty");
    }
    if ($select=="Select") {
        $error[]=array("id"=>'form','msg'=>"Please select Catelogy");
    }
     
    $arr=array();
         

    if (!empty($_POST['check_list'])) {
        foreach ($_POST['check_list'] as $selected) {
            array_push($arr, $selected);
        }
        $jsonarr=json_encode($arr);
        
        
    } else {
        $error[]=array("id"=>'form','msg'=>"Field cant be empty");
    }

    $filename = $_FILES["image"]["name"]; 
    $tempname = $_FILES["image"]["tmp_name"];     
        $folder = "images/".$filename; 
        
    if (count($error)==0) {

        $sql = "INSERT INTO products 
        (category_id, name, price, image, short_description, long_description)
        VALUES ('".$select."', '".$name."', '".$price."', '".$filename."', 
    '".$short."',  '".$textfield."')";



        if ($conn->query($sql) === true) {
            echo "<center>New record created Successfully </center><br>";
            if (move_uploaded_file($tempname, $folder)) { 
                echo "<center>Image uploaded Successfully</center><br><br>"; 
                echo "<center><a href='addproduct.php'>
                <u>Go back to add new product</u></a></center>";
            } else { 
                echo "Failed to upload image"; 
            } 

         

        } else {

        } 
    }   
}
?>