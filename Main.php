<?php
    $op = "";
    $pg = "index";
    
    if(isset($_GET["pg"])){
        $op = $_GET["op"];
        $pg = $_GET["pg"];
    } 
    
    if($pg == "index"){
        require_once './index.php';
    }   
    if($pg == "contato"){
        require_once './Form/DetalharContatos.php';
        
    }
    
?>

        
