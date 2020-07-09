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
    $sql = "DELETE FROM info_server where serveur_name='".$srv."'";					
    $db->query($sql);
    header("Location: serveurs.php");
    
?>