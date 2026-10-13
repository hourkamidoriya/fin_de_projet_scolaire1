<?php
session_start() ;
include("connexion.php");

// fause requette pour conmpter
$nb = 0;

$requette = "SELECT * FROM produit";
$exe = $con->query($requette);
$list_produit = $exe->fetchAll();

foreach ($list_produit as $produit) {
    $produit["Titre"];
    $nb += 1;
}


// je verifi si la il y'a un POST page
if (isset($_GET["page"]) && !empty($_GET["page"])) {

    $page_actuelle = $_GET["page"];

} else {

    $page_actuelle = 1;

}


// je determinie le nombre d'lement par page
$nb_by_page = 20;


// je calcule le nombre de page
$nb_page = ceil($nb / $nb_by_page);



// je cherche se que je vais mettre dans la limite de ma requettte
$premier = ($page_actuelle * $nb_by_page) - $nb_by_page;



// la vrais requette maintenant avec les limite
$requette = "SELECT * FROM produit LIMIT " . $premier . "," . $nb_by_page;
$exe = $con->query($requette);
$list_produit = $exe->fetchAll();

foreach ($list_produit as $produit) {

    $produit["Titre"];
    $produit["Id_categori"];
    $produit["Description"];
    $produit["Prix"];
    $produit["Image"];
}


// la requette pour afficher les element de manier decroissant
$requette_des_nouveauter = "SELECT * FROM `produit` ORDER BY `produit`.`Id` DESC LIMIT 3";
$exe2 = $con->query($requette_des_nouveauter);
$list_new_produit = $exe2->fetchAll();


// ça c'est pour afficher un produit en particulier sur ca page puis afficher quelque produit de sa categorie

if(isset($_POST["affiche_product"])){
    
}

?>


<!-- cette partie c'est pour identifier l'utilisateur que est connecter -->

  




























<!doctype html>
<html lang="en">


<?php 
$title="Home" ;
$banner="none" ;
include ("entete.php")
?> 
<?php if(isset($_SESSION["utilisateur"])=="bb"){ ?> 
  <div>
        

    </div>

    <main class="h-screen w-full">

    
        <img
          src="asset/baner.png"
          alt=""
          class="object-cover absolute -z-10 h-full w-full "
        />
      <header class="justify-center flex h-screen  ">

        <div class="bg-amber-100 md:h-96 h-66 md:w-1/2 w-8/12 p-8 my-auto rounded-4xl mr-9 ">
          <p>New arrial</p>
          <h1 class="md:text-5xl text-2xl font-bold text-amber-600 my-4 ">
            discover our newcollection
          </h1>
          <p class="md:text-2xl text-xs mb-8">
            lorem ipsum aolor sit amet cons ecteur adipscing elit ust elit lictus
            nec ultlaùcorper mattis
          </p>
          <button class="md:px-8 md:py-4 px-2 py-1 font-bold bg-amber-600 text-white duration-700 hover:cursor-pointer md:rounded-2xl rounded-xl hover:bg-white hover:text-amber-600 ">BUY NOW</button>
        </div>
      </header>


        <div class="w-full justify-center text-center flex md:p-14">

            <div class="container h-135 px-10">

                <div class="titre">

                    <h1 class="text-2xl font-bold mb-8">
                        nouveau produits
                    </h1>

                    <p class="text-gray-500 mb-8">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </p>

                </div>

                <div class="grid grid-cols px-8 sm:px-0 md:grid-cols-3 sm:grid-cols-2   gap-6">

                    <?php foreach ($list_new_produit as $new_produit) { ?>
                        
                        <div class="p-4 border rounded-xl duration-500 hover:-translate-y-3.5 produit relatif"  style="position: relative;" >
                            
                            <img
                                src="<?php echo $new_produit['Image']; ?>"
                                alt=""
                                class="w-full h-64 object-cover rounded-xl mb-4">

                            <p class="font-bold">
                                <?php echo $produit['Titre']; ?>
                            </p>

                            <p>
                                <?php echo $new_produit['Description']; ?>
                            </p>

                            <p>
                                <?php echo $new_produit['Prix']; ?>
                            </p>
                            <button class="opacity-0">Acheter</button>
                        </div>

                    <?php } ?>

                </div>

                <div class="titre mb-4">

                    <h1 class="text-2xl font-bold">
                        NOS produis
                    </h1>

                </div>

<div class=" mx-auto  py-2">
                <h1 class="text-center mb-3.5 font-bold text-3xl"></h1>
                <div class="md:container mx-auto py-2 ">
                <h1 class="text-center sm:mb-3.5 font-bold sm:text-3xl md:text-2xl text-xl mb-2">tous nos articles</h1>
                   <div class="grid grid-cols px-8 sm:px-0 md:grid-cols-3 sm:grid-cols-2 lg:grid-cols-4   gap-6">

                        <?php foreach ($list_produit as $produit) { ?>
                            
                            <div class="shadow-2xl shadow-black/30 duration-500 hover:-translate-y-3.5 rounded-xl bg-gray-200 relative produits h-92 ">
                                <div class="w-full aspect-square overflow-hidden rounded-xl bg-white h-6/12">

                                    <img
                                        src="<?php echo $produit['Image']; ?>"
                                        alt="<?php echo $produit['Titre']; ?>"
                                        class="w-full h-full object-contain"
                                    >

                                </div>
                                <div class="px-4 pt-3  h-40 overflow-y-hidden">
                                    <p class="font-bold text-center">
                                        <?php echo $produit['Titre']; ?>
                                    </p>
                                    <div class="">
                                        <p class=" line-clamp-3">
                                            <?php echo $produit['Description']; ?>
                                        </p>
                                    </div>
                                    <p class="text-center ">
                                        <?php echo $produit['Prix']; ?> FCFA
                                    </p>
                                </div>
                                    
                                    
                                    <div class="hidden  contenaire_product text-center   absolute w-full h-full top-0 mx-auto right-0">
                                        <form action="page_de_clique_sur_un_produit.php" method="POST" class="flex justify-center absolute w-full h-full -mt-6 text-center items-center mb-3.5">
                                            <button class="py-3 p-5 absolute  font-bold  z-10 my-auto w-11/12 bg-white text-amber-600 rounded-xl hover:bg-amber-600  hover:text-white" id="add_cart">Add to cart</button>
                                            <input type="text" value="<?php echo $produit['Id']; ?>" class="hidden" name="affiche_produit">                             
                                        </form>    
                                    
                                       
                                        <form action="" class="absolute w-full h-full pt-6 flex justify-center text-center items-center px-6">
                                            <div class="items-center  flex w-full  justify-between  pt-6"> 
                                                <button  class="flex text-white z-10 pt-6 hover:cursor-pointer"><img src="asset/fond-noir (2).png" alt="ss" class="object-contain w-4 mr-3"> <span class="underline">Share</span> </button> 
                                                <button class="flex  text-white z-10 pt-6 hover:cursor-pointer"><img src="asset/fond-noir (1).png" alt="ss" class="object-contain  w-4 mr-3">  <span class="underline">Share</span> </button> 
                                            </div>
                                        </form>
                                        <div class="h-full w-full bg-black opacity-50 absolute rounded-xl  z-0"></div>
                                    </div> 
                            </div>
                            
                        <?php } ?>

                    </div>

    </div>


                <div class="flex justify-center gap-3.5 my-6 "> <?php for ($i=1 ;$i<=$nb_page ;$i++) {?>
                    <?php if($i == $page_actuelle){ ?>
                        <p class="py-3  px-7 rounded-xl shadow-2xl bg-gray-400 " > <?php echo $i?></p>
                    <?php } else { ?>
                        <a href="page2.php?page= <?php echo $i ; ?>"><p class="py-3  px-7 rounded-xl shadow-2xl bg-amber-400 " > <?php echo $i?></p></a>
                    <?php } ?>
                  <?php }?>
                </div>
    </main>
    <script src="scrip.js"></script>
<div class="h-12 md:h-0"></div>
</body>
<?php }else{ ?> 
    
 <?php   header("location:connexion_user.php")  ;?>
     
<?php } ;?>

</html>