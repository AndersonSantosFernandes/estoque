<?php
// include_once("templates/header.php");

include_once("conexao.php");

include_once("verify_login.php");

$user = $_SESSION['user'];

$stmt = $conn->prepare("SELECT admin, permitionC, permitionR, permitionU, permitionD FROM users WHERE email = :email");

$stmt->bindParam(":email", $user);

$stmt->execute();

$usuario = $stmt->fetch();

$perm = $usuario["admin"];
$permC = $usuario["permitionC"];
$permR = $usuario["permitionR"];
$permU = $usuario["permitionU"];
$permD = $usuario["permitionD"];




?>

 