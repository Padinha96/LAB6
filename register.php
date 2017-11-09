<?php 
 require_once "HTML/Template/IT.php";
include 'db.php';


  //  Cria um novo objecto template
  $template = new HTML_Template_IT('.');

  // Carrega o template Filmes2_TemplateIT.html
  $template->loadTemplatefile('register_template.html', true, true);


  // mostra o resultado da query utilizando o template
     $template->setCurrentBlock("REGISTER");
if(!empty($_GET))
{
$template->setVariable('NAME', $_GET["name"]);
     $template->setVariable('EMAIL', $_GET["email"]);
if($_GET['error'] == 1)
     $template->setVariable('MESSAGE', "Email already exists, try another one");
if($_GET['error'] == 2)
     $template->setVariable('MESSAGE', "The passwords do not match, try again");
if($_GET['error'] == 3)
     $template->setVariable('MESSAGE', "The password is too short, needs to be at least 5 characters long");
if($_GET['error'] == 4)
     $template->setVariable('MESSAGE', "Email already exists, try another one");
}
else
{
	$template->setVariable('NAME', "");
     $template->setVariable('EMAIL', "");
}
	      $template->parseCurrentBlock();

  // Mostra a tabela
  $template->show();


?>


