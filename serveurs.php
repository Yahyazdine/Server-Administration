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
	<title>Serveurs</title>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body style="background-color: #e5e5e5;">

	<nav class="sidebar">
		<div class="sidebar-head"><div class="row">
				<div class="col-md-4 mx-auto">
				<img src="images/logo.jpeg" class="w-100">
				</div>
				
			</div></div>
		<div class="sidebar-body">
			<ul>
				<li><a href="accueil.php"><i class="fa fa-home"></i>Accueil</a></li>
				<li><a href="" class="active"><i class="fa fa-server"></i>Serveurs</a></li>
				
			</ul>

		</div>
	</nav>

	

	<div class="page-container">
		<nav class="navbar navbar-expand-sm fixed-top">
			<div class="navbrand">
				<a href="user_name.php" class="btn">
					<i class="fa fa-user" style="font-size: 25px;"></i>
					<span style="font-size: 18px;"><?php echo $nom?></span>
				</a>
			</div>
			<div class="nav-item ml-auto">
				<div class="profil">
					<div class="item mr-4">
						<a href="logout.php" class="btn" style="color:#f52a0f;font-size: 16px;">
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
				
					<?php 
						class MyDB extends SQLite3
						{
							function __construct()
							{
								$this->open('Servers.db');
							}
						}

							$db = new MyDB();
							$sql = 'select * from info_server';						
							$rs=$db->query($sql);
							while($row =$rs->fetchArray())
							{
								?>
								
						
					
					<div class="row border mt-4 mb-4 mx-auto bg-white" style="width: 800px;">
					<?php if ($row['state']=='up'){
										 ?>
						<div class="col-md-4 bg-success">
							<center style="height:100%;margin-top: 40px;"><H4><?php echo $row['serveur_name'] ?></H4></center>
						</div> <?php  } 
						else{  ?>
						<div class="col-md-4 bg-danger">
							<center style="height:100%;margin-top: 40px;"><H4><?php echo $row['serveur_name'] ?></H4></center>
						</div> <?php  } ?>

						<div class="col-md-7 h-100 pl-0 pr-0">
							<table class="table table-striped w-100 mb-0">
 								<tr>
 									<td><b>@IP : </b></td>
 									<td><?php echo $row['user_ip']?></td>
 								</tr>
 								<tr>
 									<td><b>@MAC : </b></td>
 									<td><?php echo $row['server_mac']?></td>
 								</tr>
 								<tr>
 									<td><b>Etat : </b></td>
									 <?php if ($row['state']=='up'){
										 ?>
 									<td class="text-success"><?php echo $row['state']?></td>
 								</tr>
									 <?php }
									 else{
									 ?>
									 <td class="text-danger"><?php echo $row['state']?></td>
 								</tr>
								<?php }
								 ?>

							</table>
						</div>
						
						
						<div class="col-md-1 pt-3 border">
							<div>
								<a href=""  class="btn" style="color:#d62a13;" data-toggle="modal" data-target="#modal<?php echo $row['serveur_name'] ?>" data-placement="top" title="Supprimer">
									<i class="fa fa-trash"></i>
								</a>
							</div>
							<div class="modal fade" id="modal<?php echo $row['serveur_name'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title text-danger" id="exampleModalLabel">Attention !</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                        Voulez vous vraiment supprimer cet utilisateur ?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="supprimer_server.php?id=<?php echo $row['serveur_name'] ?>" class="btn btn-danger">Continuer</a>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
							<div>
								<a href="modifier_serveur.php?id=<?php echo $row['serveur_name'] ?>"  class="btn" style="color: #12b51d;" data-toggle="tooltip" data-placement="top" title="Modifier">
									<i class="fa fa-edit"></i>
								</a>
							</div>
							
							<div>
								<a href="détails-serveur.php?id=<?php echo $row['serveur_name'] ?>"  class="btn" style="color: #0066ff;" data-toggle="tooltip" data-placement="top" title="Voir détails">
									<i class="fa fa-angle-double-right"></i>
								</a>
							</div>
						</div>
					</div>
			
						<?php
						}
											
							
					?>
					
					
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



