<?PHP
	include "..\config.php";


	class CommandeC {
		
		
  
		function supprimerCommande($id_cmd){
			$sql="DELETE FROM commande WHERE id_cmd= :id_cmd";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_cmd',$id_cmd);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
	

	function suppProdCmd($id_commande){
		$sql="DELETE FROM detail_commande WHERE id_commande= :id_commande";
		$db = config::getConnexion();
		$req=$db->prepare($sql);
		$req->bindValue(':id_commande',$id_commande);
		try{
			$req->execute();
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
	}
	function tricommande(){
		
        $sql="SElECT * From commande ORDER BY(montant) ASC";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
	
}

	
?>