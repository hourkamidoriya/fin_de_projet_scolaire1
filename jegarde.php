      <div class="flex gap-10 items-center relative ">
          <div class="sm:w-10 sm:h-10 h-8 w-8 rounded-lg sm:rounded-3xl flex items-center text-center justify-center">
            <img src="asset/Sample_User_Icon.png" alt="" class="w-8 h-8  cursor-pointer object-contain" id="moi" />
          </div>
        <div class="flex gap-1.5 relative w-45 items-center justify-end">
            <form action="page_de_recherche.php" method="POST" class=" text-center  flex justify-end">
                <input type="text" class="bg-gray-300 required w-full h-10 p-1 rounded-xl  pr-10" placeholder="rechercer un produit" name="search" >
                <div class="absolute mt-2.5">
                    <button type="submit" class=" hover: cursor-pointer"><img src="asset/Vector (3).png" alt="" class="w-5 z-10   mr-3 " /> </button>
                </div>
            </form>
        </div>
        <?php if($nb_produit_panier>0){ ?>

        <?php } ?>
        <div class="relative ">
         <div class=" bg-red-500 z-0  w-5 h-5 rounded-2xl absolute justify-center text-center flex items-center bottom-4">
          <?php echo $nb_produit_panier ?>
        </div>
          <img src="asset/cart1.png" id="hh" alt="" class="z-0 w-8 mr-10 cursor-pointer object-contain "/>
        </div>
        
      </div>