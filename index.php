<?php 
    include'traiter.php';
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
 <title> Login Form in HTML5 and CSS3</title>
<link rel="stylesheet" type="text/css" href="css/util.css">
 <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
 <link rel="stylesheet" type="text/css" href="css/main.css">


</head>
<body>
 
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/img-07.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form" action="traiter.php" method="POST">
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
                                    <p>
                                        <?php         
                                        if(isset($_SESSION['username']))
                                        echo $_SESSION['message'];
                                        ?>
                                    </p>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
                                    <div class="container-login100-form-btn p-t-10">
                                        <a class="login100-form-btn" href="registrer.php" style="color:#e0e0e0;">
							register
						</a>
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