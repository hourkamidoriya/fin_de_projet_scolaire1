<?php
session_start();

$title = "Panier";
$banner = "yes";

include("entete.php");
?>

<?php if (isset($_SESSION["utilisateur"])) { ?>
<div class="w-full flex justify-center text-center mt-6 mb-6">

    <div class="w-11/12 md:flex">
        <div class="md:w-8/12 md:h-full mb-5 md:mb-0" id="produit_del_actual">


            <div class="flex mb-5 bg-pink-300">
                <div class="w-3/12 h-10"></div>
                <div class="w-3/12 h-10">Produit</div>
                <div class="w-3/12 h-10">Prix</div>
                <div class="w-3/12 h-10">Quantité</div>
                <div class="w-3/12 h-10">Total</div>
                <div class="w-3/12 h-10"></div>
            </div>

            <?php foreach ($produits_panier as $produit_panier) {

                $requette_produits = "SELECT * FROM `produit` WHERE `Id` = " . $produit_panier['produit_id'];

                $requette_produits_exe = $con->query($requette_produits);

                $tous_les_produit = $requette_produits_exe->fetchAll();

                foreach ($tous_les_produit as $un_produit) {
            ?>

                <div class="flex border-b border-b-gray-400 md:pb-3">

                    <div class="md:w-3/12 md:h-30 h-20 w-6/12 flex justify-center text-center my-auto items-center">

                        <div class="rounded-xl md:w-11/12 md:h-11/12 w-7/12 h-7/12">

                            <img
                                src="<?php echo $un_produit["Image"]; ?>"
                                alt="Image du produit"
                                class="rounded-xl w-full h-full"
                            >

                        </div>

                    </div>

                    <div class="w-3/12 h-20 flex justify-center text-center my-auto items-center font-bold text-gray-400">

                        <?php echo $un_produit["Titre"]; ?>

                    </div>

                 
                    <div class="w-3/12 h-20 flex justify-center text-center my-auto items-center font-bold text-gray-400">

                        <?php echo $un_produit["Prix"]; ?> FCFA

                    </div>

                    <div class="w-3/12 h-20 flex justify-center text-center my-auto items-center font-bold text-gray-400">

                        <p class="border py-1 px-2 rounded-xl">

                            <?php echo $produit_panier['quantiter']; ?>

                        </p>

                    </div>


                    <div class="w-3/12 h-20 flex justify-center text-center my-auto items-center font-bold text-gray-400">

                        <?php echo ($un_produit["Prix"] * $produit_panier['quantiter']); ?> FCFA

                    </div>

                    
                    <div class="w-3/12 h-20 flex justify-center text-center my-auto items-center font-bold text-gray-400">

                        <form action="" class="flex" method="POST">

                            <input
                                class="id_produit_del"
                                type="hidden"
                                name="product_del"
                                value="<?php echo $un_produit['Id']; ?>"
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

                </div>

            <?php
                }
            }
            ?>

        </div>

        <!-- Résumé du panier -->
        <div class="md:w-4/12 md:h-96 h-56 w-full flex justify-end text-center" id="resumer_du_panier">

            <div class="w-11/12 h-full bg-pink-300">

                <!-- Titre -->
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

                    <p class="md:text-2xl text-gray-500">

                        <?php echo $prix; ?> FCFA

                    </p>

                </div>

                <!-- Total -->
                <div class="flex mx-10 md:mt-10 mt-2 md:mb-8 justify-between">

                    <p class="text-xl">
                        Total
                    </p>

                    <p class="md:text-2xl font-bold text-amber-600">

                        <?php echo $prix; ?> FCFA

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

        </div>

    </div>

</div>

<div class="h-12"></div>
<script src="jquery-4.0.0.js"></script>
<script src="ajax_sup_to_cart.js"></script>
<?php include("pied_de_page.php"); ?>
<?php
} else {

    header("location:connexion_user.php");

}
?>


