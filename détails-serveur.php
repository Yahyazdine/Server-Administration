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
$nom1=$ligne[1];
 

?>
<?php 

$srv= $_GET['id'];
						class MyDB extends SQLite3
						{
							function __construct()
							{
								$this->open('Servers.db');
							}
						}

							$db = new MyDB();
							$sql = "select * from info_server where serveur_name='".$srv."'";						
                            $rs=$db->query($sql);
                            $row =$rs->fetchArray();
							$sqldd = "select * from info_DD where servers_name='".$srv."'";						
                            $rsdd=$db->query($sqldd);
                            $rowd =$rsdd->fetchArray();
							$sqlram = "select * from state_memory where servers_name='".$srv."'";						
                            $rsram=$db->query($sqlram);
                            $rowram =$rsram->fetchArray();
							$sqluser = "select * from info_user where servers_name='".$srv."'";						
                            $rsuser=$db->query($sqluser);

                            
							
								?>
<!DOCTYPE html>
<html>
<head>
	<title>Details Serveur</title>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css">
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
				<li><a href="serveurs.php" class="active"><i class="fa fa-server"></i>Serveurs</a></li>
			
			</ul>

		</div>
	</nav>

	

	<div class="page-container">
		<nav class="navbar navbar-expand-sm fixed-top">
			<div class="navbrand">
				<a href="user_name.php" class="btn">
					<i class="fa fa-user" style="font-size: 25px;"></i>
					<span style="font-size: 18px;"><?php echo $nom1?></span>
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
        			<div class="col-md-6"><h4>Détails du serveur</h4></div>
        			<div class="col-md-6 text-right">
        				<a href="javascript:history.back()" class="btn btn-danger"role="button">
        					<i class="fa fa-chevron-circle-left"></i><b> Retour</b>
						</a>
        			</div>
    			</div>
    			<hr width="100%">
    			<div class="container">
    				<div class="row mt-4">
                        <div class="col-md-10 mx-auto">
                            <div class="row bg-light rounded shadow pt-4 pb-4">
                                <div class="col">
                                    <h4 align="center"><?php echo $row['serveur_name'] ?></h4>
                                </div>
                            </div>
                            <div class="row mt-2 mb-4">
                                <div class="col-md-4">
                                    <div class="bg-white h-100 shadow px-2 rounded">
                                        <h5>Info du Serveur :</h5>
                                        <table class="table table-striped w-100 mb-0 mt-4">
                                            <tr>
                                                <td><b>@IP : </b></td>
                                                <td><?php echo $row['user_ip'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>@MAC: </b></td>
                                                <td><?php echo $row['server_mac'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Etat : </b></td>
                                                <?php if ($row['state']=='up'){
										        ?>
                                                <td class="text-success"><?php echo $row['state']?></td>
                                                <?php }
									                 else{
									            ?>
                                                <td class="text-danger"><?php echo $row['state']?></td>
                                                <?php }
								                ?>
                                            </tr>
                                            <tr>
                                                <td><b>OS : </b></td>
                                                <td><?php echo $row['server_os']?></td>
                                            </tr>
                                            <tr>
                                                <td><b>User : </b></td>
                                                <td><?php echo $row['username']?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="bg-white h-100 shadow px-2 rounded">
                                        <h5>Disque Dur :</h5>
                                        <table class="table table-striped w-100 mb-0 mt-4">
                                            <tr>
                                                <td><b>Nom : </b></td>
                                                <td><?php echo $rowd['DD_name']?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Taille : </b></td>
                                                <td><?php echo $rowd['size_DD']?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Utilisé : </b></td>
                                                <td><?php echo $rowd['used_DD']?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Disponible : </b></td>
                                                <td><?php echo $rowd['avail_DD']?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Pourcentage: </b></td>
                                                <td><?php echo $rowd['pourcent_use']?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Date : </b></td>
                                                <td><?php echo $rowd['date_state']?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="bg-white h-100 shadow px-2 rounded">
                                        <h5>RAM :</h5>
                                        <table class="table table-striped w-100 mb-0 mt-4">
                                            
                                            <tr>
                                                <td><b>Taille : </b></td>
                                                <td><?php echo $rowram['memorytotal']?></td>
                                            </tr>
                                           
                                            <tr>
                                                <td><b>Disponible: </b></td>
                                                <td><?php echo $rowram['memoryfree']?></td>
                                            </tr>
											 <tr>
                                                <td><b>Date : </b></td>
                                                <td><?php echo $rowram['date_mem']?></td>
                                            </tr>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <hr width="100%">
                            <div class="row mt-4 mb-4">
                                <div class="col-md-6">
                                    <h4>Liste des utilisateurs :</h4>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="ajouter-user.php?id=<?php echo $srv ?>" class="btn btn-primary">
                                        <i class="fa fa-plus"></i> Ajouter un utilisateur
                                    </a>
                                </div>
                                
                            </div>
                            <div class="row mb-4"> 
                                <div class="table-responsive col">
                                    <table id="users" class="table table-bordered bg-white">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th class="th-sm">Nom d'utilisateur</th>
                                                <th class="th-sm">Source</th>
                                                <th class="th-sm">Statut</th>
                                                <th class="th-sm">Plus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php 
										while($rowu =$rsuser->fetchArray())
										{
											?>
                                            <tr>
                                                <td><?php echo $rowu['users_name']?></td>
                                                <td><?php echo $rowu['servers_name']?></td>
                                                <td><?php echo $rowu['users_state']?></td>
                                        
                                                <td>
                                                    <a href="détails-utilisateur.php?id=<?php echo $row['serveur_name'] ?>&nom=<?php echo $rowu['users_name']?>" class="btn"style="color: #0066ff;" data-toggle="tooltip" data-placement="top" title="Voir détails">
                                                        <i class="fa fa-angle-double-right"></i>
                                                    </a>
                                                    <a href=""  class="btn" style="color:#d62a13;" data-toggle="modal" data-target="#modal<?php echo $rowu['users_name']?>" title="Supprimer">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <div class="modal fade" id="modal<?php echo $rowu['users_name']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                    <a href="supprimer_user.php?id=<?php echo $row['serveur_name'] ?>&nom=<?php echo $rowu['users_name']?>" class="btn btn-danger">Continuer</a>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                
                                            </tr>
										<?php 
										} 
										?>
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>                    
                    </div>
                    
    			</div>
			</div>
			
				


		</div>
	</div>



	<script src="js/jquery-3.5.0.min.js"></script>
    <script src="js/datatables.min.js"></script>
    
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap.js"></script>

    <script type="text/javascript">
              $("#users").DataTable({
      //para cambiar el lenguaje a español
        "language": {
                "lengthMenu": "Montrer _MENU_ utilisateurs",
                "zeroRecords": "Aucun résultat!",
                "info": "Montrant de _START_ à _END_ du total de _TOTAL_ utilisateurs",
                "infoEmpty": "Montrant de 0 à 0 du total de 0 utilisateurs",
                "infoFiltered": "(filtré du total de  _MAX_ utilisateurs)",
                "sSearch": "Chercher : ",
                "oPaginate": {
                    "sFirst": "Premier",
                    "sLast":"Dernier",
                    "sNext":"Suivant",
                    "sPrevious": "Précédant"
           },
           "sProcessing":"En cours de traitement...",
            }

      });
    </script>
<script type="text/javascript">
        $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      });
    </script>
</body>
</html>