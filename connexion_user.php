<?php
session_start();
include("connexion.php");

// Je parcours les utilisateurs
if(isset($_POST["email"]) && isset($_POST["pass"])){
    $email=$_POST["email"] ;
    $pass=$_POST["pass"] ;
    $sql="SELECT * FROM `utilisateur` WHERE email='$email' AND mot_de_pass='$pass'" ;
    $res=$con->query($sql) ;
    if($res->rowCount()>0){
        $sql="SELECT * FROM `utilisateur` WHERE email='$email' AND mot_de_pass='$pass'" ;
        $user=$res->fetchAll() ;
        foreach($user as $key){
            echo $key["id"] ;
            echo $key["mot_de_pass"] ;
            echo $key["tel"] ;
            $id_utilisateur = $key["id"] ;
            $nom_utilisateur = $key["nom"] ;

        };

        echo "Vous êtes connecté" ;
        $_SESSION["utilisateur"] = $id_utilisateur ;
        $_SESSION["user_name"] = $nom_utilisateur ;
        var_dump($_SESSION) ;
        header("location:index.php?id=".$key["id"]) ;
    }else{
        echo "<script> alert('Identifiants incorrects')</script>" ;
        // header("location:connexion_user.php?erreur=connexione_a_echouer") ;
    } 
}


if(isset($_POST["erreur"]) && $_POST["erreur"]=="connexione_a_echouer"){
    echo "<script>alert('La connexion a échoué, vérifiez votre e-mail et votre mot de passe')</script>" ;
}
?> 

<?php if(!isset($_COOKIE["name_user"])){?>

<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/output.css">
    <link rel="stylesheet" href="anime.css">
    <link rel="icon" href="asset/logo.png">
</head>
<body>

<div class="w-full h-screen bg-gray-400 flex justify-center text-center items-center py-3">
    <div class="w-11/12 h-full shadow-2xs rounded-2xl justify-center flex text-center items-center">
        <div class="w-full h-11/12 justify-center flex text-center items-center rounded-2xl">
        <div class="md:w-6/12 w-full md:h-full h-6/12 rounded-l-2xl bg-amber-300 relative justify-center flex text-center items-center">
            
            <div class="w-full h-full justify-center text-center items-center flex absolute z-0">
                <img src="asset/monlo.png" alt="" class="logo object-contain">
            </div>
            
            <div class="z-10 mt-10">
                
                <h1 class="text-4xl text-white font-bold">
                    Vous n'avez pas de compte sur cette plateforme ?
                </h1>
                
                <div class="py-3 px-5 mt-10">
                    <h1 class="text-2xl text-white font-bold mt-10">
                        Inscrivez-vous afin de pouvoir accéder à votre espace personnel et gérer toutes vos informations.
                    </h1>
                </div>
                
                <form action="register.php" class="mt-10">
                    <button class="font-bold mt-10 z-10 border border-black px-10 py-3.5 rounded-2xl text-amber-600 bg-white hover:bg-black hover:text-white">
                        S'inscrire
                    </button>
                </form>
                
            </div>
        </div>


        <div class="md:w-6/12 w-full md:h-full h-6/12 rounded-r-2xl bg-white flex justify-center text-center items-center">
            
            <div class="w-10/12 justify-end">
                
                <div class="w-full">
                    <h1 class="text-4xl text-black font-bold">
                        Bienvenue sur votre espace
                    </h1>
                </div>
                
                <form action="connexion_user.php" name="inciption" method="POST" class="rounded-4xl mt-6">
                    
                    <div class="w-full flex">
                        <label for="" class="text-amber-500 text-2xl">
                            Adresse e-mail
                        </label>
                    </div>
                    
                    <div class="flex">
                        <input type="email" name="email" id="ton_email" placeholder="abc@gmail.com" class="w-full h-11 border border-gray-400 mt-4 rounded-xl px-5">
                    </div>
                    
                    <div class="flex">
                        <label for="" class="text-amber-500 text-2xl">
                            Mot de passe
                        </label>
                    </div>
                    
                    <div class="">
                        <input type="password" name="pass" id="ton_pass" placeholder="Entrez votre mot de passe" required class="w-full h-11 border border-gray-400 mt-4 rounded-xl px-5">
                    </div>
                    
                    <div class="mt-2 justify-center text-center">
                        <button id="register" class="w-full mt-4 justify-center text-center rounded-3xl text-white font-bold text-xl h-14 p-3 border bg-amber-300 hover:bg-amber-400 cursor-pointer">
                            Se connecter
                        </button>
                    </div>
                    
                    <div class="mt-10">
                        <p>
                            Vous n'avez pas de compte ?
                            <a href="register.php" class="text-blue-500">
                                S'inscrire
                            </a>
                        </p>
                    </div>  
                    
                </form>
                
            </div>
            
        </div>
        
    </div>

</div>
```

</div>

</body>
</html>

<?php }?>

<?php if(isset($_COOKIE["name_user"])){
    header("location:index.php") ;
}?>

</body>
</html>
