<?php 
session_start() ;
include ("connexion.php") ;






if(isset($_POST["product_del"])&& !empty($_POST["product_del"])){
    $id=$_SESSION["utilisateur"];





    $del_product =(int)$_POST["product_del"] ;
    $requette_del ="DELETE FROM `panier_produits` WHERE `panier_produits`.`produit_id` =$del_product AND `utilisateur_panier` = $id " ;
    $requette_del_exe =$con->query($requette_del);



$requette_panier = "SELECT * FROM `panier_produits` WHERE `utilisateur_panier` = ".$id ;
$requette_panier_exe = $con->query($requette_panier) ;
$produits_panier =$requette_panier_exe->fetchAll() ;
foreach ($produits_panier as $produit_panier){
  $requette_produits = "SELECT * FROM `produit` WHERE `Id` = ".$produit_panier['produit_id'] ;
  $requette_produits_exe = $con->query($requette_produits) ;
  $tous_les_produit = $requette_produits_exe->fetchAll();

}
    foreach ($produits_panier as $produit_panier) {

        $requette_produits = "SELECT * FROM `produit` WHERE `Id` = " . $produit_panier['produit_id'];

         $requette_produits_exe = $con->query($requette_produits);

        $tous_les_produit = $requette_produits_exe->fetchAll();

        foreach ($tous_les_produit as $un_produit) {
            $un_produit["Image"] ;
    }}





    echo(' <div class="flex mb-5 bg-pink-300">
                <div class="w-3/12 h-10"></div>
                <div class="w-3/12 h-10">Produit</div>
                <div class="w-3/12 h-10">Prix</div>
                <div class="w-3/12 h-10">Quantité</div>
                <div class="w-3/12 h-10">Total</div>
                <div class="w-3/12 h-10"></div>
            </div>');
        foreach ($produits_panier as $produit_panier) {

            $requette_produits = "SELECT * FROM `produit` WHERE `Id` = " . $produit_panier['produit_id'];

                $requette_produits_exe = $con->query($requette_produits);

                $tous_les_produit = $requette_produits_exe->fetchAll();

                foreach ($tous_les_produit as $un_produit) { 
                echo('
                <div class="flex border-b border-b-gray-400 md:pb-3">

                    <div class="md:w-3/12 md:h-30 h-20 w-6/12 flex justify-center text-center my-auto items-center">

                        <div class="rounded-xl md:w-11/12 md:h-11/12 w-7/12 h-7/12">

                            <img
                                src="'.$un_produit["Image"].'"
                                alt="Image du produit"
                                class="rounded-xl w-full h-full"
                            >

                        </div>

                    </div>

                    <div class="w-3/12 h-20 flex justify-center text-center my-auto items-center font-bold text-gray-400">'.

                        $un_produit["Titre"].'

                    </div>

                 
                    <div class="w-3/12 h-20 flex justify-center text-center my-auto items-center font-bold text-gray-400">'.

                         $un_produit["Prix"].' FCFA

                    </div>

                    <div class="w-3/12 h-20 flex justify-center text-center my-auto items-center font-bold text-gray-400">

                        <p class="border py-1 px-2 rounded-xl">'.

                            $produit_panier['quantiter'].'

                        </p>

                    </div>


                    <div class="w-3/12 h-20 flex justify-center text-center my-auto items-center font-bold text-gray-400">'.

                        $un_produit["Prix"] * $produit_panier['quantiter'].' FCFA

                    </div>

                    
                    <div class="w-3/12 h-20 flex justify-center text-center my-auto items-center font-bold text-gray-400">

                        <form action="" class="flex" method="POST">

                            <input
                                class="id_produit_del"
                                type="hidden"
                                name="product_del"
                                value="'.$un_produit['Id'].'"
                            >

                            <button class="flex w-5 h-5 cursor-pointer button_del" type="button">

                                <img
                                    src="asset/poubelle.png"
                                    alt="Supprimer"
                                    class="w-5 h-5"
                                    title="Supprimer du panier"
                                >

                            </button>
                        </form>

                    </div>

                </div>') ;
                }
            }
}else{
    echo"ekier ";
}

?>