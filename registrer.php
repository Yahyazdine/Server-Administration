<?php
$server='127.0.0.1';
$user="root";
$password='';
$datbase='login';
$connect= mysqli_connect($server,$user,$password,$datbase);
if (mysqli_connect_errno()) {
    die("cannot connect to database".mysqli_connect_errno());
}       
?>
<?php
if(isset($_POST['ok']) ){
    session_start();
    $username= mysqli_real_escape_string($connect,$_POST['username']);
    $pass=mysqli_real_escape_string($connect,$_POST['pass']);
    $pass= md5($pass);
    $pass2=mysqli_real_escape_string($connect,$_POST['pass2']);
    $pass2= md5($pass2);
    $adminpass=mysqli_real_escape_string($connect,$_POST['adminpass']);
    $adminpass= md5($adminpass);
    
    $sql="insert into user(username,password)values('kaka','kaka')";
    mysqli_query($connect,$sql);
    $_SESSION['message']='you are now logged in';
    $_SESSION['username']=$username;
    header("Location: index.php");
    }

?>
<?php
mysqli_close($connect);
?>
<!DOCTYPE html>
<html>
<head>
 <title> Login Form in HTML5 and CSS3</title>
<link rel="stylesheet" type="text/css" href="css/util.css">
 <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
 <link rel="stylesheet" type="text/css" href="css/main.css">


</head>
<body>
 
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/img-07.jpg');">
			<div class="wrap-login100 p-b-30">
				<form class="login100-form validate-form" action="register.php" method="POST">
					<div class="login100-form-avatar">
						
					</div>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>
                                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="pass2" placeholder="confirm Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>
                                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="adminpass" placeholder="Password's admin">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>


					<div class="container-login100-form-btn p-t-10">
                                            <input type="submit" name="ok" value="ok">
					</div>
                                   
					

										
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
        <script src="jquery/jquery-3.2.1.min.js"></script>
      < <script src="js/main.js"></script>
<script src="bootstrap/js/popper.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>