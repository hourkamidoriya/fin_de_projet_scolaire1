 const mes_image=document.querySelectorAll(".object-carosel");
 const nb_image =mes_image.length ;
 const suivant = document.querySelector("#suivant")
 const precedent = document.querySelector("#precedent")
 let count = 0 ;
 console.log("j'ai ete cliquer")



 suivant.addEventListener("click", function(){
    mes_image[count].classList.add("hidden");
    console.log(count) ;
    if(count < (nb_image-1)){
        count=count+1 ;
    }else{
        count = 0 ;
        
    }

    mes_image[count].classList.remove("hidden") ;
    console.log("j'ai ete cliquer")
 });




  precedent.addEventListener("click", function(){
    mes_image[count].classList.add("hidden");
    console.log(count) ;
    if(count > 0 ){
        count=count-1 ;
    }else{
        count = (nb_image-1) ;
        
    }

    mes_image[count].classList.remove("hidden") ;
    console.log("j'ai ete cliquer")
 });