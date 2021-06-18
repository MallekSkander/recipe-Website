<?PHP
	include "../controller/commandeC.php";

	$cmdc = new CommandeC();
	
	if (isset($_POST["id_cmd"])){
		$cmdc->supprimerCommande($_POST["id_cmd"]);
		header('Location:afficherCommande.php');
	}

?>