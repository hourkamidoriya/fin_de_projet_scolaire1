<?php
include("connexion.php") ;
$title="ajourter un produit";
$banner="yes" ;
include("entete.php");
if(isset($_POST["Id_user"])){
    $image=$_FILES["Image1"] ;
    $image2=$_FILES["Image2"] ;
    $image3=$_FILES["Image3"] ;
    $image4=$_FILES["Image4"] ;
    echo $image4["tmp_name"] ;
}

$requette_categori="SELECT * FROM `categorie`" ;
$requette_categori_exe=$con->query($requette_categori) ;
$list_categorie=$requette_categori_exe->fetchAll();

foreach($list_categorie as $categori){
    $categori["nom"];
}


?>
<div class="container w-full  flex justify-center text-center items-center">
<div class="container w-6/12  flex justify-center text-center items-center">

        <form action="ajoute_produit_by_admin_traitement.php" method="POST" enctype="multipart/form-data" class=" border border-pink-300 h-full w-full rounded-4xl p-5 mb-8">

        

        
            <div class="mt-2">
                <label for="" class=" font-bold text-blue-600">Nom Du Produit</label>
                <input type="text" name="nom" placeholder="Tomate Rouge" class="w-full h-11 border border-gray-400 mt-4 rounded-xl px-5" value="">
            </div>

            <div class="mt-2" > 
                <label for="" class=" font-bold text-blue-600">Image pricipale</label>
                <input type="file" required name="image" class="file:font-bold file:text-white border-2  file:border-amber-300 file:hover:text-white file:bg-blue-600 file:hover:bg-amber-300  file:px-4 w-full file:py-2 file:mr-4 file:cursor-pointer file:rounded-lg file:cursor-pointerborder border-gray-300 rounded-lg p-1">
            </div>
            <div>
                <label for="" class=" font-bold text-blue-600">Image1</label>
                <input type="file" name="image1" class="file:font-bold file:text-white border-2  file:border-amber-300 file:hover:text-white file:bg-blue-600 file:hover:bg-amber-300  file:px-4 w-full file:py-2 file:mr-4 file:cursor-pointer file:rounded-lg file:cursor-pointerborder border-gray-300 rounded-lg p-1">
            </div>
            <div>
                <label for="" class="">Image2</label>
                <input type="file" name="image2" class="file:font-bold file:text-white border-2  file:border-amber-300 file:hover:text-white file:bg-blue-600 file:hover:bg-amber-300  file:px-4 w-full file:py-2 file:mr-4 file:cursor-pointer file:rounded-lg file:cursor-pointerborder border-gray-300 rounded-lg p-1">
            </div>
            <div>
                <label for="" class=" font-bold text-blue-600">Image3</label>
                <input type="file" name="image3"  class="file:font-bold file:text-white border-2  file:border-amber-300 file:hover:text-white file:bg-blue-600 file:hover:bg-amber-300  file:px-4 w-full file:py-2 file:mr-4 file:cursor-pointer file:rounded-lg file:cursor-pointerborder border-gray-300 rounded-lg p-1">
            </div>
            
            <div class="mt-2" > 
                <label for="" class=" font-bold text-blue-600">Description</label>
                <input type="text"  name="description"  placeholder="entrer votre numero de tel " required class="w-full h-11 border border-gray-400 mt-4 rounded-xl px-5">
            </div>
            <div class="mt-2" > 
                <label for="" class=" font-bold text-blue-600">Description detailler</label>
                <textarea name="description_detailler" required class="w-full h-30 border border-gray-400 mt-4 rounded-xl px-5"></textarea>     
            </div>
            <div class="mt-2" > 
                <label for="" class=" font-bold text-blue-600">Prix</label>
                <input type="text" name="Prix"  placeholder="entrer votre numero de tel " required class="w-full h-11 border border-gray-400 mt-4 rounded-xl px-5">
            </div>
            <div class="mt-2" > 
                <label for="" class=" font-bold text-blue-600">choisiser la categorie</label>
                <select name="categori" id="" class="w-full h-11 border-gray-300 border rounded-xl outline-none">
                  <?php foreach($list_categorie as $categori){?>
                    <option value="<?php echo $categori["Id"] ?>"><?php echo $categori["nom"] ?></option>
                <?php }?>
                </select>
            </div>
            <div class="mt-2" > 
                <label for="" class=" font-bold text-blue-600">Stoke total</label>
                <input type="text" name="stok"  placeholder="entrer votre numero de tel " required class="w-full h-11 border border-gray-400 mt-4 rounded-xl px-5">
            </div>
            <div class="mt-2 justify-center text-center">
              <button  id="register" class="w-1/2 justify-center text-center rounded-3xl text-white font-bold text-xl h-14 p-3 border bg-amber-500" name="sub">Ajouter un produit</button>
            </div>
           
        </form>


</div>


</div>






<?php

include("pied_de_page.php");


?>