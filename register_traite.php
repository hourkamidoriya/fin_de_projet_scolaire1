<?php
include("connexion.php") ;
 if(isset($_POST)){
    if(isset($_POST["nom"])){
        $nom = $_POST["nom"] ;    }
    if(isset($_POST["email"])){
        $email = $_POST["email"] ;    }
    if(isset($_POST["pass"])){
        $pass = $_POST["pass"] ;    }
    if(isset($_POST["verif_pass"])){
        $vpass = $_POST["verif_pass"] ;    }
    if(isset($_POST["num_tel"])){
        $num_tel = $_POST["num_tel"] ;    }
    echo "$nom" ;
    echo "$email" ;
    echo "$pass" ;
    echo "$vpass" ;
    echo "$num_tel" ;
    if($pass == $vpass){      
        $requette_add_user = "INSERT INTO `utilisateur` (`id`, `nom`, `email`, `mot_de_pass`, `tel`) VALUES (NULL, '$nom', '$email', '$pass', '$num_tel')" ;
        $execute = $con->query($requette_add_user) ;
        header("location:connexion_user.php") ;
        echo ' <script>alert("moi") </script>  ' ;
    }
  echo ' <script src="js/script_inscription.js"></script>  ' ;
  };
?>


