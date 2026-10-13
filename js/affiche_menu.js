const button_menu = document.querySelector("#Menue");
const ma_div_caher= document.querySelector("#le_menu");

const panier = document.querySelector(".panier_div_caher");
const user= document.querySelector(".moi_div_caher");

button_menu.addEventListener("click",function () {
    ma_div_caher.classList.toggle("hidden") ;
})


user.addEventListener("click",function () {
    console.log(user)
    ma_div_caher.classList.add("hidden") ;
})



panier.addEventListener("click",function () {
    console.log(panier)
    ma_div_caher.classList.add("hidden") ;
})
