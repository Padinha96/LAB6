<?php 
require_once ('HTML/Template/IT.php');
  require_once ('db.php');

session_start(); 


if( !isset($_POST['email']) or !isset($_POST['pass']) ) 
  header("Location: login.php?erro=2"); 


$email = $_POST['email']; 
$pwd = substr(md5($_POST['pass']),0,32); 
$_SESSION['email'] = $email; 

$db = dbconnect($hostname,$db_name,$db_user,$db_passwd); 
$query = "SELECT * FROM users 
         WHERE email = '$email' AND password_digest = '$pwd'"; 
$result = @ mysql_query($query,$db); 

if (!$result) 
  header("Location: login.php?error=4"); 

if (mysql_num_rows($result) == 0) { 
  unset($_SESSION['email']); 
  header("Location: login.php?error=2"); 
} 

$tupple = mysql_fetch_array($result); 
$_SESSION['username'] = $tupple['name']; 
$_SESSION['uid'] = $tupple['id']; 

mysql_close($db); 

header("Location: protected_page.php"); 
?> 