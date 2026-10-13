




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
    <div class="w-11/12 h-full  shadow-2xs rounded-2xl justify-center flex text-center items-center ">
        <div class="w-full h-11/12 justify-center flex text-center items-center  rounded-2xl">
            <div class="w-6/12 h-full  rounded-l-2xl bg-amber-300 relative justify-center flex text-center items-center">
                <div class="w-full h-full justify-center text-center items-center flex absolute z-0">
                    <img src="asset/monlo.png" alt="" class="logo object-contain">
                </div>
                <div class="z-10 mt-10 ">
                    <h1 class="text-4xl text-white font-bold">avez vous deja  de compte sur cette platforme ? </h1>
                    <div class="py-3 px-5 mt-10">
                        <h1 class="text-2xl text-white font-bold mt-10 ">connexter et vous et gérer vos commande et produit ici</h1>
                    </div>
                    <form action="connexion_user.php" class="mt-10">
                        <button class="  font-bold mt-10  z-10  border border-black px-10 py-3.5 rounded-2xl text-amber-600 bg-white hover:bg-black hover:text-white ">connexion</button>
                    </form>
                    
                </div>
            </div>


            <div class="w-6/12 h-full rounded-r-2xl  bg-white flex justify-center text-center items-center ">
                <div class=" w-10/12 justify-end ">
                    <div class="w-full flex justify-end">
                        <h1 class="text-4xl text-black font-bold">Créé votre compte d'utilisateur ICI  </h1>
                    </div>
                <form action="register_traite.php" method="post" name="inciption" class="rounded-4xl ">
                    <div class="">
                        <div class="w-full  flex mt-3" >
                            <label for="" class="">Votre Nom</label>
                        </div>
                        <input type="text" name="nom" id="" placeholder="abc"  required class="w-full h-11 border border-gray-400  rounded-xl px-5">
                    </div>

                    <div class="">
                        <div class="w-full  flex mt-3" >
                            <label for="" class="">adresse emal</label>
                        </div>
                        <input type="email" name="email" id="" placeholder="abc@gamil.cm" class="w-full h-11 border border-gray-400  rounded-xl px-5 ">
                    </div>
                    <div class="" > 
                        <div class="w-full  flex mt-3" >
                            <label for="" class="">Password</label>
                        </div>
                        <input type="password" name="pass" id="pass" placeholder="entrer votre mot de passe " required class="w-full h-11 border border-gray-400  rounded-xl px-5 ">
                    </div>
                
                    <div class="" > 
                        <div class="w-full  flex mt-3" >

                            <label for="" class="">Password</label>
                        </div>
                        <input type="password" name="verif_pass" id="vpass"  placeholder="Verifier votre mot de passe " required class="w-full h-11 border border-gray-400  rounded-xl px-5 ">
                    </div>

                    <div class="" > 
                        <div class="w-full  flex mt-3" >
                            <label for="" class="">N° de telephone</label>
                        </div>
                        
                        <input type="tel" name="num_tel" id="" placeholder="entrer votre numero de tel " required class="w-full h-11 border border-gray-400  rounded-xl px-5 ">
                    </div>

                    <div class=" justify-center text-center mt-3 ">
                    <button onclick="inscrire()" id="register" class="w-full justify-center text-center rounded-3xl text-white font-bold text-xl h-14 border bg-amber-300  ">S'inscrire</button>
                    </div>
                        <div class="mt-2">
                            <p>ave vous deja un compte ? <a href="connexion.php" class="text-blue-500">Se connecter</a></p>
                        </div> 

                </form>


                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>

</body>
</html>



























