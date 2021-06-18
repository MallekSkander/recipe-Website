<?php 

if (!isset($_SESSION['username'])) {
    header('location: login.php');
    die();
}

require_once 'Abidaheader.php';
include_once '../Controllers/ProduitC.php';
include_once '../Controllers/PromoC.php';

$promoc=new PromotionC() ;
$liste=$promoc->displayPromotionsfu();
$produitc=new ProduitC() ;

?>
<br><br><br><br><br><br><br><br>
   <div  align="center" class="container-fluid">
        <div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <!-- header_start  -->
    <div class="plans-section" id="rooms">
				 <div class="container">
				 <h3 class="title-w3-agileits title-black-wthree">Promotion</h3>
						
                 </div></div>
    <!--================Blog Area =================-->
 
           
               
                    
                    <?PHP
				foreach($liste as $produit):
			?>
            <?php $produitcc=$produitc->recoverProduitbyid($produit->id_produit);?>
            <section>
           
    <div class="w3l-visitors-agile" >
    <div class="title-w3-agileits title-black-wthree">     
    <div class="w3layouts_work_grids">
    <div class="container">
		<div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile2" data-aos="flip-left">
			<div class="contact-agileits">
                          
                                <img class="card-img rounded-0" src="../assets/uploads/<?=$produitcc->images?>" alt="">
                                <a href="#" class="blog_item_date">
                                    <h3><?=$produit->pourcentage?>%</h3>
                                   
                                </a>
                            </div>

                            <div class="blog_details">
                             
                                    <h2><?=$produitcc->produit?></h2>
                                </a>
                                <p>OLD PRICE $<?=$produitcc->prix?></p>
                                <p>New price $<?=$produit->nv_prix?></p>
        
                       
                                <button class="btn btn-success btn-xs" onclick="window.location.href = 'ajouterLivraison.php?id=<?= $produit->id_produit ?>';"> <i class="fa fa-plus "> ADD to card</i></button>
                                
                             
                             </div>
                             </div>
                             </div>
                             </div>
                          
       
    </section>
                       
                        <?php endforeach ; ?>
            
                       

     
   <?php require_once 'Abidafoot.php';?>



                        
      
       