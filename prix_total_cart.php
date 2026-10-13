<?php
session_start() ;
include("connexion.php");
$id_user=$_SESSION["utilisateur"];
$prix=0;
$requette_affiche_produit="SELECT * FROM `panier_produits` WHERE `utilisateur_panier` = ".$id_user ;
$requette_affiche_produit_exe=$con->query($requette_affiche_produit) ;
$liste_requette_affiche=$requette_affiche_produit_exe->fetchAll();
foreach($liste_requette_affiche as $produit_de_la_liste){
    $prix=(int)$produit_de_la_liste["quantiter"]*$produit_de_la_liste["prix"] ;
}

echo('


<div class="w-11/12 h-full bg-pink-300">

                <div class="flex md:pt-3 pt-1 md:h-15 h-8 justify-center text-center">

                    <p class="text-2xl font-bold">
                        Total du panier
                    </p>

                </div>

                <!-- Sous-total -->
                <div class="flex mx-10 md:mt-5 mt-2 justify-between">

                    <p class="text-xl">
                        Sous-total
                    </p>

                    <p class="md:text-2xl text-gray-500">'.

                        $prix

                    .'</p>

                </div>

                <!-- Total -->
                <div class="flex mx-10 md:mt-10 mt-2 md:mb-8 justify-between">

                    <p class="text-xl">
                        Total
                    </p>

                    <p class="md:text-2xl font-bold text-amber-600">'.

                        $prix .'FCFA

                    </p>

                </div>

                <!-- Bouton de paiement -->
                <form action="page7.php" method="POST">

                    <button
                        class="font-bold mt-10 z-10 border border-black md:px-10 md:py-3.5 py-1 px-5 hover:bg-amber-400 hover:text-white rounded-2xl text-amber-600"
                        id="add_cart"
                    >
                        Passer au paiement
                    </button>

                </form>

            </div>

') ;
?>