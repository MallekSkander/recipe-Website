<?php 
        require_once 'header.php'; 
      include '../Controllers/CarteC.php' ;
      require_once '../Models/Carte.php';

    if (!isset($_SESSION['username'])) {
    	header('location: ../Views/login.php');
    	die();
	}

	if (!isset($_SESSION['admin'])) {
    	header('location: ../Views/login.php');
    	die();
	}

      $sitekey ='6Lc5-gQaAAAAAOtB16Ftl-9cJ9yz-gAkM_Eb16y8';
      $secretkey='6Lc5-gQaAAAAANN71A2RpZg1F-N9-AA8aAYuoSUq';

      $carte=NULL;
      $carteC=new CarteC() ;
      $error= array();
      if (
          isset($_POST['username'])&&
          isset($_POST['date_creation'])&&
          isset($_POST['nb_points'])
         )
       {
  
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){ 
            // Google reCAPTCHA API secret key 
            $secretKey = '6Lc5-gQaAAAAANN71A2RpZg1F-N9-AA8aAYuoSUq'; 
             
            // Verify the reCAPTCHA response 
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 
             
            // Decode json data 
            $responseData = json_decode($verifyResponse); 
             
            // If reCAPTCHA response is valid 
            if($responseData->success){ 
            $status = 'success'; 
            }else{ 
                $errors['verfication'] = 'Robot verification failed, please try again.'; 
            } 
        }else{ 
            $errors['checkbox'] = 'Please check on the reCAPTCHA box.'; 
        } 

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
                $_POST['nb_points'],
              );
              $carteC-> addcarte($carte);
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
              
                 <?php if(empty($error) && isset($_POST['date_creation'])):?>
                    <div class='container'>
               <div class="row justify-content-center">
                    <div class="alert alert-success">
                 <p> carte ajouté !!  </p>
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
                    <h2 class="mb-5">Ajouter une carte </h2>
                    
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
        <input name="username" type="text" class="form-control" placeholder="Tapez Username" required>
    </div>
    <div class="col-md-6 form-group">    
        <input name="date_creation" type="date" class="form-control" placeholder="Tapez la date_creation" required>
    </div>

  <div class="col-md-6 form-group">    
        <input name="nb_points" type="text" class="form-control" placeholder="Tapez points " required>
    </div>
   

    <div class="col-12 mt-4">
        <input name="confirm" type="submit" class=" btn btn-hero btn-circled" value="Confirm">
        <div class="g-recaptcha" data-sitekey="<?php echo $sitekey ;?>"	data-theme="dark"></div>
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