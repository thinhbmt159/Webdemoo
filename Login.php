
<html>
<head>
	<title>Trang đăng nhập</title>
	<meta charset="utf-8">
</head>
<body>

	<form method="POST">
	<fieldset>
	    <legend>Đăng nhập</legend>
	    	<table>
	    		<tr>
	    			<td>Username</td>
	    			<td><input type="text" name="admin" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td>Password</td>
	    			<td><input type="password" name="123456" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td colspan="2" align="center"> <input name="submit" type="submit" value="Đăng nhập"></td>
	    		</tr>
	    	</table>
				
  </fieldset>
  </form>
  <?php
if (isset($_POST['submit'])){
	$un=$_POST['admin'];
	$pw=$_POST['123456'];

	if($un=='admin' && $pw=='123456'){
			header("location: menu.php");
			exit();
		}
		else
			echo "Invalid";
	}
?>
</body>
</html>