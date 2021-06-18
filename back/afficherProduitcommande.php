<?php
	if (!isset($_SESSION['username'])) {
    	header('location: ../Views/login.php');
    	die();
	}

	if (!isset($_SESSION['admin'])) {
    	header('location: ../Views/login.php');
    	die();
	}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.adminkit.io/tables-bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Apr 2021 21:33:42 GMT -->
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

	<link rel="canonical" href="lessujets.php" />

	<title>DMAK</title>

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
<!--
  HOW TO USE: 
  data-theme: default (default), dark, light
  data-layout: fluid (default), boxed
  data-sidebar: left (default), right
-->

<body data-theme="default" data-layout="fluid" data-sidebar="left">
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
					<span class="align-middle">DMAK</span>
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
						<a class="sidebar-link" href="afficherProduitcommande.php">
							<i class="align-middle" data-feather="list"></i> <span class="align-middle">Les produits per commandes</span>
						</a>
					</li>
	
					
								</ul>
							</li>
						</ul>
					</li>
				</ul>

				<div class="sidebar-cta">
					<div class="sidebar-cta-content">
					

					
					</div>
				</div>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
					<i class="hamburger align-self-center"></i>
				</a>

				<!-- <form class="d-none d-sm-inline-block">
					<div class="input-group input-group-navbar">
						<input type="text" class="form-control" placeholder="Search…" aria-label="Search" name="search">
						<button class="btn" type="button" href="zeze.php">
							<i class="align-middle" data-feather="search"> </i>
						</button>
					</div>
				</form> -->
				<!-- <input type="text" name="search"> -->

				<a class="btn" href="recherche.php"  >Rechercher</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
					
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
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Christina accepted your request.</div>
												<div class="text-muted small mt-1">14h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
					
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
											<div class="col-2">
												<img src="img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Sharon Lessman</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>
						
				
						
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="pages-settings.html"><i class="align-middle me-1" data-feather="settings"></i> Settings &
									Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Tables produit per commande</h1>

					<div class="row">
						<div class="col-12 col-xl-6">
							<div class="card">
								<div class="card-header">
					
									<!-- <h6 class="card-subtitle text-muted">Using the most basic table markup, here’s how .table-based tables look in Bootstrap. -->
									</h6>
								</div>
			
								<table class="tableau-style">
								<thead>
			<tr>
				<th>Id du commande  </th>
			    <th>Id du produit</th>
				<th>Produit commande</th>
				<th>Prix du produit</th>
                <th>Quantite du produit</th>
				<th>Supprimer</th>	
			</tr>
			</thead>
			<?PHP
				$pdo = new PDO('mysql:host=localhost;dbname=dmak', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
				$sql = "SELECT * FROM detail_commande";
				$result = $pdo->query($sql);
                while ($produit =  $result->fetch(PDO::FETCH_ASSOC)){
					?>
			    <tbody>
				<tr>
				    
					<td><?PHP echo $produit['id_commande']; ?></td>
					<td><?PHP echo $produit['id_produit']; ?></td>
					<td><?PHP echo $produit['nom']; ?></td>
					<td><?PHP echo $produit['prix']; ?></td>
                    <td><?PHP echo $produit['quantite']; ?></td>
					<td>
						<center><form class="supp" method="POST" action="suppProdCmd.php"></center>
						<input class="btn btn-primary" type="submit" name="supprimer" value="Supprimer">
						<input type="hidden" value=<?PHP echo $produit['id_commande']; ?> name="id_commande">
					
					</td>
				
				
				</tr>
				</tbody>
				<?php
			}
		?>
		</table>
		
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
								<a href="index.html" class="text-muted"><strong>DMAK </strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>


	<script src="js/app.js"></script>

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


<!-- Mirrored from demo.adminkit.io/tables-bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Apr 2021 21:33:42 GMT -->
</html>