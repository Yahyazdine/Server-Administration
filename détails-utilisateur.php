<?php 
$srv= $_GET['id'];
$nom=$_GET['nom'];
						class MyDB extends SQLite3
						{
							function __construct()
							{
								$this->open('Servers.db');
							}
						}

							$db = new MyDB();
							$sql = "select * from info_history where servers_name='".$srv."' and users_name='".$nom."'";						
                            $rs=$db->query($sql);
                            
							

                            
							
								?>
<!DOCTYPE html>
<html>
<head>
	<title>Details Utilisateur</title>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body style="background-color: #e5e5e5;">

	<nav class="sidebar">
		<div class="sidebar-head"></div>
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
        			<div class="col-md-6"><h4>Détails d'utilisateur : <?php echo $nom ?></h4></div>
        			<div class="col-md-6 text-right">
        				<a href="javascript:history.back()" class="btn btn-danger"role="button">
        					<i class="fa fa-chevron-circle-left"></i><b> Retour</b>
						</a>
        			</div>
    			</div>
    			<hr width="100%">
    			<div class="container">
    				<div class="row mt-4">
                        <div class="col-md-12 mx-auto">
                            <table class="table table-bordered bg-white">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="th-sm">Serveur</th>
                                        <th class="th-sm">Utilisateur</th>
                                        <th class="th-sm">Source</th>
                                        <th class="th-sm">jour </th>
                                        <th class="th-sm">Mois </th>
                                        <th class="th-sm">Jour de mois</th>
                                        <th class="th-sm">Début de connectio</th>
                                        <th class="th-sm">Fin de connection</th>
                                        <th class="th-sm">Durée de connection</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                while($row=$rs->fetchArray())
										{
											?>
                                    <tr>
                                        <td><?php echo $row['servers_name']?></td>
                                        <td><?php echo $row['users_name']?></td>
                                        <td><?php echo $row['add_source']?></td>
                                        <td><?php echo $row['day_connection']?></td>
                                        <td><?php echo $row['month_connection']?></td>
                                        <td><?php echo $row['day_of_month_connection']?></td>
                                        <td><?php echo $row['begin_connection']?></td>
                                        <td><?php echo $row['end_disconnection']?></td>
                                        <td><?php echo $row['duration_connection']?></td>
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