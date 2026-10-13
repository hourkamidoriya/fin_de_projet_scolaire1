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




foreach ($produits_panier as $produit_panier){
$prixt_p=(int)$produit_panier["prix"]*(int)$produit_panier["quantiter"] ; 
$prix+=$prixt_p;



$requette_paniernom = "SELECT * FROM `produit` WHERE `Id` = ".$produit_panier["produit_id"] ;
$requette_paniernom_exe = $con->query($requette_paniernom) ;
$produits_paniernom =$requette_paniernom_exe->fetchAll() ;

foreach($produits_paniernom as $produits_paniernom1){
    echo $produits_paniernom1["Titre"] ;
}
echo $produit_panier["quantiter"] ;
echo $produit_panier["prix"] ;

};



$line_items = [];

foreach ($produits_panier as $produit_panier) {


$requette_paniernom = "SELECT * FROM `produit` WHERE `Id` = ".$produit_panier["produit_id"] ;
$requette_paniernom_exe = $con->query($requette_paniernom) ;
$produits_paniernom =$requette_paniernom_exe->fetchAll() ;

foreach($produits_paniernom as $produits_paniernom1){
    $line_items[] = [
        "quantity" => (int)$produit_panier["quantiter"],
        "price_data" => [
            "currency" => "xaf",
            "unit_amount" => (int)$produit_panier["prix"],
            "product_data" => [
                "name" => $produits_paniernom1["Titre"] ,
            ]
        ]
    ];
    }
}



require __DIR__ . "/vendor/autoload.php";
$stripe_secret_key ="sk_test_51U86kXCwobABR2TMrupCzvfEocnAInWdRpGgnHs5LA8UaeZphHQGrCyFp8cuo4nFjnkG7358OQXExo44aytp4HRA00k4zSprdz";
\Stripe\Stripe::setApiKey($stripe_secret_key) ;
$checkout_session=\Stripe\Checkout\Session::create([
    "mode"=>"payment",
    "success_url"=>"http://".$_SERVER["SERVER_NAME"]."/mes_projet/mon_projet/successe.php",
    "line_items"=>$line_items ,
]);   

http_response_code(303);
header("location: " . $checkout_session->url)

?>