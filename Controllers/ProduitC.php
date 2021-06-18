<?PHP
	include "../configh.php";
	require_once '../Models/Produit.php';

		

	class ProduitC {
		
		function recoverProduitbyid($id_produit){
			$sql="SELECT * from produit where id_produit=:id_produit";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute(['id_produit'=>$id_produit]);

				$produit=$query->fetch();
				return $produit;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
}


?>