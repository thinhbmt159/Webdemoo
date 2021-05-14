<?php
    require "db.php";
?>
<?php
    if(isset($_POST["add"])){
        $name = $_POST["name"];
        $code = $_POST["code"];
        $price = $_POST["price"];
        $image = $_POST["image"];

        if($Name == ""){echo "Please enter product name <br />";}
        if($Code == ""){echo "Please enter product code <br />";}
        if($Price == ""){echo "Please enter product price <br />";}
        if($Image == ""){echo "Please enter product image <br />";}

        if($name != "" && $code != "" && $price != "" && $image != ""){
            $sql = "INSERT INTO products(name,code,price,image) VALUES('$name', '$code', '$price', '$image')";
            $qr = mysqli_query($con,$sql);
            header("location: index.php");
        }
    }
?>
<form method="POST" action="">
    <label >Name</label><input type="text" name="name" /><br /><br />
    <label >Code</label><input type="text" name="code" /><br /><br />
    <label >Price</label><input type="text" name="price" /><br /><br />
    <label >Image</label><input type="file" alt="SUBMIT" name="image" /><br /><br />
    <input type="submit" name = "add" value= "Add" />
</form>