<?php

if(!$_SESSION['user']){
    header('location: index.php');
    exit;
}
?>