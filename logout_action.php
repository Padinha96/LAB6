<?php 
 require_once "HTML/Template/IT.php";
session_start(); 
 $template = new HTML_Template_IT('.');

  // Carrega o template Filmes2_TemplateIT.html
  $template->loadTemplatefile('message_template.html', true, true);


  // mostra o resultado da query utilizando o template

     $template->setCurrentBlock("MENU");
$template->setVariable('MESSAGE', "See you back soon!");
  $template->show();
session_unset(); 
session_destroy();

?> 