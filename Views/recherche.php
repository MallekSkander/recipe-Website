

<!DOCTYPE html>
<html>
<head>
	<title>Search Bar</title>
  <link rel="stylesheet" href="../assets/dmak_style.css" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
<br>
<a class="btn btn-warning" href="afficherLivraison.php"  >Retour</a>
<br>
<br>
<form method="post">
<label>Rechercher du livraison (par nom/prenom du livreur)</label>
<input type="text" name="search">
<input class="btn btn-warning" type="submit" name="submit">

		<br><br><br>
		<table class="tableau-style"> 
    
    <?php
      $con = new PDO("mysql:host=localhost;dbname=dmak",'root','');

      if (isset($_POST["submit"])) {
        $str = $_POST["search"];
        $sth = $con->prepare("SELECT * FROM livraison WHERE nom = '$str' OR nom = '$str'");
        $sth->setFetchMode(PDO:: FETCH_OBJ);
        $sth -> execute();
      
        while($row = $sth->fetch())
        {

        ?>	
			<tr>
      
				<th>ID livraison</th>
				<th>Nom livreur</th>
        		<th>Prenom livreu</th>
				<th>Numero telephone</th>
       			 <th>Adresse livraison</th>
				
			</tr>
			<tr>
        <td><?php echo $row->id; ?></td>
				<td><?php echo $row->nom;?></td>
				<td><?php echo $row->prenom; ?></td>
				<td><?php echo $row->num_tel;?></td>
        <td><?php echo $row->adresse; ?></td>
				
				
			</tr>

		</table>
<?php 
	}
	

}

?>
</form>

</body>
</html>