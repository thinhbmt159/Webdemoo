<?php
    require "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage</title>
</head>
<body>
    <h2 align="center">Admin Manage product</h2>
    <table border="1" align="center">
        <tr>
            <th>Name</th>
            <th>Code</th>
            <th>Price</th>
            <th>Image</th>
            <th>Description</th>
        </tr>
        
        <?php
    if(isset($_POST["add"])){
        $name = $_POST["name"];
        $code = $_POST["code"];
        $price = $_POST["price"];
        $image = $_POST["image"];
        $description = $_POST["description"];
        if($name == ""){echo "Please enter product name <br />";}
        else{$sql="select * from cart where products='$name'";
					$kt=mysqli_query($conn, $sql);}
        if($code == ""){echo "Please enter product code <br />";}
        else{$sql="select * from cart where products='$code'";
					$kt=mysqli_query($conn, $sql);}
        if($price == ""){echo "Please enter product price <br />";}
        else{$sql="select * from cart where products='$price'";
					$kt=mysqli_query($conn, $sql);}
        if($image == ""){echo "Please enter product image <br />";}
        else{$sql="select * from cart where products='$image'";
					$kt=mysqli_query($conn, $sql);}
        if($description == ""){echo "Please enter product description <br />";}
        else{$sql="select * from cart where products='$description'";
                    $kt=mysqli_query($conn, $sql);}
          if($name != "" && $code != "" && $price != "" && $image != "" && $description != ""){
            $sql = "INSERT INTO products(name,code,price,image,description) VALUES('$name', '$code', '$price', '$image', '$description')";
            $qr = mysqli_query($con,$sql);
            
        }
    }
?>
<form method="POST" action="">
    <label >Name</label><input type="text" name="name" /><br /><br />
    <label >Code</label><input type="text" name="code" /><br /><br />
    <label >Price</label><input type="text" name="price" /><br /><br />
    <label >Image</label><input type="file" alt="SUBMIT" name="image" /><br /><br />
    <label >Description</label><input type="text" name="description" /><br /><br />
    <input type="submit" name = "add" value= "Add" />
</form>
        <?php
            $sql = "SELECT * FROM products";
            $qr = mysqli_query($con,$sql);
            while($row = mysqli_fetch_array($qr)){
                $s = '
                    <tr>
                        <td>' . $row["name"] . '</td>
                        <td>' . $row["code"] . '</td>
                        <td>' . $row["price"] . '</td>
                        <td>' . $row["image"] . '</td>
                        <td>' . $row["description"]. '</td>
                        <td>
                            <a href="product_edit.php?id=' . $row['id'] . '">Edit</a>
                            |
                            <a href="product_delete.php?id=' . $row['id'] . '">Delete</a>
                        </td>
                    </tr>
                ';
                echo $s;
            }
        ?>
    </table>
    <p>
        <a href = "login.php">Exit</a>
    </p>
</body>
</html>