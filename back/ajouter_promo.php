<?php require_once 'header.php'; 
     include '../Controllers/PromoC.php' ;
      require_once '../Models/Promo.php';


    if (!isset($_SESSION['username'])) {
    	header('location: ../Views/login.php');
    	die();
	}

	if (!isset($_SESSION['admin'])) {
    	header('location: ../Views/login.php');
    	die();
	}

      $promo=NULL;
      $promoC=new PromotionC() ;
      $error= array();
      if (
       
          isset($_POST['id_produit'])&&
          isset($_POST['pourcentage'])&&
          isset($_POST['nv_prix'])
        
         )
       {
  
     if( $_POST['pourcentage']==0)
     {
         $error['pourcentage']="Error pourcentage insufisant";
     }
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
              $promoC->addPromotion($promo);
          }
    
      }
      ?>
     
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
             
                    <h1 class="text-white">Ajouter un promo</h1>
                </div>
            </div>
        </div>
 

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
              
                 <?php if(empty($error) && isset($_POST['pourcentage'])):?>
                    <div class='container'>
               <div class="row justify-content-center">
                    <div class="alert alert-success">
                 <p> promo ajouté !!  </p>
                 <?php endif; ?>
                 </div>
                 </div>
                 </div>
               
<br><br><br><br><br>
<div class="row justify-content-center">
	<div class='container'>
<div class="row justify-content-center">
<div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
<div class='container'>
<div class="row justify-content-center">
                <div class="mb-5">
                    <h2 class="mb-5">Ajouter promo</h2>
                    
                    </div>   
            </div>
        </div>
        <div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
        <div class='container'>
        <div class="row justify-content-center">
    <!---------------formulaire--------->
 <form class="contact__form" method="post" action="">

<div class="row">
<div class="col-md-6 form-group">    
        <input name="id_produit" type="text" class="form-control" placeholder="Tapez le id de produit" required>
    </div>
    <div class="col-md-6 form-group">    
        <input name="pourcentage" type="text" class="form-control" placeholder="Tapez le pourcentage" required>
    </div>

    <div class="col-md-6 form-group">    
        <input name="nv_prix" type="text" class="form-control" placeholder="Tapez le prix" required>
    </div>


   

    <div class="col-12 mt-4">
        <input name="confirm" type="submit" class=" btn btn-hero btn-circled" value="Confirm">
    </div>
</div>
</div>  
</div>
</form>

</div>  
</div>
  

</div>  
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