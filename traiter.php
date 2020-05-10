
<?php
$server='127.0.0.1';
$user="root";
$password='';
$datbase='login';
$connect= mysqli_connect($server,$user,$password,$datbase);
if (mysqli_connect_errno()) {
    die("cannot connect to database".mysqli_connect_errno());
}       
 else {
echo "Database is connected";    
}
?>
<?php

if(isset($_POST['username'])){
    
    $uname=mysqli_real_escape_string($connect,$_POST['username']);
    $password=mysqli_real_escape_string($_POST['pass']);
    
    $sql="select * from user where username='".$uname."'AND password='".$password."' limit 1";
    
    $result= mysqli_query($connect,$sql);
    if(mysqli_num_rows($result)==1){
        $type=mysqli_fetch_row($result);
        if( $type[3] == 'user'){
            header("Location: user.php");
            
        }
        else{
            header("Location: admin.php");
        }
        
        
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
