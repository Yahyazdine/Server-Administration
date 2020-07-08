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
		<div class="sidebar-head"></div>
		<div class="sidebar-body">
			<ul>
				<li><a href="accueil.php"><i class="fa fa-home"></i>Accueil</a></li>
				<li><a href="serveurs.php" class="active"><i class="fa fa-server"></i>Serveurs</a></li>
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
                                    <h4 align="center">Nom du Serveur</h4>
                                </div>
                            </div>
                            <div class="row mt-2 mb-4">
                                <div class="col-md-4">
                                    <div class="bg-white h-100 shadow px-2 rounded">
                                        <h5>Info du Serveur :</h5>
                                        <table class="table table-striped w-100 mb-0 mt-4">
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
                                            <tr>
                                                <td><b>OS : </b></td>
                                                <td>AZAZA</td>
                                            </tr>
                                            <tr>
                                                <td><b>User : </b></td>
                                                <td>User1</td>
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
                                                <td>Disque dur1</td>
                                            </tr>
                                            <tr>
                                                <td><b>Taille : </b></td>
                                                <td>256 go</td>
                                            </tr>
                                            <tr>
                                                <td><b>Utilisé : </b></td>
                                                <td>20%</td>
                                            </tr>
                                            <tr>
                                                <td><b>Disponible : </b></td>
                                                <td>80 go</td>
                                            </tr>
                                            <tr>
                                                <td><b>Pourcentage : </b></td>
                                                <td>40%</td>
                                            </tr>
                                            <tr>
                                                <td><b>Date : </b></td>
                                                <td>13/12/2020</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="bg-white h-100 shadow px-2 rounded">
                                        <h5>RAM :</h5>
                                        <table class="table table-striped w-100 mb-0 mt-4">
                                            <tr>
                                                <td><b>Nom : </b></td>
                                                <td>RAM1</td>
                                            </tr>
                                            <tr>
                                                <td><b>Taille : </b></td>
                                                <td>16 go</td>
                                            </tr>
                                            <tr>
                                                <td><b>Utilisé : </b></td>
                                                <td>8 go</td>
                                            </tr>
                                            <tr>
                                                <td><b>Disponible : </b></td>
                                                <td>8 go</td>
                                            </tr>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <hr width="100%">
                            <div class="row mt-4 mb-4">
                                <h4>Liste des utilisateurs :</h4>
                            </div>
                            <div class="row mb-4"> 
                                <div class="table-responsive col">
                                    <table id="users" class="table table-bordered bg-white">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th class="th-sm">Nom d'utilisateur</th>
                                                <th class="th-sm">Source</th>
                                                <th class="th-sm">Statut</th>
                                                <th class="th-sm">Derniere connexion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>test</td>
                                                <td>test</td>
                                                <td>tzest</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>tedsst</td>
                                                <td>test</td>
                                                <td>test</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>test</td>
                                                <td>df</td>
                                                <td>test</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>test</td>
                                                <td>test</td>
                                                <td>test</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>test</td>
                                                <td>ff</td>
                                                <td>test</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>tczest</td>
                                                <td>test</td>
                                                <td>tzest</td>
                                                <td></td>
                                            </tr>
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

</body>
</html>