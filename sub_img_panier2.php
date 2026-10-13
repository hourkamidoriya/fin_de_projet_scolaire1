<?php
session_start();
include("connexion.php") ;
$id = $_SESSION["utilisateur"] ;
$nom = $_SESSION["user_name"] ;
$berole =0 ;
$requette_panier = "SELECT * FROM `panier_produits` WHERE `utilisateur_panier` = ".$id ;
$requette_panier_exe = $con->query($requette_panier) ;
$produits_panier =$requette_panier_exe->fetchAll() ;

foreach ($produits_panier as $produit_panier){
  $requette_produits = "SELECT * FROM `produit` WHERE `Id` = ".$produit_panier['produit_id'] ;
  $requette_produits_exe = $con->query($requette_produits) ;
  $tous_les_produit = $requette_produits_exe->fetchAll() ;
  foreach($tous_les_produit as $un_produit){
    $un_produit["Id"] ;
    $berole+=1;
  }

}
if($berole >= 1){ 
    echo('<div class=" bg-red-500 z-0  w-5 h-5 rounded-2xl absolute justify-center text-center flex items-center bottom-4">'.$berole.'</div><img src="asset/cart1.png" id="hhh" alt="" class="z-0 w-8 mr-10 cursor-pointer object-contain "/></div> ' );
}else{
  echo('<div class=" z-0  w-5 h-5 rounded-2xl absolute justify-center text-center flex items-center bottom-4">'.'</div><img src="asset/cart1.png" id="hhh" alt="" class="z-0 w-8 mr-10 cursor-pointer object-contain "/></div> ' );
}

?>