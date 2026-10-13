const produits = document.querySelectorAll(".produits");
const mon_formulaire = document.querySelector("#mon_formulaire") ;
produits.forEach((element) => {

    element.addEventListener("mouseover", function () {
        this.querySelector(".contenaire_product").style.display = "block";
    });

    element.addEventListener("mouseout", function () {
        this.querySelector(".contenaire_product").style.display = "none";
        this.querySelector("#add-cart").style.opacity= "0"
    });

});

console.log(mon_formulaire) ;
mon_formulaire.addEventListener("submit",function(e){
    e.preventDefault();
    alert("produit ajouter au panier avec succes")
    mon_formulaire.submit()
})