<?php 
$pyscript = 'scripts_py/ping.py';
$python = 'C:\Users\elhan\AppData\Local\Programs\Python\Python38-32\python.exe';
$ip1='192.166.88.1';
$ip2='www.google.com';
$cmd='$python $pyscript $ip1 $ip2';
exec("$cmd", $output);
echo print_r($output);
?>