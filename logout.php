<?php
include_once("models/Message.php");

$message = new Message();

session_start();//Entra na sessão depois da valicação
session_destroy();//Destroi a sessão atual 'logout'

$message->setMessage("Sessão encerrada, até a próxima...","win");

header("location: index.php"); //Redireciona para a página de login
exit;// Encerra o comando php
?>