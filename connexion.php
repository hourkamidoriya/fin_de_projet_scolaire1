<?php 

$DB_name="list_produits" ;
$DB_user="root" ;
$DB_host="127.0.0.1" ;
$DB_pass="" ;
$dsn="mysql:host=$DB_host;dbname=$DB_name" ;

try{
    $con=new PDO($dsn,$DB_user,$DB_pass) ;
    }catch(PDOException $e){ 
        die("il y'a une erreur ".$e) ;
}

?>
