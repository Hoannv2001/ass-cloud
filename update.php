<?php
  session_start();
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
    if (isset($_POST['update'])) {

    $shop_name = $_POST['shop_name'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    if($shop_name != "" && $product_name != "" && $price != "" && $quantity != "" ){
        $sql = "UPDATE `product` SET `shop_name`='$shop_name',
        `product_name`='$product_name',`price`='$price',
        `quantity`='$quantity' WHERE `product_ID` = '$product_ID'";
        $result = mysqli_query($conn, $sql);
        header("location: myWeb.php");
        
    }}

?>
<?php
     $sql = "SELECT * FROM product WHERE product_ID = $product_ID";
     $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form method ="POST" action="">
  <div class="container">
    <h1>Update information of product</h1>
    <hr>

    <label ><b>Shop Name</b></label>
    <input type="text" placeholder="Enter Shop Name" name = "shop_name"  value = "<?php echo $row['shop_name'] ?>">

    <label ><b>Product Name</b></label>
    <input type="text" placeholder="Enter Product Name" name = "product_name"  value ="<?php echo $row['product_name'] ?>">

    <label ><b>Price</b></label>
    <input type="text" placeholder="Enter Price" name = "price"  value = "<?php echo $row['price'] ?>">
    <hr>
    <label ><b>Quantity</b></label>
    <input type="text" placeholder="Enter Quantity" name = "quantity"  value = "<?php echo $row['quantity'] ?>">
    <hr>

    <input name = "update" type="submit" class="registerbtn" value = "Update"></input>
  </div>
  

</form>

</body>
</html>
