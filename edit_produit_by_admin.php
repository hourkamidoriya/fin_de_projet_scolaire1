<?php
include("connexion.php") ;

if(isset($_POST["Nom"])){
    $nom=$_POST["Nom"] ;
    $categorie=$_POST["categorie"] ;
    $image1=$_POST["Image1"] ;
    $image2=$_POST["Image2"] ;
    $image3=$_POST["Image3"] ;
    $image4=$_POST["Image4"] ;
    $Description=$_POST["description"] ;
    $description_detailler=$_POST["description_detailler"] ;
    $prix=$_POST["Prix"] ;
    $quantiter=$_POST["stok"] ;
    $id=$_POST["Id_user"] ;

    $requette_edit_by_admin="UPDATE `produit` SET `Titre` = '$nom',`Description` = '$Description',`description_detailer` = '$description_detailler', `Image` = '$image1', `image1` = '$image2', `image2` = '$image3', `image3` = '$image4', `quantiter` = '$quantiter', `Prix` = '$prix' WHERE `produit`.`Id` = $id" ;  
    $requette_edit_by_admin_exe=$con->query($requette_edit_by_admin);
    $categorie=$_POST["categorie"] ;
        if($categorie == 1){
            header("location:admin_gestion_produit.php?categorie=Meuble");
        }elseif($categorie == 2){
            header("location:admin_gestion_produit.php?categorie=Jeux");
        }elseif($categorie == 3){
            header("location:admin_gestion_produit.php?categorie=Console");
        }elseif($categorie == 4){
            header("location:admin_gestion_produit.php?categorie=Aliment");
        }elseif($categorie == 5){
            header("location:admin_gestion_produit.php?categorie=Electronic");
        }elseif($categorie == 6){
            header("location:admin_gestion_produit.php?categorie=Beaute");
        }elseif($categorie == 7){
            header("location:admin_gestion_produit.php?categorie=Automobile");
        }

        echo $categorie ;

    }




?>