<?php require_once 'header.php'; 
 include_once '../Models/Promo.php';
include_once '../Controllers/PromoC.php';


      $id=$_GET['id'];  
      $promoC=new PromotionC() ;
  $promos=$promoC->recoverPromotionbyid($id);    
      $error= array();
     

   
      $error= array();
      if (
       
          isset($_POST['id_produit'])&&
          isset($_POST['pourcentage'])&&
          isset($_POST['nv_prix'])
        
         )
       {
  
    if(!preg_match('/^[0-9]*$/', $_POST['id_produit']))
    {
        $error['id_produit']=" id produit tapez int";
    }
    if(!preg_match('/^[0-9]*$/', $_POST['pourcentage']))
    {
        $error['pourcentage']=" pourcentage tapez int";
    }
    if(!preg_match('/^[0-9]*$/', $_POST['nv_prix']))
    {
        $error['nv_prix']=" nv_prix tapez int";
    }
    
          if (empty($error))
           {
        
             
              $promo = new Promotion(
             
                $_POST['id_produit'],
                $_POST['pourcentage'],
                $_POST['nv_prix']
              );
              $promoC-> updatePromotion($promo, $id);
          }
    
      }
    
	  ?>
	 
     
<?php if(!empty($error)):?>
<div class='container'>
<div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
<div class="row justify-content-center">
                  <div class="alert alert-danger">
                 <p> you have not completed the form correctly  </p>
                  <ul>  
                  <?php foreach($error as $errors):?>
                     <li><?= $errors; ?>   </li>
                  <?php endforeach; ?>
                  </ul>
                 </div>
                 </div>
        </div>
                 <?php endif; ?>
              

        <div class="row justify-content-center">
            <div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
                <div class="banner-content content-padding">
                    <h1 class="text-white">Modifier une promos </h1>
                </div>
            </div>
        </div>
  
<div class='container'>
<div class="row justify-content-center">
<form class="contact__form" method="post" action="">
<div class="row">
<div class="col-md-4 form-group">    
<label for="id_produit">Id produit:</label>
        <input name="id_produit" type="text" class="form-control" placeholder="Tapez le id_produit"  value="<?=$promos->id_produit?>"required>
    </div>
    <div class="col-md-4 form-group"> 
	<label for="pourcentage">pourcentage:</label>   
        <input name="pourcentage" type="text" class="form-control" placeholder="Tapez la pourcentage" value="<?=$promos->pourcentage?>" required>
    </div>
	</div>
	
	<div class="row">
		
      <div class="col-md-4 form-group">  
	  <label for="prix">Prix:</label>  
        <input name="nv_prix" type="text" class="form-control" placeholder="Tapez le prix" value="<?=$promos->nv_prix?>" required>
    </div>
	


    <div class="col-12 mt-4">
        <input name="confirm" type="submit" class=" btn btn-primary" value="Confirm">
    </div>
	
</div>
</form>
</div>  
</div>
</div>
</div>




	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		
</body>
</html>