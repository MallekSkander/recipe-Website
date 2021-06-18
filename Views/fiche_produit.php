<?php
require_once('config.php');
require_once('fonction.php');
$contenu = '';
$contenu_1 = '';

if(isset($_GET['id_produit'])){
  
        $resultat = executeRequete("SELECT * FROM produit WHERE id_produit = :id_produit", array(':id_produit' => $_GET['id_produit']));


        $produit = $resultat->fetch(PDO::FETCH_ASSOC);
        $contenu .= '<div class="row">;

                        <div class="col-lg-12">
                            <h1 class="page-header">'.$produit['produit'].'</h1>
                        </div>
                    </div>';
                    
        $contenu .=  '<div class="col-md-8">
                            <img class="im" src="../assets/uploads/'. $produit['images'] .'"          width="200"  height="200"> 
                        </div>';

         $contenu .= '<div class="col-md-4">
                            
                            <h3>Details</h3>
                            <ul>
                                <li>Quantite : '.$produit['quantite'].'</li>
                            </ul>

                            <p class="lead">Prix : '.$produit['prix'].'dt</p>
                        </div>';

                         $contenu .= '<div class="col-md-4">';
                            $contenu .= '<form method="post" action="panier.php">';

                                $contenu .= ' <input type="hidden" name="id_produit"  value="'.$produit['id_produit'].'">'; 

                                $contenu .= '<select name="quantite" id="quantite" >';
                                            for($i = 1; $i <= $produit['quantite']; $i++ )
                                            {
                                                    $contenu .= "<option >$i</option>"; 
                                            }

                             $contenu .= '</select>';
                             $contenu .= '<input type="submit" name="ajout_panier"  value="ajouter au panier" class="bt">';
                             $contenu .= '</form>';
                            $contenu .= '</div>';

                                 } 



?>
    <a href="boutique.php">Retour vers votre  achat</a></p>
    <div class="row">
        <?php echo $contenu;   ?>
    </div>

