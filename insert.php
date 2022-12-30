<?php
    $conn = mysqli_connect("localhost", "root", "", "google_geocoding");
         
    if($conn === false){
        die("ERROR: Could not connect. ". mysqli_connect_error());
    }
         
    $shopName   = $_POST['shop_name']; 
    $longitude  = $_POST['shop_lng'];                              
    $latitude   = $_POST['shop_lat'];
    $link       = $_POST['shop_type'];
    $address    = $_POST['shop_address'];
        
    $sql = "INSERT INTO shops (shop_name,shop_lng,shop_lat,shop_type,shop_address) VALUES ('$shopName','$longitude','$latitude','$link','$address')";
        
    if(mysqli_query($conn, $sql)){
        header("Location: myshop.php");
    } else{
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }
    mysqli_close($conn);
?>