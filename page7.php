<?php
session_start();
$title="Checkout"?>

<?php
$banner="yes" ;
if(isset($_SESSION["utilisateur"])=="bb"){ ?> 
<?php include("entete.php")?>

<section class="max-w-7xl mx-auto py-16 px-6">
      <div class=" text-center items-center flex justify-center gap-20">
        <div>
          <h2 class="text-3xl font-bold mb-10">Billing details</h2>

          
    

        <div>
          <div class="flex justify-between border-b pb-5">
            <div>
              <h3 class="font-semibold text-xl">Product</h3>
<!-- la partie des prix  -->

              <div class="mt-5 space-y-4">

<?php    foreach ($produits_panier as $produit_panier){
  // echo $produit_panier["produit_id"] ;
  // echo "<br>" ;
   
 
  $requette_produits = "SELECT * FROM `produit` WHERE `Id` = ".$produit_panier['produit_id'] ;
  $requette_produits_exe = $con->query($requette_produits) ;
  $tous_les_produit = $requette_produits_exe->fetchAll() ;
  foreach ($tous_les_produit as $un_produit){   ?>
  <div class="h-12">
    <p class="text-gray-500 font-bold "> <?php echo $un_produit["Titre"] . "    X ".$produit_panier['quantiter'] ?></p>
  </div> 
  <?php }?>

<?php }?>
                

                <p class="font-semibold text-black">Total</p>
              </div>
            </div>
<!-- la partie des prix  -->


            <div class="text-right">
              <h3 class="font-semibold text-xl">Subtotal</h3>

<div class="mt-5 space-y-4">
<?php    foreach ($produits_panier as $produit_panier){
  // echo $produit_panier["produit_id"] ;
  // echo "<br>" ;
   
 
  $requette_produits = "SELECT * FROM `produit` WHERE `Id` = ".$produit_panier['produit_id'] ;
  $requette_produits_exe = $con->query($requette_produits) ;
  $tous_les_produit = $requette_produits_exe->fetchAll() ;
  foreach ($tous_les_produit as $un_produit){   ?>
  <div class="h-12">
    <p> <?php echo ($un_produit["Prix"] * $produit_panier['quantiter']) ?> Fcfa</p>
  </div> 
<?php }?>

<?php }?>


                

              <p class="text-2xl font-bold text-yellow-700"><?php echo  $prix ?> Fcfa</p>
              </div>
            </div>








          </div>

          <div class="mt-8 space-y-5">
            <div>
              <label class="flex items-center gap-3">
                <input type="radio" name="type" />

                <span class="font-medium"> Direct Bank Transfer </span>
              </label>

              <p class="text-gray-500 text-sm mt-3 leading-7">
                Make your payment directly into our bank account. Please use
                your Order ID as the payment reference.
              </p>
            </div>

            <div>
              <label class="flex items-center gap-3">
                <input type="radio" name="type" />

                Cash On Delivery
              </label>
            </div>

            <p class="text-sm leading-7 text-gray-600">
              Your personal data will be used to support your experience
              throughout this website.
            </p>
<form action="checkout.php">
  <?php if($prix >= 1){?>
            <button class="mt-8 border border-black rounded-xl px-16 py-4" id="Btn">Payer </button>
  <?php } ?>
          </div>
        </div>
      </div>
</section>

</form> 
<div>
  <?php 
    include("pied_de_page.php")
  ?>

</div>
<div class="h-12 md:h-0"></div>
</body>

<?php }else{ ?> 
    
 <?php   header("location:connexion_user.php")  ;?>
     
<?php } ;?>
</html>
