<?php
session_start();
include("connexion.php") ;
if(($_POST["search"]) && !(empty($_POST["search"]))){
    $recherhe=$_POST["search"] ;
    $resuette_search="SELECT * FROM `produit`" ;
    $exe_requette_search =($con-> query($resuette_search)) ;
    $list_produit_search=$exe_requette_search->fetchAll() ;
    // var_dump($list_produit_search) ;
$nb_total=0 ;
$produit_trouver =0;
    foreach($list_produit_search as $produit_search){
        // echo $produit_search["Titre"] ."<br>" ;
        // echo $produit_search["Description"] ."<br>" ;
        $nb_total+=1 ;
        
        if(($recherhe==$produit_search["Titre"]) || ($recherhe==$produit_search["Description"]) || $recherhe==$produit_search["Prix"]){
             $produit_search["Titre"]  ." vous avez chercher ça ?" ;
             $produit_trouver+=1 ;
        }
    }

    
} else{
    header("location:page2.php") ;
}




?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/output.css">
</head>
<body>
<?php if(isset($_SESSION["utilisateur"])=="bb"){ ?> 

<div>    
</div>



    <div class="w-full h-20 bg-pink-200 grid grid-cols-2">
        <div class="flex my-">
            <div class="flex items-center gap-3 ml-28">
                <img src="asset/system-uicons_filtering.png" alt="" class="w-8 h-8">
                <p>filter</p>
                <img src="asset/Vector (6).png" alt="" class="w-5 h-5">
                <img src="asset/Vector (7).png " alt=""  class="w-5 h-5 m-5">
            </div>
            <div class=" text-center my-auto  items-center">
                <p>whowing <?php echo "1"."-"."$produit_trouver"." of ". " $nb_total "." produits " ?></p>
            </div>
        </div>
        
        <div class="flex mx-auto items-center">
            <form action="">
                <label for="">Show</label>
                <input type="text" placeholder="16" class="bg-amber-100 border rounded-xl m-5 p-2">
            </form>
            <form action="">
                <label for="">Short</label>
                <input type="text" placeholder="Defaul" class="bg-amber-100 border rounded-xl m-5 p-2">
            </form>
        </div>
     </div>
    <div>




 <div class="container mx-auto p-12 py-2">

 <?php if($produit_trouver!=0){?>
                <h1 class="text-center mb-3.5 font-bold  text-3xl"><a href="page2.php" class=" px-3 mx-3 rounded-xl bg-amber-400 border-2 duration-700 hover:text-white border-white"> retour</a>Prouduit trouvé</h1>
<?php } else {?>
            <h1 class="text-center mb-3.5 font-bold text-3xl"><a href="page2.php" class=" px-3 mx-3 rounded-xl bg-amber-400 border-2 duration-700 hover:text-white border-white"> retour</a>Aucun produit trouver</h1>
    <?php   }?>            
                <div class="h-72 mb-12 p-2.5 overflow-auto mt-6">

                        <?php foreach ($list_produit_search as $produit_search) { ?>

                            <?php if(($recherhe==$produit_search["Titre"]) || ($recherhe==$produit_search["Description"]) || $recherhe==$produit_search["Prix"]){?>
                                <div class="p-4 flex items-center gap-10 mb-5 border rounded-xl duration-500 hover:-translate-y-3.5  bg-gray-200">

                                    <img
                                        src="<?php echo $produit_search['Image']; ?>"
                                        alt=""
                                        class="w-40 h-40 object-cover rounded-xl mb-4">
                                    <div class=" h-40">
                                        <p class="text-amber-500 font-bold ">NOM</p>
                                        <p class="font-bold text-center mt-10">
                                            <?php echo $produit_search['Titre']; ?>
                                        </p>
                                    </div>

                                    <div class=" h-40">
                                        <p class="text-amber-500 font-bold">Description</p>
                                        <p class="text-center mt-10">
                                            <?php echo $produit_search['Description']; ?>
                                        </p>
                                    </div>
                                    
                                    <div class=" h-40">
                                        <p class="font-bold text-amber-500 ">prix</p>
                                        <p class="text-center mt-10 font-bold">
                                            <?php echo $produit_search['Prix']; ?>
                                        </p>
                                    </div>

                                    

                                </div>

                        <?php } ?>
                        <?php } ?>


                    </div>
</div>

<div class="h-12 md:h-0"></div>


<div>
    <?php
        include("pied_de_page.php")
    ?>
</div>
<?php }else{ ?> 
    
 <?php   header("location:connexion_user.php")  ;?>
   
<?php } ;?>  
</body>
</html>