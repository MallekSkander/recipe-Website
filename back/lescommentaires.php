<?php 

    include "../Controller/CommentC.php";

	if (!isset($_SESSION['username'])) {
    	header('location: ../Views/login.php');
    	die();
	}

	if (!isset($_SESSION['admin'])) {
    	header('location: ../Views/login.php');
    	die();
	}

    $sujetC = new  commentC();

    $listeU = $sujetC->afficherComs();

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
						<a class="sidebar-link" href="lessujets.php">
							<i class="align-middle" data-feather="list"></i> <span class="align-middle">Les publications</span>
						</a>
					</li>
					<li class="sidebar-item active">
						<a class="sidebar-link" href="lescommentaires.php">
							<i class="align-middle" data-feather="list"></i> <span class="align-middle">Les commentaires</span>
						</a>
					</li>
                    <li class="sidebar-item active">
						<a class="sidebar-link" href="ajoutP.php">
							<i class="align-middle" data-feather="list"></i> <span class="align-middle">L'ajout d'une publication</span>
						</a>
					</li>
					<li class="sidebar-item active">
						<a class="sidebar-link" href="ajoutC.php">
							<i class="align-middle" data-feather="list"></i> <span class="align-middle">L'ajout d'un commentaire</span>
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
						<input type="text" class="form-control" placeholder="Search…" aria-label="Search">
						<button class="btn" type="button">
							<i class="align-middle" data-feather="search"></i>
						</button>
					</div>
				</form> -->
				<a class="btn" href="recherche2.php"  >Rechercher</a>


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
					
							</a>
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
					
					
						</li>
				

						
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
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

					<h1 class="h3 mb-3">Tables</h1>

					<div class="row">
						<div class="col-12 col-xl-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Le tableau des commentaires </h5>
									<!-- <h6 class="card-subtitle text-muted">Using the most basic table markup, here’s how .table-based tables look in Bootstrap. -->
									</h6>
								</div>
		
								<table class="table">
									<thead>
										<tr>
											<th style="width:25%;">Utilisateur</th>
											<th style="width:40%">Contenu</th>
											<th style="width:35%">Titre</th>
											<th class="d-none d-md-table-cell" style="width:25%">Date</th>
											<th>Actions</th>
										</tr>
									</thead>
									<?php 
        foreach ($listeU as $comment) {
            ?> 
									<tbody>


			


										<tr>
         <td><?php echo $comment['user']; ?></td> 
		 <td><?php echo $comment['thread']; ?></td>
		 <td class="d-none d-md-table-cell"><?php echo $comment['content']; ?></td>

		 <td><?php echo $comment['date_comment']; ?></td>
		 <td></td>
	
											<td class="table-action">
												<!-- <a href="#"><i class="align-middle" data-feather="edit-2"></i></a> -->

												<form action="supprimercomC.php" method="post">
                         <button>  Supprimer </button>  
                        <input type="hidden" name="ID" value="<?php echo $comment['ID'] ?>">
		</form>

						<form action="modifierthreadB.php" method="post">
                         <button>  Modifier </button>  
                        <input type="hidden" name="ID" value="<?php echo $comment['ID'] ?>">
						</form>
                      
		

		</td>
		
		

								

											</td>
										</tr>
										<?php
        } ?>
									
 									
									
									</tbody>
								</table>
		
							</div>
						</div>
                        <div class="text-center">
<button onClick="window.print()" class="btn btn-primary">Capture d'ecran</button>  

    </div>		
	
	<form method="POST" action="imprimerCom.php">

						<div class="text-center">
<button  class="btn btn-primary" name="imprimer"> Imprimer </button>  
</form>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a href="index.html" class="text-muted"><strong>DMAK</strong></a> &copy;
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