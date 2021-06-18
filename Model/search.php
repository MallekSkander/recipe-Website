<!DOCTYPE html>
<html>
<head>
	<title>chercher</title>
</head>
<body>
<?php require_once '../back/navbar.php'; ?>
<br>
<form method="post">
<label>Search</label>
<input type="text" name="search">
<input type="submit" name="submit">
	
</form>

</body>
</html>

<?php

$con = new PDO("mysql:host=localhost;dbname=dmak",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `produit` WHERE produit = '$str'");
	$sth = $con->prepare("SELECT * FROM `produit` WHERE quantite = '$str'");
	$sth = $con->prepare("SELECT * FROM `produit` WHERE prix = '$str'");


	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table>
			<tr>
            <th>Image</th>
                        <th>produit</th>
                        <th>Prix</th>
                        <th>Quantite</th>
			</tr>
			<tr>
            <td><img src="../assets/uploads/<?php echo $row-> images; ?>" alt=" "  class="image_product "></td>
                            <td><?php echo $row-> produit; ?> </td>
                            <td><?php echo $row-> prix; ?> </td>
                            <td><?php echo $row-> quantite; ?> </td>
			</tr>

		</table>
<?php 
	}
		
		
		
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>chercher</title>
</head>
<body>
<?php require_once '../back/navbar.php'; ?>

	

</body>
</html>

<?php

$con = new PDO("mysql:host=localhost;dbname=dmak",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `type` WHERE types = '$str'");

		$sth = $con->prepare("SELECT * FROM `type` WHERE nom = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table>
			<tr>
            <th>image</th>
                        <th>produit</th>
                       <th>Type</th>
			</tr>
			<tr>
            <td><img src="../assets/uploads/<?php echo $row-> images; ?>" alt=" "  class="image_product "></td>
                            <td><?php echo $row-> nom; ?> </td>
                            <td><?php echo $row-> types; ?> </td>
                            
			</tr>

		</table>
<?php 
	}
		



}

?>
