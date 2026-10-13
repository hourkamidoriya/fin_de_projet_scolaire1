const moins = document.querySelector("#moins");
const plus = document.querySelector("#plus");
let valeur = document.querySelector("#valeur").innerText  ;
let quantiter = document.querySelector("#quantiter").value ;
console.log(quantiter) ;

console.log(moins)
console.log(valeur)
console.log(plus)

let id_product = document.querySelector("#id").innerText ;
console.log(id_product);



id_product_int = parseInt(id_product) ;
console.log(id_product_int) ;

let valeurpars = parseInt(valeur) ;
let quantiter_pars =parseInt(quantiter) ;
plus.addEventListener("click",function(){
    
        valeur = document.querySelector("#valeur").innerText  ;
        quantiter = document.querySelector("#quantiter").value ;

    valeurpars = parseInt(valeur) ;
    quantiter_pars =parseInt(quantiter) ;
    console.log(quantiter) ;
    if (valeurpars < id_product_int ){
        valeurpars += 1 ;
        // console.log(valeurpars) ;
        quantiter_pars =quantiter_pars + 1 ;
        document.querySelector("#quantiter").value = quantiter_pars ;
        document.querySelector("#valeur").innerText = valeurpars ;
        console.log(quantiter) ;
       
       
    }

    
})

moins.addEventListener("click",function(){
    valeur = document.querySelector("#valeur").innerText  ;
    quantiter = document.querySelector("#quantiter").value ;
    let valeurpars = parseInt(valeur) ;
    quantiter_pars =parseInt(quantiter)
    if (valeurpars > 1){
        valeurpars -= 1 ;
        
        console.log(valeurpars) ;
        quantiter_pars =quantiter_pars - 1 ;
        document.querySelector("#valeur").innerText = valeurpars ;
        document.querySelector("#quantiter").value = quantiter_pars ;
    }

    
}) ;

const formulaire = document.querySelector('form[action="ajouter_produit.php"]');

// formulaire.addEventListener("submit", function(event) {

//     event.preventDefault();

//     const donnees = new FormData(formulaire);

//     fetch("ajouter_produit.php", {
//         method: "POST",
//         body: donnees
//     })
//     .then(response => response.text())
//     .then(resultat => {
//         console.log(resultat);

//         alert("Produit ajouté au panier !");

//         // Retour à la page précédente
//         window.history.back();
//     })
//     .catch(erreur => {
//         console.error(erreur);
//         alert("Une erreur est survenue");
//     });

// });