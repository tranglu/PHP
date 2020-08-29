<?php 
session_start();
$_SESSION ["Logined"]=false;
$_SESSION ["LoginName"]="";
header("location:index.php");
 ?>