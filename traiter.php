
<?php
$server='127.0.0.1';
$user="root";
$password='';
$datbase='login';
$connect= mysqli_connect($server,$user,$password,$datbase);
if (mysqli_connect_errno()) {
    die("cannot connect to database".mysqli_connect_errno());
}       
?>
<?php
if(isset($_POST['username'])){
    
    $username= mysqli_real_escape_string($connect,$_POST['username']);
    
    $pass=mysqli_real_escape_string($connect,$_POST['pass']);
    //$pass= md5($pass);
    
    $sql="insert into user(username,password)values('$username','$pass')";
    
     mysqli_query($connect,$sql);
    if(mysqli_num_rows($result)==1){
          
            header("Location: accueil.html");
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
