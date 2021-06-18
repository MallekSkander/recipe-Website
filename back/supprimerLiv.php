<?PHP
	include "../controller/livraisonC.php";

	$livc = new LivraisonC();

	
	if (isset($_POST["id"])){
		$livc->supprimerLivraison($_POST["id"]);
		header('Location:livraison.php');
	}

?>