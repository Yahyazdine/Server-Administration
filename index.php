
<?php
 include'traiter.php';
 
if(isset($_POST['login'])){
    if(!session_id()){ session_start();}
    $username= mysqli_real_escape_string($connect,$_POST['username']);
    
    $pass=mysqli_real_escape_string($connect,$_POST['password']);
    $pass= md5($pass);
    
    $sql="select * from user where username='".$username."'AND password='".$pass."' limit 1";
    
    $result= mysqli_query($connect,$sql);
    if(mysqli_num_rows($result)==1){
		  
		$_SESSION['username']=$username;
            header("Location: accueil.php");
         exit();        
    }
    else{
      header("Location: index.php");
        exit();
    }
    
    
        
}
?>
<?php
mysqli_close($connect);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Authentification</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body style="background-color: #e5e5e5;">

	<div class="container">
		<div class="row" style="margin-top: 80px;">
			<div class="col-md-10 mx-auto">
				<div class="row">
					<div class="col-md-6  pl-0 pr-0" style="background-image:url('images/cyber-security.jpeg');">
						
					</div>
					<div class="col-md-6 bg-white" style="height: 500px;">
						<div class="row">
							<div class="col-md-4 mx-auto">
								<img src="images/logo.jpeg" class="w-100 h-100">
							</div>
						</div>
						<div class="row">
							<div class="col-md-10 mx-auto" >
								<form class="form" method="POST" action="index.php">
									<div class="form-row form-group">
        							    <div class="col-md-10 mx-auto">
        									<input class="input" type="text" name="username" required>
        							    	<label for="name" class="label label-name">
        							    		<span class="content-name"><i class="fa fa-user"></i> Username</span>
        							    	</label>
        							    </div>
        							</div>
							
        							<div class="form-row form-group">
        							    <div class="col-md-10 mx-auto ">
        									<input class="input" type="password" name="password" required>
        							    	<label for="name" class="label label-name">
        							    	    <span class="content-name"><i class="fa fa-lock"></i> Password</span>
        							    	</label>
        							    </div>
        							</div>
        							<div class="form-row form-group mt-4">
        							    <div class="col-md-10 mx-auto ">
        							    	<button type="submit" name="login" class="btn w-100" style="background-color:#5FA8D3;" title="login">
        							    		<b>LOGIN</b>
        							    	</button>
        							    </div>
        							</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="js/jquery-3.5.0.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap.js"></script>

</body>
</html>