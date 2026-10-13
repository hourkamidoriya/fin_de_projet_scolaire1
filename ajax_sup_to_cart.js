$(document).ready(function () {
    const produit_del_catuelle=$("#produit_del_actual");
    let button_del =$(".button_del");
    $("#produit_del_actual").on("click",".button_del",function(e){ 
        e.preventDefault();
        
        let donner =this.previousElementSibling.value;
        
        $.ajax({
            type: "POST",
            url: "delete.php",
            data: "product_del="+donner,
            success: function (response) {
                produit_del_catuelle.html(response) ;
               
               $.ajax({
                type: "POST",
                url: "prix_total_cart.php",
                success: function (response2) {
                
                    $("#resumer_du_panier").html(response2);
                }
               });
               $.ajax({
                type: "POST",
                url: "sub_img_panier.php",
                success: function (response3) {
                    
                    console.log($("#nb_produit_panier")) ;
                    $("#nb_produit_panier").html(response3);
                    
                }
               });
               $.ajax({
                type: "POST",
                url: "sub_img_panier2.php",
                success: function (response4) {
                    $("#nb_produit_panier2").html(response4);
                }
               });
               $.ajax({
                type: "POST",
                url: "sub_img_panier3.php",
                
                success: function (response5) {
                    console.log(response5) ;
                    console.log($("#produit_del_actual2"))
                    $("#produit_del_actual2").html(response5)
                }
               });
            }
        });
    });

  })