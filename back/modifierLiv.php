<?php
    require '../Controller/livraisonC.php';
    require_once '../Model/livraison.php';

    $livc =  new LivraisonC();


    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['num_tel']) && isset($_POST['adresse'])) {
        $liv = new Livraison($_POST['nom'],$_POST['prenom'], $_POST['num_tel'], $_POST['adresse']);
         
         $livc->modifierLivraison($liv,$_POST['id']);
        header('location:livraison.php');
 
      }
    $liv=$livc->recupererLivraison($_POST['id']);
    

?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.adminkit.io/forms-validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Apr 2021 21:33:42 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com/">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="forms-validation.html" />



	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&amp;display=swap" rel="stylesheet">

	<!-- BEGIN SETTINGS -->
	<script src="js/settings.js"></script>
	<!-- END SETTINGS -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-10"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-120946860-10', { 'anonymize_ip': true });
</script></head>


<body data-theme="default" data-layout="fluid" data-sidebar="left">
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">

				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>
					
					<li class="sidebar-item active">
						<a class="sidebar-link" href="afficherLiv.php">
							<i class="align-middle" data-feather="list"></i> <span class="align-middle">Les livraisons</span>
						</a>
					</li>
					<li class="sidebar-item active">
						<a class="sidebar-link" href="ajouterLiv.php">
							<i class="align-middle" data-feather="list"></i> <span class="align-middle">L'ajout d'une livraison</span>
						</a>
					</li>
					<li class="sidebar-item active">
						<a class="sidebar-link" href="afficherCommande.php">
							<i class="align-middle" data-feather="list"></i> <span class="align-middle">Les commandes</span>
						</a>
					</li>
					<li class="sidebar-item active">
						<a class="sidebar-link" href="afficherProduitCommande.php">
							<i class="align-middle" data-feather="list"></i> <span class="align-middle">Les produits per commandes</span>
						</a>
					</li>
								</ul>
							</li>
						</ul>
					</li>
				</ul>

			
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
					<i class="hamburger align-self-center"></i>
				</a>

				<form class="d-none d-sm-inline-block">
					<div class="input-group input-group-navbar">
						<input type="text" class="form-control" placeholder="Search…" aria-label="Search">
						<button class="btn" type="button">
							<i class="align-middle" data-feather="search"></i>
						</button>
					</div>
				</form>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
					
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.8</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
									
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
						
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="William Harris">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">William Harris</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Christina Mason">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Christina Mason</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">4h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
										
										
										</div>
									</a>
								</div>
							
							</div>
						</li>
					
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Modification d'un livraion</h1>

					</div>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
							
								</div>
								<div class="card-body">
									<form class="row g-3 needs-validation" novalidate method="post">
									<div class="col-md-6">
											<label for="validationCustom03" class="form-label"></label>
											<input style="display:none" type="text" name="id"  value="<?php echo $liv["id"]; ?>" class="form-control" id="validationCustom03" required>
											<div class="invalid-feedback">
												Please provide a valid city.
											</div>
										<div class="col-md-4">
											<label for="validationCustom01" class="form-label">Nom livreur</label>
											<input type="text" name="nom" class="form-control" id="validationCustom01" value="<?php echo $liv["nom"]; ?>" required>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
										<div class="col-md-4">
											<label for="validationCustom02" class="form-label">Prenom livreur</label>
											<input type="text" name="prenom" class="form-control" id="validationCustom02"  value="<?php echo $liv["prenom"]; ?>" required>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
										<div class="col-md-4">
											<label for="validationCustom02" class="form-label">Numer telephone</label>
											<input type="text" name="num_tel" class="form-control" id="validationCustom02"  value="<?php echo $liv["num_tel"]; ?>" required>
											<div class="valid-feedback">
												Looks good!
											</div>
										</div>
										<div class="col-md-4">
											<label for="validationCustomUsername" class="form-label">Adresse</label>
											<div class="input-group">
												<span class="input-group-text" id="inputGroupPrepend"></span>
												<input type="text" name="adresse" class="form-control" id="validationCustomUsername" value="<?php echo $liv["adresse"]; ?>" >
												<div class="invalid-feedback">
													Please choose a username.
												</div>
											</div>
										</div>
										
									
										<div class="col-12">
											<button class="btn btn-primary" type="submit">Modifier</button>
										</div>
									</form>
								</div>
							</div>

							
									
									</form>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a href="index.html" class="text-muted"><strong>DMAK</strong></a> &copy;
							</p>
						</div>
						
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="js/app.js"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.querySelectorAll('.needs-validation')
			// Loop over them and prevent submission
			Array.prototype.slice.call(forms)
				.forEach(function(form) {
					form.addEventListener('submit', function(event) {
						if (!form.checkValidity()) {
							event.preventDefault()
							event.stopPropagation()
						}
						form.classList.add('was-validated')
					}, false)
				})
		});
	</script>
<script>
  document.addEventListener("DOMContentLoaded", function(event) { 
    setTimeout(function(){
      if(localStorage.getItem('popState') !== 'shown'){
        window.notyf.open({
          type: "success",
          message: "Get access to all 500+ components and 45+ pages with AdminKit PRO. <u><a class=\"text-white\" href=\"https://adminkit.io/pricing\" target=\"_blank\">More info</a></u> 🚀",
          duration: 10000,
          ripple: true,
          dismissible: false,
          position: {
            x: "left",
            y: "bottom"
          }
        });

        localStorage.setItem('popState','shown');
      }
    }, 15000);
  });
</script></body>


<!-- Mirrored from demo.adminkit.io/forms-validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Apr 2021 21:33:42 GMT -->
</html>