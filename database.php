<?php
    require_once 'config.php';
    $banco =  new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    if($banco->connect_errno){
        echo "Foi encontrado um erro na conexão com a base de dados, <br>Detalhes: $banco->errno <br>$banco->connect_error";
    }
    
    $banco->query("SET NAMES 'utf8'");
    $banco->query("SET character_set_connection=utf8");
    $banco->query("SET character_set_client=utf8");
    $banco->query("SET character_set_results=utf8");

