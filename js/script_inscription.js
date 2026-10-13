



function inscrire() {


    let password = document.querySelector("#pass").value;
    let password_verif = document.querySelector("#vpass").value;
    const button = document.querySelector("#register");

  if (password === password_verif) {
    
    console.log("Les mots de passe correspondent.");
    alert("Inscription réussie !" + password + " et " + password_verif);
  } else {
    button.disabled = true;
    console.log("Les mots de passe ne correspondent pas.");
    alert("Les mots de passe ne correspondent pas. Veuillez réessayer.");
  }
}

