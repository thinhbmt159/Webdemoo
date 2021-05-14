<?php
/*
Author: CTTHANH
Website: https://ctthanh.com
*/
session_start();
include('db.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($con,"SELECT * FROM `products` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];
$description = $row['description'];
$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image,
	'description'=>$description)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Toy Store</title>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>

<style type="text/css">
	.wrapper{
		width: 100%;
		max-width: 1280px;
		margin: 0 auto;
	}
	#wrapper{
		overflow: hidden;
		background-color: #666;
		margin: 0;
		padding: 0;
	}
	#wrapper ul{
		margin: 0;
		padding: 0;
	}
	.align-justify-center{
		display: flex;
		align-items: center;
		justify-content: space-between;
	}
	.btn{
		padding: 12px 18px;
		border-radius: 5px;
	}
	.btn-success{
		background-color: #4a79ff;
		color: #fff;
		font-weight: bold;
		text-decoration: none;
	}
	.product-list{
		margin: 50px auto;
		overflow: hidden;
	}
	.header{
		height: 60px;
	}
	.header h2{
		font-size: 24px;
	}
	.product_wrapper{
		width: calc(20% - 20px);
		float: left;
		margin: 0 10px;
	}
	.image{
		display: flex;
		justify-content: center;
	}
	
</style>
<meta charset="utf-8" />
    <meta name="author" content="Script Tutorials" />
    <title>Stylish responsive footer | Script Tutorials</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
    <!-- css font and stylesheet -->
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
	<div class="align-justify-center header wrapper">
		<h2>Toy Store</h2>    
		<div class="row">
			<a href="Login.php" class="btn btn-success">Login</a>
		</div> 
	</div>
	<div id='wrapper'>
		<?php include('navi.php');
		 ?>
	</div>
				<?php
					if(!empty($_SESSION["shopping_cart"])) {
					$cart_count = count(array_keys($_SESSION["shopping_cart"]));
				?>
				<div class="cart_div">
					<a href="cart.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
				</div>
				<?php
					}
					$result = mysqli_query($con,"SELECT * FROM `products`");
					while($row = mysqli_fetch_assoc($result)){
						echo "<div class='product_wrapper'>
							  	<form method='post' action=''>
								  	<input type='hidden' name='code' value=".$row['code']." />
								  		<div class='image'><img src='product-images/".$row['image']."' /></div>
								  		<div class='name'>".$row['name']."</div>
							   	  		<div class='price'>$".$row['price']."</div>
										<div class='description'>".$row['description']."</div>
								  	<button type='submit' class='buy'>Buy Now</button>
							  	</form>
						   	  </div>";
							
				    }
					mysqli_close($con);
				?>

			</div>
		</div>


	<div style="clear:both;"></div>

	<div class="message_box" style="margin:10px 0px;">
	<?php echo $status; ?>
	</div>
	
	
	</div>
	
</body>
</html>
<?php include 'footer.php' ?>
