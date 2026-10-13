<?php 
$title="admin gestion" ;
$banner="non" ;
include("connexion.php") ;
$nb_produit=0 ;
$produit_par_pg =10 ;

if(isset($_POST["page"])){
    $page_actuelle=$_POST["page"] ;

}else{
    $page_actuelle=1 ;
}



if(isset($_GET["categorie"])){
    $la_categorie=(int)$_GET["categorie"] ;
    if($la_categorie > 0){
        $requette_affiche_admin = "SELECT * FROM `produit` WHERE `Id_categori`= $la_categorie" ;

    }else{
        $requette_affiche_admin = "SELECT * FROM `produit`" ;

   }
}
else{
    $requette_affiche_admin = "SELECT * FROM `produit`" ;
    $la_categorie="0" ; 
}

$exe_requette_affiche_admin = $con->query($requette_affiche_admin) ;
$liste_produits_admin = $exe_requette_affiche_admin->fetchAll() ;
foreach($liste_produits_admin as $produit_admin){
    $produit_admin["Titre"]."<br>" ;
    $nb_produit+=1 ;
}

//je calcule le nombre de page
$nb_page=ceil($nb_produit / $produit_par_pg) ;


?>


<?php
if(isset($_POST["sup"])){
    $sup=$_POST["sup"] ;
    $requette_sup_admin=" DELETE FROM produit WHERE `produit`.`Id` = $sup" ;
    $requette_sup_admin_exe = $con->query($requette_sup_admin);
    
}

$requette_affiche_categorie ="SELECT * FROM `categorie` " ;
$requette_affiche_categorie_exe = $con->query($requette_affiche_categorie) ;
$la_liste_des_categori = $requette_affiche_categorie_exe->fetchAll() ;









?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GESTION DE PRODUIT</title>
    <link rel="stylesheet" href="css/output.css">
    <link rel="icon" href="asset/ChatGPT Image Aug 19, 2026, 09_32_59 AM.png">
</head>
<body>
    
    <div class="w-full h-10 text-center items-center px-10 mb-5  mt-10 flex justify-between">

    <div>
        <form action="" method="get">
            <input type="hidden" name="categorie" value="0">
            <button class="cursor-pointer pb-2 <?php if(!isset($_GET["categorie"])||(($_GET["categorie"]==0)) ){echo'font-bold border-b-4 border-b-blue-500 ' ;}?>">Tous nos produit</button>  
        </form>
    </div>
<?php foreach($la_liste_des_categori  as $une_categori){ ?>
    <div>
        <form action="" method="get">
            <input type="hidden" name="categorie" value="<?php  echo $une_categori["Id"] ?>">
            <button class="cursor-pointer pb-2 <?php if((isset($_GET["categorie"])) and $_GET["categorie"]==$une_categori["Id"]  ){echo'font-bold  border-b-4 border-b-blue-500' ;}?>"><?php  echo $une_categori["nom"] ?></button>  
        </form>
    </div>  
<?php } ?>
</div>

<div class="w-full justify-center text-center flex items-center">

<table class="w-11/12 bg-amber-500 border-2 mb-6">
    <tr class="w-full bg-amber-300 border-2 h-10">
        <th>Image</th>
        <th>Titre</th>
        <th>Description</th>
        <th>Prix</th>
        <th colspan="2">Action</th>
    </tr>
<?php
foreach($liste_produits_admin as $produit_admin){?>
    <tr class="w-full bg-white border-2 h-20">
        <td class="h-20 border w-20 "><img src="<?php echo $produit_admin["Image"] ;?>" alt="" class="h-20 w-full object-contain"></td>
        <td class="h-20 border w-40"><?php echo $produit_admin["Titre"] ;?></td>
        <td class="h-20 border w-6/12"><?php echo $produit_admin["Description"] ;?></td>
        <td class="h-20 border"><?php echo $produit_admin["Prix"] ;?> Fcfa</td>

        <form action="edit_admin.php" method="post">
            <td> <button  class=" py-2 px-6 rounded border-white cursor-pointer bg-red-500 my-3">edit</button></th>
            <input type="hidden" name="edit" value="<?php echo $produit_admin["Id"] ;?>">
        </form>

        <form action="" method="post">
            <td> <button  class=" py-2 px-6 rounded border-white cursor-pointer bg-amber-400 my-3">sup</button></th>
            <input type="hidden" name="sup" value="<?php echo $produit_admin["Id"] ;?>">
        </form>
    </tr>
<?php }?>
</table>
</div>




<?php
include("pied_de_page.php")
?>




</body>
</html>