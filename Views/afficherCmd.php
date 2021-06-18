

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../assets/dmak_style.css" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
		
		<title> Afficher Liste Livraison</title>
    </head>
	<h3>Les livraisons disponibles </h3>
	<br>
	<a class="btn btn-warning" href="index.html"  >Retour</a>
	<br>
	<br>
	<br>
    <button onClick="window.print()" class="btn btn-warning">Imprimer</button>  

    </div>
    <body>
		
		<table class="tableau-style">

		
			<thead>
			<tr>
				<th>Id </th>
			    <th>Name</th>
				<th>Email</th>
				<th>Phone number</th>
				<th>Adress</th>
				<th>Paiment mode</th>
				<th>Products</th>
				<th>Amount paid</th>
				<th>Delete</th>	
			
				
			</tr>
			</thead>
			<?PHP
				$conn = mysqli_connect("localhost","root","","projet_web");
				if ($conn->connect_error)
				{		
   				 die("Connection failed:". $conn->connect_error);
				}
				$sql = "SELECT * FROM orders";
				$result = $conn->query($sql);
				if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){


					?>
			    <tbody>
				<tr>
				    
					<td><?PHP echo $row['id']; ?></td>
					<td><?PHP echo $row['name']; ?></td>
					<td><?PHP echo $row['email']; ?></td>
					<td><?PHP echo $row['phone']; ?></td>
					<td><?PHP echo $row['address']; ?></td>
					<td><?PHP echo $row['pmode']; ?></td>
					<td><?PHP echo $row['products']; ?></td>
					<td><?PHP echo $row['amount_paid']; ?></td>
					<td>
						<center><form class="supp" method="POST" action="supprimerCommande.php"></center>
						<input class="btn btn-warning" type="submit" name="supprimer" value="Supprimer">
						<input type="hidden" value=<?PHP echo $row['id']; ?> name="id">
					
					</td>
				
				
				</tr>
				</tbody>
				<?php
			}}
		?>
		</table>
		
		
	</body>
</html>
