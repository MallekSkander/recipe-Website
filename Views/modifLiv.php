<?PHP
	include "..\controller\LivraisonC.php";

	$livraisonC=new LivraisonC();
	$listeLiv=$livraisonC->afficherLivraison();

?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../assets/dmak_style.css" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
		
		<title> Afficher Liste livraison a supprimer</title>
    </head>
	<a class="btn btn-warning" href="index.html"  >Retour</a>
	<br>
	<br>
	<h3>Les livraisons disponibles </h3>	

<body>
		
		<table class="tableau-style">

			<thead>
			<tr>
				<th>Id du laivraison</th>
			    <th>Nom livreur</th>
				<th>Prenom livreur</th>
				<th>Numero telephone</th>
				<th>Adresse</th>
				<th>Modifier</th>				
				
				
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
						<a type="button" class="btn btn-warning" href="modifierLivraison.php?id=<?PHP echo $liv['id']; ?>"> Modifier </a>											
					</td>

					
				
				</tr>
				</tbody>
			<?PHP
				}
			?>
		</table>
		
		
	</body>
	</html>
