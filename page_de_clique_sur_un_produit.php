<?php
session_start();

include("connexion.php") ; 



if(isset($_POST["affiche_produit"])){
    $produit_cliked=$_POST["affiche_produit"] ;

    $requette="SELECT * FROM `produit` WHERE `Id`=".$produit_cliked ;


}
else{
    header("location: page2.php") ;
}
$exe=$con->query($requette);
$mon_produit=$exe->fetchAll();

$count_image=0 ;
foreach($mon_produit as $produit_select){
    // echo $produit_select["Id_categori"] ;
    $id_produit = $produit_select["Id_categori"] ;
    $produit_select["Titre"] ;
    if(!empty($produit_select["Image"])){
        $count_image+=1 ;
    }

    if(!empty($produit_select["image1"])){
        $count_image+=1 ;
    }

    if(!empty($produit_select["image2"])){
        $count_image+=1 ;
    }

    if(!empty($produit_select["image3"])){
        $count_image+=1 ;
    }
}
// ici je vais chercher comment afficher les prosuit de la mm categori
$requette2="SELECT * FROM `produit` WHERE `Id_categori`=".$id_produit . " LIMIT "."0".","."4" ;
$exe2= $con->query($requette2) ;
$simil_produit_list=$exe2->fetchAll();

foreach($simil_produit_list as $simil_produit){
    
//    echo $simil_produit["Titre"] ;
}






// ici je vais code sur la formulaire de quand on clique sur un produit c'est juste le copier coller de se q'uil y'a dans la page 2


?>




















<?php 
$title=$produit_select["Titre"] ;
$banner="non" ;
include("entete.php") ?>  
<?php if(isset($_SESSION["utilisateur"])){ ?>  

    <div class="w-full h-15 p-4 justify-center items-center text-center flex mb-3 bg-pink-300">
        <div class=" w-full   flex  h-12 gap-2.5">
            <div class="flex items-center gap-1.5">
                <a href="">Home</a>
                <img src="asset/icon_left.png" alt="xxx" class="w-5 mt-1">
                
            </div>
            <div class="flex items-center gap-1.5">
                <a href="">Shop</a>
                <img src="asset/icon_left.png" alt="xxx" class="w-5 mt-1">
                
            </div>

            <div class="flex items-center gap-2.5">
                <div class="w-0.5 h-9/12 bg-gray-500"></div>
                <a href=""><?php echo $produit_select["Titre"] ; ?></a>   
                
                <p id="id" class="hidden"><?php echo $produit_select['quantiter']; ?></p>
            </div>

        </div>
    </div>

    <div class="w-full h-15 p-4 justify-center items-center text-center flex mb-7 bg-pink-300">
        <div class=" w-full   flex  h-12 gap-2.5">
            <div class="flex items-center gap-1.5">
                <a href="">Home</a>
                <img src="asset/icon_left.png" alt="xxx" class="w-5 mt-1">
                
            </div>
            <div class="flex items-center gap-1.5">
                <a href="">Shop</a>
                <img src="asset/icon_left.png" alt="xxx" class="w-5 mt-1">
                
            </div>

            <div class="flex items-center gap-2.5">
                <div class="w-0.5 h-9/12 bg-gray-500"></div>
                <a href=""><?php echo $produit_select["Titre"] ; ?></a>   
                
                <p id="id" class="hidden"><?php echo $produit_select['quantiter']; ?></p>
            </div>

        </div>
    </div>

 
<div class=" w-full justify-center items-center  mx-auto flex">
    <div class="grid grid-cols-1 md:grid-cols-2 container">
        <div class=" flex">
            <?php if( $count_image==4){?>
            <div class="w-12/12 h-56 md:h-98 flex justify-center rounded-2xl relative ">
                <div class="h-12/12  w-full rounded-t-2xl absolute " >                   
                    <img src="<?php echo $produit_select["Image"] ; ?>" alt="" class="h-12/12 w-full rounded-t-2xl object-contain absolute object-carosel">
                </div>
                <div class="h-12/12  w-12/12 rounded-t-2xl absolute  " >                   
                    <img src="<?php echo $produit_select["image1"] ; ?>" alt="" class="h-12/12 w-full rounded-t-2xl object-contain hidden absolute object-carosel ">
                </div>
                <div class="h-12/12  w-12/12 rounded-t-2xl absolute  " >                   
                    <img src="<?php echo $produit_select["image2"] ; ?>" alt="" class="h-12/12 w-full rounded-t-2xl object-contain hidden absolute  object-carosel">
                </div>
                <div class="h-12/12  w-12/12 rounded-t-2xl absolute  " >                   
                    <img src="<?php echo $produit_select["image3"] ; ?>" alt="" class="h-12/12 w-full rounded-t-2xl object-contain hidden absolute object-carosel ">
                </div>
                <div class="w-full h-full justify-between flex text-center items-center  absolute px-10 md:px-0 ">

                    <div class=" rounded-2xl justify-center flex items-center text-center">
                        <button type="button" class=" font-bold text-4xl text-blue-600 absolute w-12 h-12" id="precedent"> <img src="asset/prev.png" alt="" class="w-12 h-12 cursor-pointer"></button>
                    </div>

                    <div class=" rounded-2xl justify-center flex items-center text-center">
                        <button type="button" class=" font-bold text-4xl text-blue-600 absolute w-12 h-12" id="suivant"> <img src="asset/next.png" alt="" class="w-12 h-12 cursor-pointer"></button>
                    </div>  
                </div>
            </div>
            <?php } ?>

            <?php if( $count_image==3){?>
            <div class="w-12/12    h-56 md:h-98 flex justify-center rounded-2xl relative ">
                <div class="h-12/12  w-full rounded-t-2xl absolute " >                   
                    <img src="<?php echo $produit_select["Image"] ; ?>" alt="" class="h-12/12 w-full rounded-t-2xl object-contain absolute object-carosel">
                </div>
                <div class="h-12/12  w-12/12 rounded-t-2xl absolute  " >                   
                    <img src="<?php echo $produit_select["image1"] ; ?>" alt="" class="h-12/12 w-full rounded-t-2xl object-contain hidden absolute object-carosel ">
                </div>
                <div class="h-12/12  w-12/12 rounded-t-2xl absolute  " >                   
                    <img src="<?php echo $produit_select["image2"] ; ?>" alt="" class="h-12/12 w-full rounded-t-2xl object-contain hidden absolute  object-carosel">
                </div>

                <div class="w-full h-full justify-between flex text-center items-center  absolute ">

                    <div class=" rounded-2xl justify-center flex items-center text-center">
                        <button type="button" class=" font-bold text-4xl text-blue-600 absolute w-12 h-12" id="precedent"> <img src="asset/prev.png" alt="" class="w-12 h-12"></button>
                    </div>

                    <div class=" rounded-2xl justify-center flex items-center text-center">
                        <button type="button" class=" font-bold text-4xl text-blue-600 absolute w-12 h-12" id="suivant"> <img src="asset/next.png" alt="" class="w-12 h-12"></button>
                    </div>  
                </div>
            </div>
            <?php } ?>

            <?php if( $count_image==2){?>
            <div class="w-12/12    h-56 md:h-98 flex justify-center rounded-2xl relative ">
                <div class="h-12/12  w-full rounded-t-2xl absolute " >                   
                    <img src="<?php echo $produit_select["Image"] ; ?>" alt="" class="h-12/12 w-full rounded-t-2xl object-contain absolute object-carosel">
                </div>
                <div class="h-12/12  w-12/12 rounded-t-2xl absolute  " >                   
                    <img src="<?php echo $produit_select["image1"] ; ?>" alt="" class="h-12/12 w-full rounded-t-2xl object-contain hidden absolute object-carosel ">
                </div>
                <div class="w-full h-full justify-between flex text-center items-center  absolute ">

                    <div class=" rounded-2xl justify-center flex items-center text-center">
                        <button type="button" class=" font-bold text-4xl text-blue-600 absolute w-12 h-12" id="precedent"> <img src="asset/prev.png" alt="" class="w-12 h-12"></button>
                    </div>

                    <div class=" rounded-2xl justify-center flex items-center text-center">
                        <button type="button" class=" font-bold text-4xl text-blue-600 absolute w-12 h-12" id="suivant"> <img src="asset/next.png" alt="" class="w-12 h-12"></button>
                    </div>  
                </div>
            <?php } ?>

            <?php if( $count_image==1){?>
            <div class="w-12/12    h-56 md:h-98 flex justify-center rounded-2xl relative ">
                <div class="h-12/12  w-full rounded-t-2xl absolute " >                   
                    <img src="<?php echo $produit_select["Image"] ; ?>" alt="" class="h-12/12 w-full rounded-t-2xl object-contain absolute object-carosel">
                </div>
            </div>
            <?php } ?>
        </div>
        <div class=" sm:ml-10 ml-0">
          <p class="md:text-5xl text-2xl ml-1.5 sm:ml-0 ">  <?php echo $produit_select["Titre"] ; ?> </p> 
          <p class="text-xl md:text-3xl text-gray-500 p-3"> cette Article Coute  <?php echo $produit_select["Prix"] ; ?> CFA </p> 
          <div class="flex items-center ml-1.5 sm:ml-0 ">
            <?php for($i=1 ; $i<=5 ;$i++){?>
                <img src="asset/etoile.png" alt="ss" class="w-6  h-6">
            <?php } ?>
            <div class="w-0.5 h-6 bg-gray-500 mx-5 ml-1.5 sm:ml-0  "></div>
            <p class="text-gray-500 text-2xl"> custommer</p>
          </div>
          <div class="w-full h-20 md:h-30 py-2 px-3  sm:ml-0  ">
            <p> <?php echo $produit_select["Description"] ; ?></p> 
          </div>
          <div class="lg-flex mb-2.5 justify-between mt-6   w-full  sm:ml-0  ">
            <form action="ajouter_produit.php" class=" w-full   justify-between flex" method="POST" id="mon_formulaire">
                <div class="w-32 h-14 py-2 px-3 ml-4 mr-4 flex justify-between border-gray-500  items-center border rounded-2xl ">
                    <button type="button" class="text-2xl  cursor-pointer" id="moins">-</button>
                    <p id="valeur">1</p>
                    <button type="button" class=" text-2xl  cursor-pointer" id="plus" >+</button>
                </div>
                <div class="w-46 h-14 py-2 px-3  ml-4 mr-4 flex justify-center border-gray-500  items-center border rounded-2xl  hover:bg-gray-700 hover:text-white">
                    <button>Add to cart</button>
                    <input type="hidden" name="quantiter_produit" id="quantiter" value="1">
                    <input type="hidden" name="ajout_produit" value=<?php echo $produit_select["Id"] ; ?>>
                    <input type="hidden" name="prix_produit" value=<?php echo $produit_select["Prix"] ; ?>>
                </div>
            </form>


          </div>
            <div class="w-full h-0.5 bg-gray-300 mt-8">
            </div>


            <div class="grid grid-cols-2 p-2 mb-10 w-full">
                <div>
                <div class="grid grid-cols-2 gap-2 items-center">
                    <div><p>SkU </p></div>
                    <div><p>:  SkU</p></div>
                    <div><p>SkU </p></div>
                    <div><p>:  SkU</p></div>
                    <div><p>SkU </p></div>
                    <div><p>:  SkU</p></div>
                </div>  
                    <div class="flex justify-around items-center text-center w-full  mt-2 ">
                        <a href=""><img src="asset/icone_face (2).png" alt="" class="w-6 h-6"> </a>
                        <a href=""><img src="asset/icone_face (1).png" alt="" class="w-6 h-6"> </a>
                        <a href=""><img src="asset/icone_face (3).png" alt="" class="w-6 h-6"></div></a>
                    </div>
                <div></div>
                
            </div>
        </div>
    </div>
</div>
<div class="w-full h-0.5 bg-gray-500 mt-8"></div>
<div class="w-full mt-8 mb-3">
    <h2 class="font-bold  text-3xl justify-between text-center">description detailler</h2>
</div>
<div class="w-10/12 h-72  container  justify-center mx-auto pt-5 overflow-y-auto md:overflow-hidden  ">
    <p class=" "><?php echo $produit_select["description_detailer"] ; ?></p>

</div>
<div class="container flex md:gap-44 gap-2 m-10 h-36 md:h-60 justify-center  mx-auto">
    <div><img src="<?php echo $produit_select["Image"] ; ?>" alt="" class=" h-36 md:h-60"></div>
    <div><img src="<?php echo $produit_select["Image"] ; ?>" alt="" class=" h-36 md:h-60"></div>
</div>


<div class="w-full h-0.5 bg-gray-500 mt-8"></div>
<div  class=" flex justify-center text-center mt-3 mb-3" >
    <h2 class=" font-bold text-3xl" >produit similaire</h2>

</div>

<div  class=" flex justify-center text-center " >
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:gap-6 gap-1 lg:grid-cols-4 md:p-0 px-7 ">
       <?php foreach ($simil_produit_list as $simil_produit) { ?>
                            
<div class="shadow-2xl shadow-black/30 duration-500 hover:-translate-y-3.5 rounded-xl bg-gray-200 relative produits h-56 md:h-92 ">
                    <div class="w-full aspect-square overflow-hidden rounded-xl bg-white h-6/12">
                                    <img
                                        src="<?php echo $simil_produit['Image']; ?>"
                                        alt="<?php echo $simil_produit['Titre']; ?>"
                                        class="w-full h-full object-contain"
                                    >

                            </div>
                                <div class="px-4 pb-10  h-40 overflow-y-hidden">
                                    <p class="font-bold text-center">
                                        <?php echo $simil_produit['Titre']; ?>
                                    </p>
                                    <div class="">
                                        <p class=" line-clamp-3">
                                            <?php echo $simil_produit['Description']; ?>
                                        </p>
                                </div>
                                    <p class="text-center ">
                                        <?php echo $simil_produit['Prix']; ?> FCFA
                                    </p>
                            </div>
                                    
                                    
                            <div class="hidden  contenaire_product text-center   absolute w-full h-full top-0 mx-auto right-0">
                            <form action="page_de_clique_sur_un_produit.php" method="POST" class="flex justify-center absolute w-full h-full -mt-6 text-center items-center mb-3.5">
                                <button class="py-3 p-5 absolute  font-bold  z-10 my-auto w-11/12 bg-white text-amber-600 rounded-xl hover:bg-amber-600  hover:text-white" id="add_cart">Add to cart</button>
                                <input type="text" value="<?php echo $simil_produit['Id']; ?>" class="hidden" name="affiche_produit">                             
                            </form>    
                    </div>  
    <div class="hidden  contenaire_product text-center   absolute w-full h-full top-0 mx-auto right-0">

        <form action="ajouter_produit.php" method="POST">
            <button class="py-3 p-5 absolute  font-bold  z-10 mt-34 -ml-24 w-8/12 bg-white text-amber-600 " id="" type="button">Add tdsss cart</button>
            <input type="text" value="<?php echo $simil_produit['Id']; ?>" class="hidden" name="affiche_produit">                             
        </form>    
                                    
                                       
        <form action="">
            <div class="absolute px-4  items-center  flex w-full top-52"> 
                    <button  class=" w-full flex text-white z-10 hover:cursor-pointer"><img src="asset/fond-noir (2).png" alt="ss" class="w-3  mr-3"> <span class="underline">Share</span> </button> 
                    <button class=" w-full flex text-white z-10 ml-10 hover:cursor-pointer"><img src="asset/fond-noir (1).png" alt="ss" class="w-3  mr-3 ">  <span class="underline">Share</span> </button> 
            </div>
            
        </form>
            <div class="h-full w-full bg-black opacity-50 absolute  z-0"></div>
        </div>                    
                   

                    
    </div>
        <?php } ?>
    </div>
</div class="w-full ">

<?php
$footer_non = 1; 
 include("pied_de_page.php") ?>
</div>

<script src="carosel.js"></script>
<script src="hum.js"></script>
<script src="scrip.js"></script>
<div class="h-12 md:h-0"></div>
</body>

<?php }else{ ?> 
    
 <?php   header("location:connexion_user.php")  ;?>
     
<?php } ;?>
</html>