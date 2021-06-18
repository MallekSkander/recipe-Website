<?php

require_once('config.php');
require_once('fonction.php');
$contenu = '';

if(isset($_GET['categorie']) && $_GET['categorie'] != 'all'){
    $donnees = executeRequete(" SELECT id_produit, produit, images, prix FROM produit ", array(':categorie' => $_GET['categorie'])); 
} else {
 
    $donnees = executeRequete("SELECT id_produit, produit, images, prix FROM produit ");
}

 while ($produit =  $donnees->fetch(PDO::FETCH_ASSOC)){
  
    $contenu .=  '<div class="col-sm-4 col-lg-4 col-md-4"> ';
    $contenu .= '<div class="thumbnail">';
    $contenu .= '<h4> '. $produit['produit'].'</h4> ';
    $contenu .= '<img src="../assets/uploads/'. $produit['images'] .'"  width="130"  height="100"> ';
    $contenu .= '<div class="caption">';  
    $contenu .= '<h4 class="pull-right"> Prix = '. $produit['prix'] .'$ </h4>';
    $contenu .= '<a class="btn btn-warning" href="fiche_produit.php?id_produit='. $produit['id_produit'] .'">Ajouter au panier</a>';
    $contenu .= '</div>';
    $contenu .= '</div>';
    $contenu .= '</div>';

 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/dmak_style.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
		
</head>
<body>
<div class="row">   
    

    <div class= "col-md-3">   
	<a class="btn btn-warning" href="index.html"  >Retour</a>
	<br>
    <h3 >Liste des produits</h3>
    </div>

    <div class= "col-md-9">
        <div class="row"> 
        <br>
        
        <?php echo $contenu;?>
        </div>
    </div>

</div>
</body>
</html>

