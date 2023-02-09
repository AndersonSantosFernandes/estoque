<?php
include_once("conexao.php");
include_once("global.php");
include_once("models/Message.php");


$message = new Message();

$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");

if($email && $password){
// Se estiver vindo email e senha

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email AND pass = md5(:pass)");

    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":pass", $password);
    $stmt->execute();
    
    
    $showName = $stmt->fetch();
    $showEmail = $showName["email"];
    $fullName = $showName["name"] . " " . $showName["lastName"];

    if($stmt->rowCount() == 1){
        $_SESSION['user'] = $showEmail;
        $_SESSION['fulname'] = $fullName;
        $message->setMessage("Logado com sucesso","win");
        header("location: initial.php");
    }else{
        $message->setMessage("Deu merda no login senha errada","fall");
        header("location: index.php");
    }


}else{
//Se vir um ou outro
$message->setMessage("Deu merda","fall");
header("location: index.php");


}



?>