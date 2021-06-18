<?PHP
	include "..\controller\LivraisonC.php";

	$livraisonC = new LivraisonC();
	$listeLiv=$livraisonC->afficherLivraison();
	
	if (isset($_POST["id"])){
		$livraisonC->supprimerLivraison($_POST["id"]);
		header('Location:afficherLivraison.php');
	}

?>

