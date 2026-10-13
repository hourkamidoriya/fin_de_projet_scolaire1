<?php
include("connexion.php") ;
$nom_produit_post=$_POST["nom"];
$description_produit_post=$_POST["description"];
$description_detailler_produit_post=$_POST["description_detailler"];
$prix_produit_post=$_POST["Prix"];
$categori_produit_post=$_POST["categori"];
$stok_produit_post=$_POST["stok"];
// je verifier les valeur de categori
$categori_final= (int)$categori_produit_post ;


if(isset($_POST["sub"])){
// je met le image dans un fichier temporer  comme ça 
    $imagepricipal=$_FILES["image"];
    $image1=$_FILES["image1"];
    $image2=$_FILES["image2"];
    $image3=$_FILES["image3"];
    $type_de_fichier_autoriser = "png" ;
    $erreur = 0 ;
    
// tous mes image on ete mis dans un fichier temporer je travaille maintenant uniquement sur l'image 1 
// je vais recuperer toute ses information son nom son type sa taille et la chemin d'acces temporel ou il est stoker 


    $nom_image_pricipal=$imagepricipal["name"] ;
    $tmp_image_pricipal=$imagepricipal["tmp_name"] ;
    $size_image_pricipal=$imagepricipal["size"] ;
    $erreur_image_pricipal=$imagepricipal["error"] ;
    $type_image_pricipal=$imagepricipal["type"] ;
// c'est fais  je recupère l'extenstion du fichier maintenant 
    $extention_image_pricipal= explode(".",$nom_image_pricipal) ;
    $extention_actuel_image_pricipal = strtolower(end($extention_image_pricipal));
    echo $extention_actuel_image_pricipal ;
    // je verifi sis l'extention du fichier est egal a l'extention que je permet 
    if($type_de_fichier_autoriser===$extention_actuel_image_pricipal){
        echo "le forma est autoriser " ;
        $nouveau_nom_de_limage_pricipal=uniqid($categori_produit_post,true). ".".$extention_actuel_image_pricipal ;
        echo $nouveau_nom_de_limage_pricipal ;
        $destination="asset/produit/". $nouveau_nom_de_limage_pricipal ;
        


    }else{
        echo "non le format n'est pas autoriser " ;
        $erreur=$erreur+1 ;
    }
 
    

// pour l'image 1
if(!empty($image1["name"])){
    $nom_image_1=$image1["name"];
    $tmp_image_1=$image1["tmp_name"];
    $erreur_image_1=$image1["error"];
    $size_image_1=$image1["size"];
    $type_image_1=$image1["type"];

    //je recupere l'extention
    $extention_image1=explode("." , $nom_image_1) ;
    $extention_actuel_image1=strtolower(end($extention_image1)) ;

    if($type_de_fichier_autoriser === $extention_actuel_image1){
        $nouveau_nom_de_limage1=uniqid($categori_produit_post ,true). ".". $extention_actuel_image1 ;
        $destination1="asset/produit/". $nouveau_nom_de_limage1 ;
        
    }else{
        echo " le type de fichier n'est pas pris en compte" ;
        $erreur=$erreur+1 ;
    }



}

// pour l'image 2

if(!empty($image2["name"])){
    $nom_image_2=$image2["name"];
    $tmp_image_2=$image2["tmp_name"];
    $erreur_image_2=$image2["error"];
    $size_image_2=$image2["size"];
    $type_image_2=$image2["type"];

    //je recupere l'extention
    $extention_image2=explode("." , $nom_image_2) ;
    $extention_actuel_image2=strtolower(end($extention_image2)) ;

    if($type_de_fichier_autoriser === $extention_actuel_image2){
        $nouveau_nom_de_limage2=uniqid($categori_produit_post ,true). ".". $extention_actuel_image2 ;
        $destination2="asset/produit/". $nouveau_nom_de_limage2 ;
        
    }else{
        echo " le type de fichier n'est pas pris en compte" ;
        $erreur=$erreur+1 ;
    }



}


// pour l'image 3

if(!empty($image3["name"])){
    $nom_image_3=$image3["name"];
    $tmp_image_3=$image3["tmp_name"];
    $erreur_image_3=$image3["error"];
    $size_image_3=$image3["size"];
    $type_image_3=$image3["type"];

    //je recupere l'extention
    $extention_image3=explode("." , $nom_image_3) ;
    $extention_actuel_image3=strtolower(end($extention_image3)) ;

    if($type_de_fichier_autoriser === $extention_actuel_image3){
        $nouveau_nom_de_limage3=uniqid($categori_produit_post ,true). ".". $extention_actuel_image3 ;
        $destination3="asset/produit/". $nouveau_nom_de_limage3 ;
        
    }else{
        echo " le type de fichier n'est pas pris en compte" ;
        $erreur=$erreur+1 ;
    }



}




if($erreur==0){
    move_uploaded_file($tmp_image_pricipal, $destination) ;
    move_uploaded_file($tmp_image_1, $destination1) ;
    move_uploaded_file($tmp_image_2, $destination2) ;
    move_uploaded_file($tmp_image_3, $destination3) ;
    $requette_ajouteuproduit_by_admin= "INSERT INTO `produit` (`Titre`, `Description`, `description_detailer`, `Id_categori`, `Image`, `image1`, `image2`, `image3`, `Prix`, `quantiter`) VALUES ('$nom_produit_post', '$description_produit_post', '$description_detailler_produit_post', '$categori_final', '$destination', '$destination1', '$destination2', '$destination3', '$prix_produit_post', '$stok_produit_post')" ;
    $requette_ajouteuproduit_by_admin_exe =$con->query($requette_ajouteuproduit_by_admin) ;
    echo "tous c'est bien passer le nombre d'erreur est de  " . $erreur ;
}












   
}


?>
