<?php 
session_start(); 
if(!isset($_SESSION['uid'])) 
  header("Location: login.php?protected=1"); 

else
header("Location: index.php")
?> 