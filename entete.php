<?php
if (isset($_SESSION["utilisateur"])){
include("connexion.php") ;
$id = $_SESSION["utilisateur"] ;
$nom = $_SESSION["user_name"] ;

// ici je vais gérer le panier 
$requette_panier = "SELECT * FROM `panier_produits` WHERE `utilisateur_panier` = ".$id ;
$requette_panier_exe = $con->query($requette_panier) ;
$produits_panier =$requette_panier_exe->fetchAll() ;
// echo "<pre>" ;
// var_dump($produits_panier) ;
// echo "<pre>";
foreach ($produits_panier as $produit_panier){
// echo "<pre>" ;
// var_dump($produit_panier) ;
// echo "<pre>";
  $requette_produits = "SELECT * FROM `produit` WHERE `Id` = ".$produit_panier['produit_id'] ;
  $requette_produits_exe = $con->query($requette_produits) ;
  $tous_les_produit = $requette_produits_exe->fetchAll() ;
  // echo "<pre>" ;
  // var_dump($tous_les_produit) ;
  // echo "<pre>" ;

}

}

$nb_produit_panier =0 ;
?>




<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ?></title>
  <link rel="stylesheet" href="css/output.css">
  <link rel="icon" href="asset/ChatGPT Image Aug 19, 2026, 09_32_59 AM.png">
</head>
<body>
<?php if(!isset($_SESSION["utilisateur"])){?> 

<div class=" w-full  absolute z-10 hidden voila duration-700 mt-10 justify-end "  >
  <div class="w-full p-5  justify-end h-72  flex">
      <div class="button bg-pink-200 w-4/12 duration-700  rounded-2xl p-5 justify-center  text-center items-center">
          <form action="connexion_user.php" class="mt-5 w-8/12 mb-3 duration-700 hover:bg-black  hover:text-white h-10  rounded-2xl bg-white text-2xl text-black mx-auto">
          <button class="w-full">   <p href="connexion_user.php" class=" ">Se Connecter</p> </button>
          </form>
          <form action="register.php" class="mt-5 w-8/12  h-10 rounded-2xl bg-white text-2xl text-black  hover:bg-black  hover:text-white  -translate-y-3.5 mx-auto">   
           <button class="w-full"> <p href="register.php" class=" ">s'incrire</p> </button>
          </form>
          <!-- <div class=" p-2.5">
              <h2><a href="" class="text-blue-500 duration-700 underline hover:text-2xl "> mes commandes</a></h2>
          </div>
          <div class=" p-2.5">
              <h3><a href="" class="text-blue-500 duration-700 underline hover:text-2xl ">mes produit</a></h3>
          </div> -->
      </div>    
  </div>
</div>
<?php } else{?>

<div class=" md:w-11/12 fixed absolute z-40 hidden voila duration-700 mt-10 justify-end "  >
<div class="w-full p-5 flex justify-end">

    <div class="bg-pink-200 w-4/12 min-w-[320px] rounded-3xl p-7 text-center shadow-2xl shadow-pink-300/40 border border-pink-300 transition duration-500 hover:shadow-pink-400/50">


        

        <p class="text-sm uppercase tracking-[4px] text-pink-600 font-semibold">
            Bienvenue
        </p>


        <h2 class="text-3xl font-bold text-gray-800 mt-2">
            <?php echo htmlspecialchars($_SESSION['user_name']); ?>
        </h2>
        <div class="w-16 h-1 bg-pink-500 rounded-full mx-auto my-6">
        </div>
        <a href="#"
           class="block w-10/12 mx-auto mb-4 py-3 rounded-xl bg-white text-gray-700 font-semibold shadow-sm  hover:scale-105 transition duration-300">Mes commandes</a>
        <a href="#"
           class="block w-10/12 mx-auto mb-6 py-3 rounded-xl bg-white text-gray-700 font-semibold shadow-sm  hover:scale-105 transition duration-300">Mes produits</a>
        <div class="w-full h-px bg-pink-300 mb-6">
        </div>

        <form action="deconnexion.php">

            <button type="submit"
                    class="w-10/12 h-11 rounded-xl bg-gray-800 text-white font-semibold hover:bg-red-500 hover:scale-105 cursor-pointer transition duration-300">Se déconnecter </button>
        </form>


    </div>

</div>
</div>






<!-- je vais code le panier  -->


















<div class=" w-full  absolute  h-12/12 hidden voila2 z-40 fixed rounded-xl  duration-700 justify-end " id="produit_del_actual2" >
<div class="lg:w-3/12 md:w-4/12 sm:w-5/12 w-12/12 p-5   justify-center bg-white   h-full text-center items-center" id="visuel_panier">
    <h2 class="sm:text-2xl text-xl  font-bold">Shopping Cart</h2>
    <div class="mt-2 bg-gray-200 h-0.5 w-full"></div>
<div class=" overflow-y-auto h-9/12  justify-center text-center items-center mx-auto ">
<?php
$prix=0 ;
 if(!empty($produit_panier)) {
foreach ($produits_panier as $produit_panier){
  // echo $produit_panier["produit_id"] ;
  // echo "<br>" ;
  $requette_produits = "SELECT * FROM `produit` WHERE `Id` = ".$produit_panier['produit_id'] ;
  $requette_produits_exe = $con->query($requette_produits) ;
  $tous_les_produit = $requette_produits_exe->fetchAll() ;
  foreach ($tous_les_produit as $un_produit){   ?>
<form action="page_de_clique_sur_un_produit.php" method="POST" class=" mx-auto w-full flex justify-center items-center text-center">
  <div class="w-11/12 md:mt-5 mt-2 bg-white md:h-32 h-24 flex border rounded-xl items-center text-center cursor-pointer hover:-translate-y-3.5 duration-700" >
      <div class=" bg-white w-4/10 flex md:ml-1 ml-2  ">
        <button class="w-full h-full rounded-2xl">
          <img src=" <?php echo $un_produit['Image']?> " alt="" class=" object-contain md:h-full md:w-full h-8/12 w-8/12   rounded-2xl ">
        </button>
        <input type="text" value="<?php echo $un_produit['Id']; ?>" class="hidden" name="affiche_produit">  
      </div>                           
</form> 
      
<div class=" bg-white h-11/12 w-6/12  ">
      <div class="sm:mt-3.5 mt-0.5"> <h2 class="font-bold"><?php echo $un_produit['Titre']?></h2> </div>
        <div class="sm:mt-3.5  flex justify-between mx-2.5" > <h2 class="">   <?php echo $produit_panier['quantiter']?> X <?php echo $un_produit['Prix']?></h2>
        </div>
      </div>

        <form action="" class="flex" method="POST" >
          <input type="hidden" name="product_del" value="<?php echo $un_produit['Id']?>">
          <?php $nb_produit_panier+= 1?>
          
          <button class="flex w-7 h-7 cursor-pointer button_del">
              <img src="asset/crois.png" alt="" class="w-6 h-6 hover:w-7 hover:h-7 object-contain" title="suprimer du panier">
          </button>  
        </form>
  </div> 
  <?php $prix=(int)$prix+((int)$un_produit['Prix'] * (int)$produit_panier['quantiter']) ;?>

<?php }?>

<?php }?>
<?php }else{
  echo" <p>aucun produit dans  votre </p>" ;
}?>

</div>


 <div class="mt-3.5"> <h2 class="font-bold"> le prix total est   <?php echo $prix?></h2>

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
















<?php }?>












<div>
<nav class="fixed bottom-0 left-0 w-full bg-white shadow-lg p-4 z-50 h-12 md:hidden mt-20">
    <div class="flex justify-around items-center h-full">
        <a href="index.php"><img src="asset/icons8-home-48.png" alt="" class="h-8/12 w-8/12"></a>
        <div class="relative" id="nb_produit_panier">
          <?php if($nb_produit_panier >= 1){?>
          <div class=" bg-red-500 z-0  w-5 h-5 rounded-2xl absolute justify-center text-center flex items-center bottom-4">
          <?php echo $nb_produit_panier ?>
          </div>
          <?php }?>
          <img src="asset/cart1.png" id="hh" alt="" class="z-0 w-8  cursor-pointer object-contain "/>
        </div>  
    
          <div class="sm:w-10 sm:h-10 h-8 w-8 rounded-lg md:mr-4 sm:rounded-3xl flex items-center text-center justify-center">
            <img src="asset/icons8-account-64.png" alt="" class="w-6 h-6  cursor-pointer object-contain" id="moi" />
          </div>
          <div>
            <a href="page2.php">
              <img src="asset/icons8-shopping-bags-64.png" alt="" class="z-0 w-6  cursor-pointer object-contain " >
            </a>
          </div>
          <div>
            <a href="page7.php">
            <img src="asset/icons8-checkout-55.png" alt="" class="z-0 w-6  cursor-pointer object-contain " >
            </a>
          </div>

            <div>
            <a href="page9.php">
            <img src="asset/icons8-mail-48.png" alt="" class="z-0 w-6  cursor-pointer object-contain " >
            </a>
          </div>
    </div>
</nav>



<nav class="bg-white items-center md:flex gap-3.5 md:mb-4 pt-2 md:justify-between fixed z-30 w-full px-3.5 py-2 shadow shadow-black shadow-sl">
      <div class=" items-center flex justify-between md:justify-normal">
        <div class="flex">
          <img src="asset/ChatGPT Image Aug 19, 2026, 09_32_59 AM.png" alt="mon LOGO" class="lg:w-15 w-12 lg:ml-3  object-contain md:mr-0 mr-2" />
          <h1 class="font-bold text-2xl">Funiro</h1>
        </div>
     
        <form action="page_de_recherche.php" method="POST" class=" text-center  flex justify-end">
          
            <input type="text" class=" outline-0 border-b-2 required w-46 h-10 p-1 md:hidden  pr-8" placeholder="rechercer un produit" name="search" >
            <div class="absolute mt-2.5 md:hidden">
                <button type="submit" class=" hover: cursor-pointer"><img src="asset/Vector (3).png" alt="" class="w-5 z-10   mr-2 " /> </button>
            </div>
        </form>
      </div>

      <div class="w-full md:w-6/12 justify-center px-3 text-center md:flex items-center  h-12 hidden">
        <ol class="flex w-full justify-between">
          <li class="duration-500 hover:text-xl hover:text-blue-400">
            <a href="index.php">Home </a>
          </li>
          <li class="duration-500 hover:text-xl hover:text-blue-400 ">
            <a href="./page2.php" class="<?php if($title== "Shop") {echo 'font-bold' ;}?>" >Shop </a>
          </li>
          <li class="duration-500 hover:text-xl hover:text-blue-400">
            <a href="page7.php" class="<?php if($title== "Checkout") {echo 'font-bold' ;}?>" >checkout </a>
          </li>
          <li class="duration-500 hover:text-xl hover:text-blue-400">
            <a href="page9.php" class="<?php if($title== "Contact") {echo 'font-bold' ;}?>">Contact</a>
          </li>
        </ol>
      </div>

      <div class="md:flex gap-10 items-center sm:relative hidden">
          <div class="sm:w-10 sm:h-10 h-8 w-8 rounded-lg md:mr-4 sm:rounded-3xl flex items-center text-center justify-center">
            <img src="asset/Sample_User_Icon.png" alt="" class="w-8 h-8  cursor-pointer object-contain" id="heille" />
          </div>
        <div class="flex gap-1.5 relative w-45 items-center justify-end">
        <form action="page_de_recherche.php" method="POST" class=" text-center  flex justify-end mx-3">  
            <input type="text" class=" outline-0 border-b-2 required w-46 h-10 p-1 pr-8" placeholder="rechercer un produit" name="search" >
            <div class="absolute mt-2.5 ">
                <button type="submit" class=" hover: cursor-pointer"><img src="asset/Vector (3).png" alt="" class="w-5 z-10   mr-2 " /> </button>
            </div>
        </form>
        <?php if($nb_produit_panier>0){ ?>

        <?php } ?>
        <div class="relative " id="nb_produit_panier2">
          <?php if($nb_produit_panier >= 1){?>
          <div class=" bg-red-500 z-0  w-5 h-5 rounded-2xl absolute justify-center text-center flex items-center bottom-4">
          <?php echo $nb_produit_panier ?>
          </div>
          <?php }?>
          <img src="asset/cart1.png" id="hhh" alt="" class="z-0 w-8 mr-10 cursor-pointer object-contain "/>
        </div>  
      </div>


  </nav>
<?php if($banner=="yes"){ ?>  
    <div
      class="relative flex mx-auto justify-center text-center min-h-auto items-center pt-5"
    >
      <div class="w-full md:h-72 h-36 mt-10 m-2">
        <img src="asset/baniere.png" alt="" class=" w-full h-full" />
      </div>

      <div class="absolute justify-center text-center">
        <img src="asset/ChatGPT Image Aug 19, 2026, 09_32_59 AM.png" alt="" class="w-20 md:w-26  mx-auto object-contain" />
        <ol>
          <div>
            <li>
              <h1 class="md:text-5xl text-2xl text-black font-bold"><?php echo $title ?> <br /></h1>
            </li>
          </div>

          <div class="flex mt-3 justify-center items-center">
            <li class="flex" >
              <a
                href=""
                class="text-1xl duration-500  hover:text-blue-400 md:hover:text-2xl"
                >Home</a
              >
             <img src="asset/dashicons_arrow-down-alt2.png" alt="" class="w-4 mt-1 object-contain" > 
            </li>
            <li>
              <a
                href=""
                class="text-xl duration-500 hover:text-blue-400 md:hover:text-2xl"
                ><?php  echo $title?></a
              >
            </li>
          </div>
        </ol>
      </div>
    </div>
<?php }?>  
<script src="jquery-4.0.0.js"></script>
<script src="js/script.js"></script>
<script src="js/affiche_menu.js"></script>
<script src="ajax_sub_to_cart2.js"></script>
<script src="ajax_sup_to_cart.js"></script>