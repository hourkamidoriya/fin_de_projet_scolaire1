
<?php
session_start();
include("connexion.php") ;
$id = $_SESSION["utilisateur"] ;
$nom = $_SESSION["user_name"] ;
$prix =0 ;

// ici je vais gérer le panier 
$requette_panier = "SELECT * FROM `panier_produits` WHERE `utilisateur_panier` = ".$id ;
$requette_panier_exe = $con->query($requette_panier) ;
$produits_panier =$requette_panier_exe->fetchAll() ;
// echo "<pre>" ;
// var_dump($produits_panier) ;
// echo "<pre>";
foreach ($produits_panier as $produit_panier){
// echo "<pre>" ;
$prixt_p=(int)$produit_panier["prix"]*(int)$produit_panier["quantiter"] ; 
$prix+=$prixt_p;
  // echo "<pre>" ;
  // var_dump($tous_les_produit) ;
  // echo "<pre>" ;

}







?>

<?php




    $id_user=$_SESSION['utilisateur'] ;
    $requette_commande="INSERT INTO `commande` (`id_utilisateur`, `date`, `prix_total`, `satut`) VALUES ('$id_user', current_timestamp(), '$prix', 'en_attente')" ;
    $requette_commande_exe=$con->query($requette_commande) ;
    $id_commande=$con->lastInsertId();
    


    $requette_commande_produit ="SELECT * FROM `panier_produits` WHERE `utilisateur_panier` = ".$id  ;
    $requette_commande_produit_exe = $con->query($requette_commande_produit) ;
    $list_produit_by_user=$requette_commande_produit_exe->fetchAll() ;
    foreach( $list_produit_by_user as $produit_by_user ){
        $id_produit_commande=$produit_by_user["produit_id"] ;
        $id_quantiter_commande=$produit_by_user["quantiter"] ;
        $id_prix_commande=$produit_by_user["prix"] ;
        $requette_add_produi_command ="INSERT INTO `commande_produit` (`commande_id`, `produit_id`, `quantiter`, `prix`) VALUES ('$id_commande', '$id_produit_commande', '$id_quantiter_commande', '$id_prix_commande')" ;
        $requette_add_produi_command_exe=$con->query($requette_add_produi_command);
        
    }
    $requette_sup_cart = "DELETE FROM `panier_produits` WHERE `panier_produits`.`utilisateur_panier` = $id_user" ;
    $requette_sup_cart_exe=$con->query($requette_sup_cart);
    header("location:index.php") ;
?>

<?php






?> 