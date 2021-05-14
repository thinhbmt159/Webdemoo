
<?php
require "db.php";
if(isset($_GET["id"])){
    $id = $_GET["id"];
}
    if(isset($_POST["edit"])){
        $id = $_POST["id"];
        $name = $_POST["name"];
        $code = $_POST["code"];
        $price = $_POST["price"];
        $image = $_POST["image"];
        $description = $_POST["description"];
        if($name != "" && $code != "" && $price != "" && $image != "" && $description != ""){
            $sql = "UPDATE products SET name = '" . $name . "' , code = '" . $code . "' , price ='" . $price . "' , image ='" . $image . "', description ='" .$description . "'
            WHERE id = '" . $id . "'";
            $qr = mysqli_query($con,$sql);
            header("location: menu.php");
        }
    }
?>
<?php
    $sql = "SELECT * FROM `products` WHERE id = '" . $id . "'";
    $qr = mysqli_query($con,$sql);
    $rows = mysqli_fetch_array($qr);

echo '
<form method="POST" action="">
    <input type="hidden" name="id" value="'. $rows['id'] .'">
    <label >Name</label><input type="text" name="name" value="' . $rows['name'] . '"><br /><br />
    <label >Code</label><input type="text" name="code" value="' . $rows['code'] . '"><br /><br />
    <label >Price</label><input type="text" name="price" value="' . $rows['price'] . '"><br /><br />
    <label >Image</label><input type="file" alt="SUBMIT" name="image" value="' .  $rows['image'] . '"><br /><br />
    <label >Description</label><input type="text" name="description" value="' . $rows['description'] . '"><br /><br />
    <input type="submit" name = "edit" value= "Edit" />
</form>
';
?>