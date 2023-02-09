<?php

include_once("conexao.php");


$stmt = $conn->query("SELECT * FROM insumos ORDER BY name");
$stmt->execute();
$products = $stmt->fetchAll();

$stmtBasses = $conn->query("SELECT * FROM bases ORDER BY base_name");
$stmtBasses->execute();
$bases = $stmtBasses->fetchAll();

$stmtUsers = $conn->query("SELECT * FROM users ORDER BY name");
$stmtUsers->execute();
$useSelect = $stmtUsers->fetchAll();

$stmtIn = $conn->query("SELECT * FROM replace_items");
$stmtIn->execute();
$inSelect = $stmtIn->fetchAll();

$stmtOut = $conn->query("SELECT * FROM exit_items");
$stmtOut->execute();
$outSelect = $stmtOut->fetchAll();

$stmtView = $conn->query("SELECT * FROM actions");
$stmtView->execute();
$viewSelect = $stmtView->fetch();


?>

