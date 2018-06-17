<?php
$username = "root";
$password = "";
$hostname = "localhost";

$dbhandle = mysql_connect($hostname, $username, $password) or die("Could not connect to database");

$selected = mysql_select_db("newproduct", $dbhandle);

if(isset($_POST['name']) && isset($_POST['quantity'])){
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];

    $query = mysql_query("SELECT * FROM product WHERE productname='$name'");
    if(mysql_num_rows($query) > 0 ) { //check if there is already an entry for that username
        echo "productname already exists!";
    }else{
        mysql_query("INSERT INTO product (productname, productquantity) VALUES ('$name','$quantity')");
        header("location:index.php");
    }
}
mysql_close();
?>

<html>
<body>
<h1>Adding Product!</h1>
<form action="product.php" method="POST">
    <p>Product Name:</p><input type="text" name="name" />
    <p>Product Quantity:</p><input type="text" name="quantity" />
    <br />
    <input type="submit" value="inserted" />
</form>
</body>
</html>