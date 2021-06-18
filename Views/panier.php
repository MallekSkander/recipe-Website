<?php
require_once('config.php');
require_once('fonction.php');


// Ajouter un produit au panier :
if(isset($_POST['ajout_panier'])){ 
$resultat = executeRequete("SELECT id_produit, produit, prix FROM PRODUIT WHERE id_produit = :id_produit", array(':id_produit' => $_POST['id_produit']));
$produit = $resultat->fetch(PDO::FETCH_ASSOC);
ajouterProduitDansPanier($produit['produit'], $_POST['id_produit'],$_POST['quantite'],$produit['prix']);
}

// Vider le panier
if(isset($_GET['action']) && $_GET['action'] == 'vider') {

    unset($_SESSION['panier']); 
}

// Supprimer un article du panier
if(isset($_GET['action']) && $_GET['action'] == 'supprimer' && isset($_GET['articleASupprimer'])) {

    retirerProduitDuPanier($_GET['articleASupprimer']);
}

//Validation du pannier
if(isset($_POST['valider'])) 
{
   // $id_membre = $_SESSION['membre']['id_membre'];
    $id_membre = '1';
    $montant_total = montantTotal();

    executeRequete("INSERT INTO commande (id_membre, montant, date_enregistrement) VALUE (:id_membre, :montant, NOW())", array(':id_membre' => $id_membre, ':montant' => $montant_total  ));
    $id_commande = $pdo->lastInsertId();//Return the AUTO_INCREMENT id of the last row that has been inserted or updated in a table:
    
    for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++ ) {
      
        $id_produit = $_SESSION['panier']['id_produit'][$i];
        $quantite = $_SESSION['panier']['quantite'][$i];
        $prix = $_SESSION['panier']['prix'][$i];
        $nom = $_SESSION['panier']['titre'][$i];
        
         executeRequete("INSERT INTO detail_commande( id_commande,id_produit,nom, quantite, prix) VALUES ( :id_commande,:id_produit, :nom,:quantite, :prix) " , array(':id_commande' => $id_commande,':id_produit' => $id_produit, ':nom' => $nom,':quantite' => $quantite, ':prix' => $prix ));
    }
    echo '<div class="bg-success">Merci pour votre commande </div>';
}


//Affichage du panier
echo '<h2>Voici votre panier</h2>';
  echo'  <br>    
	<a class="btn btn-warning" href="boutique.php"  >Retour au boutique</a>
	<br>';

if(empty($_SESSION['panier']['id_produit'])) {
    echo '<p>Votre panier est vide</p>';
} else {
    echo '<table class="tableau">';
        echo '<tr class="info">
            <th>Titre</th>
            <th>Nombre du produit</th>
            <th>Quantite</th>
            <th>Prix unitaire</th> 
            <th>Action</th>
            </tr>';
            //parcour du panier + afficher le produits
            for ($i = 0 ; $i < count($_SESSION['panier']['id_produit']); $i++) 
            {
                echo '<tr>';
                echo    '<td>' . $_SESSION['panier']['titre'][$i] . '</td>';
                echo    '<td>' . $_SESSION['panier']['id_produit'][$i] . '</td>';
                echo  '<td>' . $_SESSION['panier']['quantite'][$i] . '</td>';
                echo   '<td>' . $_SESSION['panier']['prix'][$i] . '</td>';
                echo   '<td>  <a class="btn btn-warning" href="?action=supprimer&articleASupprimer='.$_SESSION['panier']['id_produit'][$i].'">Supprimer article</a> </td>';       
                echo '</tr>';
            }

        echo '<tr>
                <th colspan="3" > Total</th>
                <th colspan="2" > '. montantTotal() .'</th>        
            </tr>';

                    echo'<form method="post" action="">
                            <tr class="text-center">
                                <td colspan="5">
                                    <input  class="btn btn-light" type="submit" name="valider" value="valider le panier">
                                </td >
                            </tr>               
                        </form>';
             
                    echo' <tr class="text-center">
                                <td colspan="5">
                                        <a class="btn btn-warning" href="?action=vider">Vider le panier</a>
                                </td >
                          </tr>';
        echo '</table>';    
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
   
    <title>Panier</title>
    <a class="btn btn-warning" href="index.html">Retour a la page principale</a>
</head>

</html>








