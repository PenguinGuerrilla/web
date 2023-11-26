<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    include("../config.php");
    $sql = "SELECT * FROM ".$_GET['table']." WHERE id_produto = '".$_GET['id_produto']."'";
    $result = $conn->query($sql);
    $qtd = $result->num_rows; 

    if($qtd){
        $response["rows"] = Array();
        while($row = $result->fetch_object()){
            $response["rows"][] = $row;
        }   
        echo json_encode($response["rows"]);
    }
?>