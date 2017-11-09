<?php 
 require_once "HTML/Template/IT.php";
include 'db.php';


  //  Cria um novo objecto template
  $template = new HTML_Template_IT('.');

  // Carrega o template Filmes2_TemplateIT.html
  $template->loadTemplatefile('login_template.html', true, true);


  // mostra o resultado da query utilizando o template
     $template->setCurrentBlock("LOGIN");
$template->setVariable('MENU1', "Home");
     $template->setVariable('MENU2',"Login");
$template->setVariable('MENU3', "Register");


if(!empty($_GET))
{
if($_GET['error'] == 1)
     $template->setVariable('MESSAGE', "Email doesn't exist, try another one");
if($_GET['error'] == 2)
     $template->setVariable('MESSAGE', "The password does not match, try again");
}

else
{
$template->setVariable('MESSAGE', "");

}
    $template->parseCurrentBlock();

  // Mostra a tabela
  $template->show();


?>


