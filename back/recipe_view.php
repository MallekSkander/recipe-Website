<?php

include "../Controller/sujetC.php";

$sujetC = new  forumC();

$listeU = $sujetC->afficherThreads();

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





        <?php
require_once('../Controller/conn.php');
require_once('../Controller/functions.php');
require_once('../Controller/SQL_functions.php');
$errors = [];


$id = $_GET['id'] ?? redirect_to(('../Views/index.php')); //if !isset redirect

$instructions = find_recipe_by_id($dbb,$id);  // yejbed les instructions mel base (name / contenct)

$instructions_selected=$instructions->fetch(PDO::FETCH_ASSOC); // bech isatafhom w yafichihom mba3d

//-----------------------------------------------------------------------------------

$assigned_categories = find_cat_of_recipe($dbb,$id); // i7eb ya3ref l category mta3 el recette 

/****************************************************************************** */

$recepie = find_ingredients_of_recipe($dbb,$id); // bech tlawej 3al ingrediant  mta3 instruction(mekla)
                                                    // ama el quantité 7adhra
//--------------------------------------------------------------------------------------------------------------



?>



<div id="content" style="position:relative; left: 100px ; top: 70px">

    <?php echo display_status_message(); ?>

    <div class="view_recipe">


        <div class="title_cat_style">
            <div class="section-header">
                <h2>NOM:</h2>

            </div>
            <h3 class="title"> <?php echo h($instructions_selected['name']) ?? ''; ?> </h3>



            <h3 class="title">   <div class="section-header">
                    <h2>Categorie:</h2>

                </div>


                <?php
                $i = 1;
                while ($category=$assigned_categories->fetch(PDO::FETCH_ASSOC)) {
                    echo h(find_name_of_cat($dbb,$category['cat_id']));

                    $count_categories = $assigned_categories->rowCount();
                    if (($count_categories) > $i) echo ' | ';
                    $i++;
                } ?></h3>


        </div>

        <div class="ing_style">
            <div class="section-header">
                <h2>Ingrédients:</h2>

            </div>
            <h3 class="title">     <table>


                    <?php while ($ingredient=$recepie->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td><?php echo h(find_name_of_ingredient($dbb,$ingredient['ing_id'])); ?></td>
                            <td><?php echo h($ingredient['quantity']); ?></td>
                        </tr>
                    <?php } ?>
                </table></h3>


        </div>

        <div class="ins_style">
            <div class="section-header">
                <h2>Instructions:</h2>


            </div>
            <h3 class="title"> <?php echo nl2br(h($instructions_selected['content'])); ?></h3>
        </div>


    </div>
</div>

