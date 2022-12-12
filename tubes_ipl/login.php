<?php
	session_start();
	require "koneksi.php"
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Log In</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="main">
    <div class="div-content">
      <h1>Login</h1>
    <div class="div-box">
    	<form action="" method="post">
        <div>
          <label for="email">Email</label>
          <input type="email" name="email" id="email" autocomplete="off">
        </div>
        <div>
          <label for="password">Password</label>
          <input type="password" name="password" id="password">
        </div>
        <div>
          <input type="submit" name="submit" value="Log In">
        </div>
        <label>Don't Have an Account? <a href="register.php">Register</a></label>
      </form>

      <?php 
      	if (isset($_POST['submit'])) {
      		$email = htmlspecialchars($_POST['email']);
      		$password = htmlspecialchars($_POST['password']);


      		$query = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");
      		$count = mysqli_num_rows($query);
      		if($count > 0){
      			$data = mysqli_fetch_array($query);
      			if (password_verify($password, $data['password'])) {
      				$_SESSION['logged_in'] = true;
      				$_SESSION['email'] = $data['email'];

      				header("location: index.php");
      			} else {
      				echo "Password salah";
      			}
      		} else {
      			echo "Email tidak terdaftar";
      		}
      	}

      ?>
    </div>
    </div>
</div>
</body>
</html>