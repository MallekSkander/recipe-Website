<?php
include "../Model/sujet.php";
include "../Controller/sujetC.php";
$error = "";
$forumC = null;
$forumC = new forumC();

if (
    isset($_POST["user"]) &&
    isset($_POST["title"]) &&
    isset($_POST["contents"])
) {
    if (
        !empty($_POST["user"]) &&
        !empty($_POST["title"]) &&
        !empty($_POST["contents"])
    ) {
        $thread = new forum(
            $_POST["user"],
            $_POST["title"],
            $_POST["contents"]

        );
        $forumC->ajouterThread($thread);
        header('location:lessujets.php');

    } else
        $error = "Missing information";
}

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

	<!-- <title>Validation | AdminKit Demo</title> -->

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&amp;display=swap" rel="stylesheet">

	<!-- BEGIN SETTINGS -->
    <script src="<?php echo ('../scripts/jquery.3.5.1.js'); ?>"></script>
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
					<!-- <span class="align-middle">AdminKit</span> -->
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>

                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="category.php">
                            <i class="align-middle" data-feather="list"></i> <span class="align-middle">categorie</span>
                        </a>
                    </li>
                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="ingredient.php">
                            <i class="align-middle" data-feather="list"></i> <span class="align-middle"> ingredient</span>
                        </a>
                    </li>



                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="ajouterCat.php">
                            <i class="align-middle" data-feather="list"></i> <span class="align-middle">ajouter categorie</span>
                        </a>
                    </li>
                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="ajouteringredient.php">
                            <i class="align-middle" data-feather="list"></i> <span class="align-middle">ajouter ingredient</span>
                        </a>
                    </li>
                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="ajoutRecettes.php">
                            <i class="align-middle" data-feather="list"></i> <span class="align-middle">ajouter Recttes</span>
                        </a>
                    </li>
                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="afficherRecettes.php">
                            <i class="align-middle" data-feather="list"></i> <span class="align-middle">afficher Recttes</span>
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


    <?php
    require_once('../Controller/conn.php');
    require_once('../Controller/functions.php');
    require_once('../Controller/SQL_functions.php');
    $errors = []; ?>




    <?php
    if(is_post_request()) {
        $recipe_name = $_POST['recipe_name'] ?? '';
        $instructions = $_POST['recipe_instructions'] ?? '';


        $new_recipe_id = create_new_recipe_instructions($dbb,$recipe_name, $instructions); // yasna3 instruction jdida bech yesra9 id mte3 wi7otha fi variable

        $ing_new_list = explode(',', $_POST['ing_list']);

        foreach($ing_new_list as $ing_id) {
            $ing_qty_list[$ing_id] = $_POST[$ing_id];
        }

        $cat_new_list = explode(',', $_POST['cat_list']);
        create_new_recipe_ingredients($dbb,$new_recipe_id, $ing_qty_list);//  bech yasna3 recepie(base de donné) bech yel9i les ingrediant wel les quantité
        create_new_recipe_categories($dbb,$new_recipe_id, $cat_new_list);// bech yasna3 assigned_categories(base de donné) bech yel9i instruction  wel les categories mte3hom
        $_SESSION['status'] = 'Recipe "' . h($recipe_name) . '" successfuly created.';
    }

    ?>







    <div id="content" style="position:relative; left: 500px ; top: 70px">

        <div class="section-header">
            <h2>New Recipe</h2>

        </div>
        <form action="<?php echo ('../back/ajoutRecettes.php'); ?>" id="new_recipe_form" method="post">

            <!-- N A M E -->

            <label for="recipe_name">Nom de la recette
            </label></br>
            <input type="text" name="recipe_name" id="recipe_name" placeholder="Nom" required></br>

            <!-- C A T E G O R I E S -->

            <label for="categories_list">Sélectionnez les catégories
            </label></br>
            <?php $categories = find_all_cat($dbb); ?>
            <select name="categories_list" id="categories_list">
                <option value="" selected disabled="disabled">selectionner</option>
                <?php while($category=$categories->fetch(PDO::FETCH_ASSOC)){ ?>
                    <option class="cat_list_item" value="<?php echo $category['id'] ?>"><?php echo find_name_of_cat($dbb,$category['id']) ?></option>
                <?php } ?>
            </select></br>


            <table id="categories_table"></table>

            <input type="hidden" name="cat_list" id="cat_list" class="hidden" value=""/>

            <!-- I N G R E D I E N T S -->

            <label for="ingredients_list">Sélectionnez un nouvel ingrédient
            </label></br>
            <?php $ingredients = find_all_ingredients($dbb); ?>
            <select name="ingredients_list" id="ingredients_list">
                <option value="" selected disabled="disabled">selectionner</option>
                <?php while($ingredient=$ingredients->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option class="ing_list_item" value="<?php echo $ingredient['id'] ?>"><?php echo find_name_of_ingredient($dbb,$ingredient['id']) ?></option>
                <?php } ?>
            </select></br>

            <table id="ingredients_table"></table>

            <input type="hidden" name="ing_list" id="ing_list" class="hidden" value=""/>

            <!-- I N S T R U C T I O N S -->

            <label for="recipe_instructions_form">Instructions de recette
            </label></br>
            <textarea name="recipe_instructions" id="recipe_instructions" cols="30" rows="10"></textarea></br>

            <!-- S U B M I T -->

            <button type="submit" id="submit">Valider</button>
        </form>
    </div>

    <script>var catArray = []; var ingArray = [];</script>
    <script src="<?php echo ('../scripts/script.js'); ?>"></script>


    <!-- Mirrored from demo.adminkit.io/forms-validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Apr 2021 21:33:42 GMT -->
</html>