<?PHP
	include "../Controller/CommandeC.php";

	$cmdC = new CommandeC();

	
	if (isset($_POST["id_commande"])){
		$cmdC->suppProdCmd($_POST["id_commande"]);
		header('Location: afficherProduitcommande.php');
	}

?>

