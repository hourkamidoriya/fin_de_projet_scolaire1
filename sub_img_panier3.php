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

echo('<div class="lg:w-3/12 md:w-4/12 sm:w-5/12 w-12/12 p-5   justify-center bg-white   h-full text-center items-center" id="visuel_panier">
    <h2 class="sm:text-2xl text-xl  font-bold">Shopping Cart</h2>
    <div class="mt-2 bg-gray-200 h-0.5 w-full"></div>
<div class=" overflow-y-auto h-9/12  justify-center text-center items-center mx-auto ">') ;
$prix=0 ;
if(!empty($produit_panier)) {
foreach ($produits_panier as $produit_panier){
  $requette_produits = "SELECT * FROM `produit` WHERE `Id` = ".$produit_panier['produit_id'] ;
  $requette_produits_exe = $con->query($requette_produits) ;
  $tous_les_produit = $requette_produits_exe->fetchAll() ;
  foreach ($tous_les_produit as $un_produit){

echo('<form action="page_de_clique_sur_un_produit.php" method="POST" class=" mx-auto w-full flex justify-center items-center text-center">
  <div class="w-11/12 md:mt-5 mt-2 bg-white md:h-32 h-24 flex border rounded-xl items-center text-center cursor-pointer hover:-translate-y-3.5 duration-700" >
      <div class=" bg-white w-4/10 flex md:ml-1 ml-2  ">
        <button class="w-full h-full rounded-2xl">
          <img src="$un_produit[\'Image\'] " alt="" class=" object-contain md:h-full md:w-full h-8/12 w-8/12   rounded-2xl ">
        </button>
        <input type="text" value="$un_produit[\'Id\']; " class="hidden" name="affiche_produit">  
      </div>                           
</form> 

<div class=" bg-white h-11/12 w-6/12  ">
      <div class="sm:mt-3.5 mt-0.5"> <h2 class="font-bold">$un_produit[\'Titre\']</h2> </div>
        <div class="sm:mt-3.5  flex justify-between mx-2.5" > <h2 class=""> $produit_panier[\'quantiter\']?> X $un_produit[\'Prix\']</h2>
        </div>
      </div>

        <form action="" class="flex" method="POST" >
          <input type="hidden" name="product_del" value="$un_produit[\'Id\']">
          $nb_produit_panier+= 1
          
          <button class="flex w-7 h-7 cursor-pointer button_del">
              <img src="asset/crois.png" alt="" class="w-6 h-6 hover:w-7 hover:h-7 object-contain" title="suprimer du panier">
          </button>  
        </form>
  </div> 
');
$prix=(int)$prix+((int)$un_produit['Prix'] * (int)$produit_panier['quantiter']);
  }
}}else{
    echo("aucun produit") ;
}
echo('


</div>


 <div class="mt-3.5"> <h2 class="font-bold"> le prix total est  $prix</h2>

</div>

 <div class="mt-3.5 flex w-full">
  <form action="cart.php" class="w-6/12 ">
    <button class="text-white z-10  hover:cursor-pointer bg-amber-500 border rounded-xl p-3  w-11/12">Cart</button>
  </form>  
  <form action="page7.php" class="w-6/12">
    <button class="text-white z-10  hover:cursor-pointer bg-amber-500 border rounded-xl p-3  w-11/12 ">Chekout</button>
  </form>
</div>

</div>
</div>

')
?>