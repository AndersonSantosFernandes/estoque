<?php 

include_once("conexao.php");

$stmt = $conn->query("SELECT * FROM exit_items");
$stmt->execute();
$showInsumos = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>