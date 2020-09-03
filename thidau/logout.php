<?php 
session_start();
$_SESSION ["Login"]=false;
$_SESSION ["LoginName"]="";
header("location:index.php");
 ?>