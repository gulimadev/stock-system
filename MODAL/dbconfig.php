<?php
   
$servidor = "149.100.155.52";
$usuario = "u572365863_uniasselvi";
$senha = "Uniasselvi@@2023";
$bancodedados = "u572365863_uniasselvi";

// Configuração da tela de login utilizando PDO
try{
   $conn = new PDO('mysql:host=149.100.155.52;dbname=u572365863_uniasselvi',$usuario,$senha);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }catch(PDOException $e){
       echo'ERRO: '.$e->getMessage();
   } 
?>