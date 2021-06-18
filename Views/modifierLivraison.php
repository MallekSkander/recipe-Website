<?php
	include "..\controller\LivraisonC.php";
	include_once '..\model\Livraison.php';

	$livraisonC = new LivraisonC();
	$error = "";
	
	if (
		isset($_POST["nom"]) && 
        isset($_POST["prenom"]) &&
        isset($_POST["num_tel"]) &&
        isset($_POST["adresse"])  
        
	){
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
			
            $livraisonC->modifierLivraison($liv, $_GET['id']);
            header('Location:modifLiv.php');
        }
        else
            $error = "Missing information";
	}

?>
<html>
	<head>
		<title>Modifier livraison</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/dmak_style.css" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	</head>
	<body>
	<a class="btn btn-warning" href="index.html">Retour à la liste</a>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
		
		<?php
			if (isset($_GET['id'])){
				$liv = $livraisonC->recupererLivraison($_GET['id']);
				
		?>
		<form action="" method="POST">
            <table class="tableau">
                <tr>
                   
                    <td>
                        <label for="id">Id du livraison
                        </label>
                    </td>
                    <td>
						<input type="text" name="id" id="id"  value = "<?php echo $liv['id']; ?>" disabled>
					</td>
				</tr>
				<tr>
					<td>
						<label for="nom">Nom livreur:
						</label>
					</td>
					<td>
						<input type="text" name="nom" id="nom" maxlength="20" value = "<?php echo $liv['nom']; ?>">
					</td>
				</tr>
                <tr>
                    <td>
                        <label for="prenom">Prenom livreur:
                        </label>
                    </td>
                    <td><input type="text" name="prenom" id="prenom" maxlength="20" value = "<?php echo $liv['prenom']; ?>"></td>
                </tr>
                
               
                <tr>
                    <td>
                        <label for="num_tel">Numero telephone:
                        </label> 
                    </td>
                    <td>
                        <input type="text" name="num_tel" id="num_tel" maxlength="8" value = "<?php echo $liv['num_tel']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="adresse">Adresse:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="adresse" id="adresse" value = "<?php echo $liv['adresse']; ?>">
                    </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td>
                        <input class="btn btn-warning" type="submit" value="Modifier" name = "modifer"> 
                    </td>
                </tr>
            </table>
        </form>
		<?php
		}
		?>
	</body>
</html>