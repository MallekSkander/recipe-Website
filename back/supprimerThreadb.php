<?PHP
	include "../controller/sujetC.php";

	$sujetC = new forumC();

	
	if (isset($_POST["ID"])){
		$sujetC->supprimerThread($_POST["ID"]);
		header('Location:lessujets.php');
	}


 //echo $sujetC['titre'];

?>