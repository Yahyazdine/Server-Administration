<?php 
$srv=$_GET['id'];
if(isset($_POST['ajouter']))
{
	$nom=$_POST['nom'];
	$pwd=$_POST['mdp'];
 

$pyscript = 'scripts_py/Script_user_add.py';
$python = 'C:\Users\ANAS\AppData\Local\Programs\Python\Python38-32\python.exe';
$cmd='$python $pyscript $srv $nom $pwd';
exec("$cmd", $output); 

$pyscript1 = 'scripts_py/Script_users.py';
$python = 'C:\Users\ANAS\AppData\Local\Programs\Python\Python38-32\python.exe';
$cmd1='$python $pyscript1';
exec("$cmd1", $output);

header("Location: détails-serveur.php?id=$srv");
}
?> 