
<?php 
require_once 'header.php';
 include_once '../Models/Promo.php';
include_once '../Controllers/PromoC.php';

	if (!isset($_SESSION['username'])) {
    	header('location: ../Views/login.php');
    	die();
	}

	if (!isset($_SESSION['admin'])) {
    	header('location: ../Views/login.php');
    	die();
	}

$liste=null;
$promoC=new PromotionC() ;
$search="";

if(isset($_POST['valueToSearch']))
{   
	$search=$_POST['valueToSearch'];
		
}
$liste=$promoC->searchpromo($search);
if(isset($_POST['tri']))
{
if($_POST['tri']=="defaut")
{
	$tri=0;
	$liste=$promoC->trierpromo($tri);
}
else if($_POST['tri']=="nv_prix")
{
	$tri=1;
	$liste=$promoC->trierpromo($tri);
}
else if($_POST['tri']=="pourcentage")
{
	$tri=2;
	$liste=$promoC->trierpromo($tri);
}

}

?>

	<div class="row justify-content-center">
	<div class='container'>
<div class="row justify-content-center">

<div class='container'>
<div class="row justify-content-center">
    <section id="main-content">
            <div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
                <div class="banner-content content-padding">
                    <h1 class="text-white">Gestion promo </h1>
                </div>
            </div>
        </div>
				</div>
		<form class="contact__form" method="post" action="">
	<div align="center"  class="control-group form-group">   
<input type="text" name="tri" list="tri" >
    <datalist id="tri">
      <option value="defaut">
      <option value="nv_prix">
	  <option value="pourcentage">
	  <div class="col-12 mt-4">

    </div>
    </datalist>
	        <input name="confirm" type="submit" class=" btn btn-hero btn-circled" value="Trier">
    </div>
	</form>
	<form align="center" action="" method="post">
	<input type="text" name="valueToSearch", placeholder="Article to search">
	<input type="submit" name="search" value="search"><br><br>
</form>
 <div class="row justify-content-center">
	<div class='container'>
<div class="row justify-content-center">

				<div class="promos">
					<table border="1" align="center">
						<tr>
							<div class="ROW"></div>
                <hr> 
                <thead>
                  <tr>
                  <th><i class="fa fa-user"></i> ID </th>
                  <th><i class="fa fa-user"></i> ID_produit </th>
                    <th><i class="fa fa-user"></i> Pourcentage</th>
                    <th ><i class="fa fa-user"></i> Nouveau Prix</th>
                
					
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                
			<?PHP
				foreach($liste as $promo):
			?>
                  <tr>
                    <td><?= $promo->id ?></td>
                    <td><?= $promo->id_produit ?></td>
					<td><?= $promo->pourcentage ?></td>
					<td><?= $promo->nv_prix ?></td>
			

                    <td>
                      <button class="btn btn-danger btn-xs" onclick="window.location.href = 'supprimer_promo.php?id=<?= $promo->id ?>';"> <i class="fa fa-trash-o "></i></button>
					  <button class="btn btn-success btn-xs" onclick="window.location.href = 'modifier_promo.php?id=<?= $promo->id ?>';"> <i class="fa fa-pencil "></i></button>
                      
                   </td>
                
				  </td>
            
			
                  <?php endforeach ; ?>
                
 
                  
                   
                </tbody>
              </table>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
		</div>
		</div>
		</div>
		</div>
        <!-- /row -->
      </section>
    </section>


			
        
                  <!--
                  JavaScripts
                  ========================== -->
				<!-- JS here -->
				<script src="js/vendor/modernizr-3.5.0.min.js"></script>
				<script src="js/vendor/jquery-1.12.4.min.js"></script>
				<script src="js/popper.min.js"></script>
				<script src="js/bootstrap.min.js"></script>
				<script src="js/owl.carousel.min.js"></script>
				<script src="js/isotope.pkgd.min.js"></script>
				<script src="js/ajax-form.js"></script>
				<script src="js/waypoints.min.js"></script>
				<script src="js/jquery.counterup.min.js"></script>
				<script src="js/imagesloaded.pkgd.min.js"></script>
				<script src="js/scrollIt.js"></script>
				<script src="js/jquery.scrollUp.min.js"></script>
				<script src="js/wow.min.js"></script>
				<script src="js/nice-select.min.js"></script>
				<script src="js/jquery.slicknav.min.js"></script>
				<script src="js/jquery.magnific-popup.min.js"></script>
				<script src="js/plugins.js"></script>
				<script src="js/gijgo.min.js"></script>

				<!--contact js-->
				<script src="js/contact.js"></script>
				<script src="js/jquery.ajaxchimp.min.js"></script>
				<script src="js/jquery.form.js"></script>
				<script src="js/jquery.validate.min.js"></script>
				<script src="js/mail-script.js"></script>

				<script src="js/main.js"></script>
              </pre>

          </section>

          
      		</ul>
      	</div>
      </section>
  </div>
</div>


		<!-- Essential JavaScript Libraries
			==============================================-->
			<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
			<script type="text/javascript" src="js/jquery.nav.js"></script>
			<script type="text/javascript" src="syntax-highlighter/scripts/shCore.js"></script> 
			<script type="text/javascript" src="syntax-highlighter/scripts/shBrushXml.js"></script> 
			<script type="text/javascript" src="syntax-highlighter/scripts/shBrushCss.js"></script> 
			<script type="text/javascript" src="syntax-highlighter/scripts/shBrushJScript.js"></script> 
			<script type="text/javascript" src="syntax-highlighter/scripts/shBrushPhp.js"></script> 
			<script type="text/javascript">
				SyntaxHighlighter.all()
			</script>
			<script type="text/javascript" src="js/custom.js"></script>

		</body>
		</html>
