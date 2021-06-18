<?PHP
	include "..\controller\LivraisonC.php";

	if (!isset($_SESSION['username'])) {
   		header('location: login.php');
    	die();
	}

	$livraisonC=new LivraisonC();
	$listeLiv=$livraisonC->afficherLivraison();

?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../assets/dmak_style.css" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
		
		<title> Afficher Liste Livraison</title>
    </head>

	<a class="btn btn-warning" href="index.html"  >Retour</a>
	<br>
	<br>
	<h3>Les livraisons disponibles </h3>
	<br>
	<a class="btn btn-warning" href="tri_liv.php"  >Trier le tableau (par nom)</a>
	<br>
	<br>
	<a class="btn btn-warning" href="recherche.php"  >Recherche</a>
	<br>
	<br>
    <form method="POST" action="imprimerlivraison.php">
    <button class="btn btn-warning" name="imprimer" >Telecharger en PDF</button>  

    <body>
		
		<table class="tableau-style">

			<thead>
			<tr>
				<th>Id du livraison</th>
			    <th>Nom livreur</th>
				<th>Prenom livreur</th>
				<th>Numero telephone</th>
				<th>Adresse de livraison</th>
				<th>Supprimer</th>
			
				
			</tr>
			</thead>
			<?PHP
				foreach($listeLiv as $liv){
			?>  
			    <tbody>
				<tr>
				    
					<td><?PHP echo $liv['id']; ?></td>
					<td><?PHP echo $liv['nom']; ?></td>
					<td><?PHP echo $liv['prenom']; ?></td>
					<td><?PHP echo $liv['num_tel']; ?></td>
					<td><?PHP echo $liv['adresse']; ?></td>
					<td>
						<center><form class="supp" method="POST" action="supprimerLivraison.php"></center>
						<input class="btn btn-warning"  type="submit" name="supprimer" value="supprimer">
						<input type="hidden" value=<?PHP echo $liv['id']; ?> name="id">
						</form>
					</td>
				
				
				</tr>
				</tbody>
			<?PHP
				}
			?>
		</table>
		
		
	</body>
</html>
