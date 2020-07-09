<?php
 $srv= $_GET['id'];
 $nom=$_GET['nom'];
 echo $nom;
 class MyDB extends SQLite3
 {
    
     function __construct()
     {
         $this->open('Servers.db');
     }
 }
 
     $db = new MyDB();
     $sql = "DELETE FROM info_user where servers_name='".$srv."' and users_name='".$nom."'";					
     $db->query($sql);
     
     
     
$pyscript='scripts_py\Script_user_del.py';
$python='C:\Users\elhan\AppData\Local\Programs\Python\Python38-32\python.exe';

$cmd = "$python $pyscript $srv $nom";
exec("$cmd", $output);
header("Location: détails-serveur.php?id=$srv");

?>