<?PHP
	include "../config.php";
	require_once '../Model/Livraison.php';

	class LivraisonC {
		
		function ajouterLivraison($Livraison){
			$sql="INSERT INTO livraison (nom, prenom, num_tel, adresse) 
			VALUES (:nom, :prenom, :num_tel, :adresse)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'nom' => $Livraison->getNomLivraison(),
					'prenom' => $Livraison->getPrenomLivraison(),
					'num_tel' => $Livraison->getNumeroTel(),
					'adresse' => $Livraison->getAdresseLivraison(),
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherLivraison(){
			
			$sql="SELECT * FROM livraison  ";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimerLivraison($id){
			$sql="DELETE FROM livraison WHERE id= :id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierLivraison($Livraison, $id) {
            try {
                $db = config::getConnexion();
                $query = $db->prepare(
                    'UPDATE livraison SET nom = :nom, prenom = :prenom,  num_tel = :num_tel, adresse = :adresse WHERE id = :id'
                );
                $query->execute([
                    'nom' => $Livraison->getNomLivraison(),
					'prenom' => $Livraison->getPrenomLivraison(),
					'num_tel' => $Livraison->getNumeroTel(),
					'adresse' => $Livraison->getAdresseLivraison(),
					'id' => $id
                ]);
                echo $query->rowCount() . " records UPDATED successfully";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

		function recupererLivraison($id){
			$sql="SELECT * from livraison where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$liv=$query->fetch();
				return $liv;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}


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
		
	

	function supprimerProdCmd($id_commande){
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
	


	function rechercheLivraison($nom){
		//$sql="SElECT * From produit e inner join formationphp.produit a on e.idProduit= a.idProduit";
		$sql="SElECT * From livraison where  nom like '%$nom%'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
 
	function triLivraison(){
		
        $sql="SElECT * From livraison ORDER BY(nom) ASC";
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