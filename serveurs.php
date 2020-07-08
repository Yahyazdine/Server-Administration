<?php
$server='127.0.0.1';
$user="root";
$password='';
$datbase='test';
$connect= mysqli_connect($server,$user,$password,$datbase);
if (mysqli_connect_errno()) {
    die("cannot connect to database".mysqli_connect_errno());
}       
?>


<!DOCTYPE html>
<html>
<head>
	<title>Serveurs</title>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
</head>

<body style="background-color: #e5e5e5;">

	<nav class="sidebar">
		<div class="sidebar-head"></div>
		<div class="sidebar-body">
			<ul>
				<li><a href="accueil.php"><i class="fa fa-home"></i>Accueil</a></li>
				<li><a href="" class="active"><i class="fa fa-server"></i>Serveurs</a></li>
				<li><a href=""><i class="fa fa-users"></i>Utilisateurs</a></li>
			</ul>

		</div>
	</nav>

	

	<div class="page-container">
		<nav class="navbar navbar-expand-sm fixed-top">
			<div class="navbrand">
				<a href="" class="btn">
					<i class="fa fa-user" style="font-size: 25px;"></i>
					<span style="font-size: 18px;">Nom d'utilisateur</span>
				</a>
			</div>
			<div class="nav-item ml-auto">
				<div class="profil">
					<div class="item mr-4">
						<a href="" class="btn" style="color:#f52a0f;font-size: 16px;">
							<i class="fa fa-sign-out"></i> déconnecter
						</a>
					</div>
				</div>
				

			</div>
		</nav>

		<div class="contenu">
			<div class="container">
				<div class="row mb-3 mt-4">
        			<div class="col-md-6"><h4>Serveurs</h4></div>
        			<div class="col-md-6 text-right">
        				<a href="ajouter.php" class="btn btn-primary" type="button" role="button">
        					<i class="fa fa-plus"></i> Ajouter un serveur
        				</a>
        			</div>
    			</div>
    			<hr width="100%">
				<div class="container">
					
					<div class="row border mt-4 mb-4 mx-auto bg-white" style="width: 800px;">
						<div class="col-md-4 bg-success">
							<center style="height:100%;margin-top: 40px;"><H4>Serveur 1</H4></center>
						</div>
						<div class="col-md-7 h-100 pl-0 pr-0">
							<table class="table table-striped w-100 mb-0">
 								<tr>
 									<td><b>@IP : </b></td>
 									<td>115.111.111.1</td>
 								</tr>
 								<tr>
 									<td><b>@MAC : </b></td>
 									<td>A5:63:38:30</td>
 								</tr>
 								<tr>
 									<td><b>Etat : </b></td>
 									<td class="text-success">UP</td>
 								</tr>
							</table>
						</div>
						<div class="col-md-1 pt-3 border">
							<div>
								<a href=""  class="btn" style="color:#d62a13;" data-toggle="tooltip" data-placement="top" title="Supprimer">
									<i class="fa fa-trash"></i>
								</a>
							</div>
							<div>
								<a href=""  class="btn" style="color: #12b51d;" data-toggle="tooltip" data-placement="top" title="Modifier">
									<i class="fa fa-edit"></i>
								</a>
							</div>
							<div>
								<a href="détails-serveur.php"  class="btn" style="color: #0066ff;" data-toggle="tooltip" data-placement="top" title="Voir détails">
									<i class="fa fa-angle-double-right"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="row border mt-4 mb-4 mx-auto bg-white" style="width: 800px;">
						<div class="col-md-4 bg-danger">
							<center style="height:100%;margin-top: 40px;"><H4>Serveur 2</H4></center>
						</div>
						<div class="col-md-7 h-100 pl-0 pr-0">
							<table class="table table-striped w-100 mb-0">
 								<tr>
 									<td><b>@IP : </b></td>
 									<td>115.111.111.1</td>
 								</tr>
 								<tr>
 									<td><b>@MAC : </b></td>
 									<td>A5:63:38:30</td>
 								</tr>
 								<tr>
 									<td><b>Etat : </b></td>
 									<td class="text-danger">DOWN</td>
 								</tr>
							</table>
						</div>
						<div class="col-md-1 pt-3 border">
							<div>
								<a href=""  class="btn" style="color:#d62a13;" data-toggle="tooltip" data-placement="top" title="Supprimer">
									<i class="fa fa-trash"></i>
								</a>
							</div>
							<div>
								<a href=""  class="btn" style="color: #12b51d;" data-toggle="tooltip" data-placement="top" title="Modifier">
									<i class="fa fa-edit"></i>
								</a>
							</div>
							<div>
								<a href=""  class="btn" style="color: #0066ff;" data-toggle="tooltip" data-placement="top" title="Voir détails">
									<i class="fa fa-angle-double-right"></i>
								</a>
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

	<script type="text/javascript">
		$(function () {
        $('[data-toggle="tooltip"]').tooltip()
      });
	</script>

</body>
</html>