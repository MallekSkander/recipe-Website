<?PHP
	include "../controller/commentC.php";

	$sujetC = new commentC();

	
	if (isset($_POST["ID"])){
		$sujetC->supprimerCom($_POST["ID"]);
		header('Location:lescommentaires.php');
	}


 //echo $sujetC['titre'];

?>