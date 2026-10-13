<?php 
include("connexion.php") ;
if(isset($_POST["edit"])){
    $id_produit=$_POST["edit"] ;
    $reqeuette_slect_edit="SELECT * FROM `produit` WHERE `Id`=$id_produit" ;
    $reqeuette_slect_edit_exe = $con->query($reqeuette_slect_edit);
    $produits_a_editer=$reqeuette_slect_edit_exe->fetchAll();
    foreach($produits_a_editer as $produit_a_editer){
         $produit_a_editer["Image"] ;
         $produit_a_editer["Titre"] ;
         $produit_a_editer["Description"] ;
    }
}else{
    header("location:addmin_gestion_produit.php") ;
}



?>


<?php 
$title="Editer un produit" ;
$banner="non" ;
include("entete.php") ;

?>

<div  class="flex  justify-center text-center items-center w-full mb-3">
    <div class="h-full w-7/12 mt-5">
        
        <form action="edit_produit_by_admin.php" method="POST" class=" border border-pink-300 h-full w-full rounded-4xl p-5 mb-8">

        <?php foreach($produits_a_editer as $produit_a_editer){?>

            <div class="mt-2">
                <label for="" class="">Nom Du Produit</label>
                <input type="text" name="Nom" placeholder="abc@gamil.cm" class="w-full h-11 border border-gray-400 mt-4 rounded-xl px-5" value="<?php echo $produit_a_editer['Titre'] ; ?>">
                <input type="hidden" name="Id_user" value="<?php echo $id_produit ;?>">
                <input type="hidden" name="categorie" value="<?php echo $produit_a_editer["Id_categori"] ;?>">
            </div>

            <div class="mt-2" > 
                <label for="" class="">Image</label>
                <input type="text" name="Image1" placeholder="entrer votre mot de passe " required class="w-full h-11 border border-gray-400 mt-4 rounded-xl px-5" value="<?php echo $produit_a_editer['Image'] ; ?>">
            </div>
            <div>
                <label for="" class="">Image2</label>
                <input type="text" name="Image2" placeholder="entrer votre mot de passe " class="w-full h-11 border border-gray-400 mt-4 rounded-xl px-5" value="<?php echo $produit_a_editer['image1'] ; ?>">
            </div>
            <div>
                <label for="" class="">Image3</label>
                <input type="text" name="Image3" placeholder="entrer votre mot de passe " class="w-full h-11 border border-gray-400 mt-4 rounded-xl px-5"value="<?php echo $produit_a_editer['image2'] ; ?>">
            </div>
            <div>
                <label for="" class="">Image4</label>
                <input type="text" name="Image4" placeholder="entrer votre mot de passe " class="w-full h-11 border border-gray-400 mt-4 rounded-xl px-5"value="<?php echo $produit_a_editer['image3'] ; ?>">
            </div>

            <div class="mt-2" > 
                <label for="" class="">Description</label>
                <input type="text" name="description"  placeholder="entrer votre numero de tel " required class="w-full h-11 border border-gray-400 mt-4 rounded-xl px-5"value="<?php echo $produit_a_editer['Description'] ; ?>">
            </div>
            <div class="mt-2" > 
                <label for="" class="">Description detailler</label>
                <textarea name="description_detailler" required class="w-full h-30 border border-gray-400 mt-4 rounded-xl px-5"><?php echo $produit_a_editer['description_detailer'] ; ?></textarea>     
            </div>
            <div class="mt-2" > 
                <label for="" class="">Prix</label>
                <input type="text" name="Prix"  placeholder="entrer votre numero de tel " required class="w-full h-11 border border-gray-400 mt-4 rounded-xl px-5"value="<?php echo $produit_a_editer['Prix'] ; ?>">
            </div>
            <div class="mt-2" > 
                <label for="" class="">Stoke total</label>
                <input type="text" name="stok"  placeholder="entrer votre numero de tel " required class="w-full h-11 border border-gray-400 mt-4 rounded-xl px-5"value="<?php echo $produit_a_editer['quantiter'] ; ?>">
            </div>
            <div class="mt-2 justify-center text-center">
              <button  id="register" class="w-1/2 justify-center text-center rounded-3xl text-white font-bold text-xl h-14 p-3 border bg-amber-500  ">Modifier le produit</button>
            </div>
            <?php }?>
        </form>
    </div>
</div>