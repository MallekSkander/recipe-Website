<?PHP
	include "..\controller\LivraisonC.php";

	$livraisonC = new LivraisonC();

	
	if (isset($_POST["id"])){
		$livraisonC->supprimerCommande($_POST["id"]);
		header('Location:afficherCmd.php');
	}

?>

