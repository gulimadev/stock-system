<?php
/*define('DB_HOST', '195.179.237.217');
define('DB_USER', 'u865174000_uniasselvi');
define('DB_PASS', 'Uniasselvi@@2023');
define('DB_NAME', 'u865174000_uniasselvi');*/
//Depois da tua conexão a base de dados insere o seguinte código abaixo.
   // //Esta parte vai resolver o teu problema!
   // mysql_query("SET NAMES 'utf8'");
   // mysql_query('SET character_set_connection=utf8');
   // mysql_query('SET character_set_client=utf8');
   // mysql_query('SET character_set_results=utf8');
   

$servidor = "149.100.155.52";
$usuario = "u572365863_uniasselvi";
$senha = "Uniasselvi@@2023";
$bancodedados = "u572365863_uniasselvi";
// CONFIG PARA TELA DE LOGIN


// configuração da tela de login utilizando PDO
try{
   $conn = new PDO('mysql:host=149.100.155.52;dbname=u572365863_uniasselvi',$usuario,$senha);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }catch(PDOException $e){
       echo'ERRO: '.$e->getMessage();
   }





   
?>