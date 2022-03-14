<?php
 $serverName = "mysql5030.site4now.net";
 $userName = "a83f2f_hoanex";
 $password = "Hoan8102001";
 $dbName = "db_a83f2f_hoanex";
 $conn = mysqli_connect($serverName, $userName, $password, $dbName);

?>
<?php
    if(isset($_GET['product_ID'])){
        $product_ID =  $_GET['product_ID'];
    }
?>
<?php
    $sql ="DELETE FROM `product` WHERE product_ID = $product_ID ";
    $result = mysqli_query($conn, $sql);
    header("location: myWeb.php");
?>