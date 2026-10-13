const stripe = stripe("pk_test_51U86kXCwobABR2TMdAdEJiIPZhYNzkC4I1mYu9DGzFJs5Ro0FWUQBNOrnQlzo3ftqm0Jj5Sf9zEHlPApapd-rWsAHREzkweiTw") ;
const bouton = document.querySelector("#Btn") ;
bouton.addEventListener("click" ,()=>{
    fetch("/checkout.php",{
        method:"POST" ,
        headers:{
            "conten-type" :"application/json"
        },
        body:JSON.stringify({})
    }).then(res=> res.json)
    .then(payload=>{
        stripe.redirectocheckout({sessionId:payload.id})
    })
})

console.log(bouton) ;
alert("jlskdjlfjsl") ;