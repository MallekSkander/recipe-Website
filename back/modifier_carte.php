<?php require_once 'header.php'; 
 include_once '../Models/Carte.php';
include_once '../Controllers/CarteC.php';

$carte=null;
      $id=$_GET['id'];  
      $cartec=new CarteC() ;
  $cartes=$cartec->recovercartebyid($id);    
      $error= array();

           if (   
          isset($_POST['username'])&&
          isset($_POST['date_creation'])&&
          isset($_POST['nb_points'])        
         )
       {
  
    
    //  if(!preg_match('/^[0-9]*$/', $_POST['id_commande']))
    //  {
    //      $error['id_commande']=" id commande tapez int";
    //  }
    //  if(!preg_match('/^[0-9]*$/', $_POST['id_client']))
    //  {
    //      $error['id_client']=" id client tapez int";
    //  }
  
     
    
          if (empty($error))
           {
        
             
              $carte = new Carte(
             
                $_POST['username'],
                $_POST['date_creation'],
                $_POST['nb_points']
              );
              $cartec-> updatecarte($carte, $id);
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
                    <h1 class="text-white">Modifier une carte </h1>
                </div>
            </div>
        </div>
  
<div class='container'>
<div class="row justify-content-center">
<form class="contact__form" method="post" action="">
<div class="row">
<div class="col-md-4 form-group">    
<label for="id_produit">username :</label>
        <input name="username" type="text" class="form-control" placeholder="Tapez le username"  value="<?=$cartes->username?>"required>
    </div>
    <div class="col-md-4 form-group"> 
	<label for="pourcentage">Date de creation:</label>   
        <input name="date_creation" type="date" class="form-control" placeholder="Tapez la pourcentage" value="<?=$cartes->date_creation?>" required>
    </div>
	</div>
	
	<div class="row">

    <div class="col-md-4 form-group">  
	  <label for="prix">nb points</label>  
        <input name="nb_points" type="text" class="form-control" placeholder="Tapez le prix" value="<?=$cartes->nb_points?>" required>
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
