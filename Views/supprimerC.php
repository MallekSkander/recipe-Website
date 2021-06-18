<?PHP
	include "../controller/commentC.php";

	$sujetC = new CommentC();

	
	if (isset($_POST["ID"])){
		$sujetC->supprimerCom($_POST["ID"]);
		header('Location:forums.php');
	}


?>