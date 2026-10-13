
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
    $requette_commande="INSERT INTO `commande` (`id_utilisateur`, `date`, `prix_total`, `satut`) VALUES ('$id_user', current_timestamp(), '$prix', 'payer')" ;
    $requette_commande_exe=$con->query($requette_commande) ;
    $id_commande=$con->lastInsertId();
    


    $requette_commande_produit ="SELECT * FROM `panier_produits` WHERE `utilisateur_panier` = ".$id  ;
    $requette_commande_produit_exe = $con->query($requette_commande_produit) ;
    $list_produit_by_user=$requette_commande_produit_exe->fetchAll() ;
    $stoke=0 ;
    foreach( $list_produit_by_user as $produit_by_user ){
        $id_produit_commande=$produit_by_user["produit_id"] ;
        $id_quantiter_commande=$produit_by_user["quantiter"] ;
        $del_produc="SELECT * FROM `produit` WHERE `Id`= ".$produit_by_user["produit_id"] ;
        $del_produc_exe=$con->query($del_produc);
        $produit_a_sup=$del_produc_exe->fetchAll();
        foreach($produit_a_sup as $quaniter){
            $stoke= (int)$quaniter["quantiter"] - (int)$id_quantiter_commande ;
        }
        if($stoke>=1){
            $requette_edit_produit = "UPDATE `produit` SET `quantiter` = '$stoke' WHERE `produit`.`Id` = $id_produit_commande" ;
            $requette_edit_produit_exe =$con->query($requette_edit_produit) ;
            $requette_sup_cart = "DELETE FROM `panier_produits` WHERE `panier_produits`.`utilisateur_panier` = $id_user" ;
            $requette_sup_cart_exe=$con->query($requette_sup_cart);
        }elseif($stoke==0){
            $requette_sup_cart = "DELETE FROM `panier_produits` WHERE `panier_produits`.`produit_id` = $id_produit_commande " ;
            $requette_sup_cart_exe=$con->query($requette_sup_cart);

            $requette_delete_produit = "DELETE FROM produit WHERE `produit`.`Id` = $id_produit_commande " ;
            $requette_delete_produit_exe =$con->query($requette_delete_produit);
        }
        

        $id_prix_commande=$produit_by_user["prix"] ;
        $requette_add_produi_command ="INSERT INTO `commande_produit` (`commande_id`, `produit_id`, `quantiter`, `prix`) VALUES ('$id_commande', '$id_produit_commande', '$id_quantiter_commande', '$id_prix_commande')" ;
        $requette_add_produi_command_exe=$con->query($requette_add_produi_command);
        
    }

    header("location:index.php") ;
?>

<?php






?> 