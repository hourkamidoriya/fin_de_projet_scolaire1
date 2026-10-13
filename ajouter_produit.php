<?php
session_start();
include("connexion.php") ;
if(isset($_POST["ajout_produit"]) && isset($_POST["quantiter_produit"])){
    // recherche du produit pour le mettre dans le cart  pouridentifier le produit j'ai besion de son identi
    // et de slidentifiant de l'utilisateur puis je vais recuperer la quatiter 
    $id_produit = $_POST["ajout_produit"] ;
    $id_de_l_utilisateur =$_SESSION["utilisateur"] ;
    $quantiter_product =$_POST["quantiter_produit"] ;
    $prix_product =$_POST["prix_produit"] ;


    $requette_afficher_produit_cart ="SELECT * FROM `panier_produits` WHERE `utilisateur_panier`= $id_de_l_utilisateur AND `produit_id`= $id_produit" ;
    $requette_afficher_produit_cart_exe =$con->query($requette_afficher_produit_cart) ;
    $le_poduit_en_question = $requette_afficher_produit_cart_exe->fetchAll() ;
    // si le produit existe deja 
    if (!empty($le_poduit_en_question)){
        // la on fais une requette pour modifier le produit
        $requette_insert_dans_le_cart = "UPDATE `panier_produits` SET `quantiter`= $quantiter_product  WHERE `utilisateur_panier` = $id_de_l_utilisateur AND `produit_id` = $id_produit"  ;
        $requette_insert_dans_le_cart_exe =$con->query($requette_insert_dans_le_cart) ;
       
        header("location:index.php") ;
        exit;
        





// le produi n'existe pas encore 
    }else{ 
         // la on fais une requette pour modifier le produit
        $requette_insert_dans_le_cart = " INSERT INTO `panier_produits` (`utilisateur_panier`, `produit_id`, `quantiter`, `prix`) VALUES ('$id_de_l_utilisateur', '$id_produit', '$quantiter_product', '$prix_product') " ;
        $requette_insert_dans_le_cart_exe =$con->query($requette_insert_dans_le_cart) ;
        header("location:index.php") ;
        
        exit;
    }


}else{
    echo " un truc n'a pa marcher " ;
}

?>