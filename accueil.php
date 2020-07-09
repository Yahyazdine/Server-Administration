<?php 

if(!session_id()){ session_start();}

if (!isset($_SESSION['username'])){
	header("Location: index.php");
		
	}



?>
<?php 
include'traiter.php';
$sql="select * from user ";
$result= mysqli_query($connect,$sql);

$ligne= mysqli_fetch_row($result);
$nom=$ligne[1];
 

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Accueil</title>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body style="background-color: #e5e5e5;">

	<nav class="sidebar">
		<div class="sidebar-head">
			<div class="row">
				<div class="col-md-4 mx-auto">
				<img src="images/logo.jpeg" class="w-100">
				</div>
				
			</div>
		</div>
		<div class="sidebar-body">
			<ul>
				<li><a href="" class="active"><i class="fa fa-home"></i>Accueil</a></li>
				<li><a href="serveurs.php"><i class="fa fa-server"></i>Serveurs</a></li>
			</ul>

		</div>
	</nav>

	

	<div class="page-container">
		<nav class="navbar navbar-expand-sm fixed-top">
			<div class="navbrand">
				<a href="user_name.php">
					<i class="fa fa-user" style="font-size: 25px;"></i>
					<span style="font-size: 18px;"><?php echo $nom?></span>
				</a>
			</div>
			<div class="nav-item ml-auto">
				<div class="profil">
					<div class="item mr-4">
						<a href="logout.php" style="font-size: 16px;"><i class="fa fa-sign-out"></i> déconnecter</a>
					</div>
				</div>
				

			</div>
		</nav>

		<div class="contenu">
			<div class='continer' > 
				<img src="images/accueil.jpg" class="w-100 h-100">
				
			</div>
				


		</div>
	</div>



	<script src="js/jquery-3.5.0.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap.js"></script>

</body>
</html>