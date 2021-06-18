

<!DOCTYPE html>
<html>
<head>
	<title>Search Bar</title>
  <link rel="stylesheet" href="../assets/dmak_style.css" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
<br>
<a class="btn " href="lescommentaires.php"  >Retour</a>
<br>
<br>
<form method="post">
<label>Recherche par n'importe quel critére </label>
<input type="text" name="search">
<input class="btn " type="submit" name="submit">

		<br><br><br>
		<table class="tableau-style"> 
    
    <?php
      $con = new PDO("mysql:host=localhost;dbname=dmak",'root','');

      if (isset($_POST["submit"])) {
        $str = $_POST["search"];
        $sth = $con->prepare("SELECT * FROM comments WHERE user = '$str' OR thread = '$str' or content='$str'");
      
        $sth->setFetchMode(PDO:: FETCH_OBJ);
        $sth -> execute();
      
        if($row = $sth->fetch())
        {

        ?>	
        								<table class="table">

			<tr>
      
				<th>Utilisateur</th>
        <th>Titre</th>
				<th>Contenu</th>
        <th>Date</th>
				
			</tr>
			<tr>
				<td><?php echo $row->user;?></td>
				<td><?php echo $row->thread; ?></td>
				<td><?php echo $row->content;?></td>
        <td><?php echo $row->date_comment; ?></td>
				
				
			</tr>

		</table>
<?php 
	}
	
		else
			echo "Le critére saisi ne trouve pas dans la table";

}

?>
</form>

</body>
</html>