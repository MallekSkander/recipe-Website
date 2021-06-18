<?php
    include_once '..\Model\Livraison.php';
    include_once '..\Controller\LivraisonC.php';

    if (!isset($_SESSION['username'])) {
        header('location: login.php');
        die();
    }

    $error = "";
    $liv = null;
    $livC = new LivraisonC();
    
    if (
        isset($_POST["nom"]) && 
        isset($_POST["prenom"]) &&
        isset($_POST["num_tel"]) &&
        isset($_POST["adresse"]) 
       
    ) {
        if (
            !empty($_POST["nom"]) && 
            !empty($_POST["prenom"]) && 
            !empty($_POST["num_tel"]) && 
            !empty($_POST["adresse"])  
           
        ) {
            $liv = new livraison(
                $_POST['nom'],
                $_POST['prenom'], 
                $_POST['num_tel'], 
                $_POST['adresse']
                
            );
            $livC->ajouterLivraison($liv);
            header('Location:afficherLivraison.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/dmak_style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Livraison Display</title>
</head>
    <body>
        <a class="btn btn-warning" href="index.html">Retour </a>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table class="tableau">
            

                <tr>
                   
                    <td>
                        <label for="nom">Nom livreur:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prenom">Prenom livreur:
                        </label>
                    </td>
                    <td><input type="text" name="prenom" id="prenom" maxlength="20"></td>
                </tr>
                
                <tr>
                    
                    <td>
                        <label for="num_tel">numero telephone:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="num_tel" id="num_tel" Pattern="[0-9]{8}" maxlength="8" >
                    </td>
                </tr>
                <tr>
                    
                    <td>
                        <label for="adresse">Adresse:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="adresse" id="adresse" maxlength="30" >
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input  class="btn btn-warning" type="submit" value="Ajouter" > 
                    </td>                 
                </tr>
            </table>
        </form>
    </body>
</html>