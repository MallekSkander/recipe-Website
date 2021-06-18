<?PHP
	
    include_once '../configh.php' ;
	require_once '../Models/Promo.php';
   
		

	class PromotionC {
		
		function addPromotion($Promotion){
			$sql="INSERT INTO Promotion (id_produit, pourcentage, nv_prix) 
			VALUES (:id_produit,:pourcentage,:nv_prix)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id_produit' => $Promotion->getid_produit(),
					'pourcentage' => $Promotion->getpourcentage(),
					'nv_prix' => $Promotion->getnv_prix()
			
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function displayPromotions(){
			
			$sql="SELECT * FROM Promotion";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function displayPromotionsfu(){
			
			$sql="SELECT * FROM Promotion AS promo JOIN Produit AS pro ON promo.id_produit = pro.id_produit";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}


		function deletePromotion($id){
			$sql="DELETE FROM Promotion WHERE id= :id";
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
		function updatePromotion($Promotion, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE Promotion SET 
						id_produit = :id_produit, 
						pourcentage = :pourcentage,
						nv_prix = :nv_prix
					
					
					WHERE id = :id'
				);
				$query->execute([
					'id_produit' => $Promotion->getid_produit(),
					'pourcentage' => $Promotion->getpourcentage(),
					'nv_prix' => $Promotion->getnv_prix(),
		
			
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recoverPromotionbyid($id){
			$sql="SELECT * from Promotion where id=:id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute(['id'=>$id]);

				$Promotion=$query->fetch();
				return $Promotion;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function trierPromo($tri){
			switch ($tri) {
				case 0:
					$sql="SELECT * FROM promotion";
					   break;
				case 1:
					$sql="SELECT * FROM promotion ORDER BY nv_prix ";
				  break;
				case 2:
					$sql="SELECT * FROM promotion ORDER BY pourcentage ";
					   break ;
	
				  }
		
				$db = config::getConnexion();
				try{
					$liste = $db->query($sql);
					return $liste;
				}
				catch (Exception $e){
					die('Erreur: '.$e->getMessage());
				}	
		
			}
			function searchpromo($search){
			
				$sql="SELECT * FROM promotion WHERE id LIKE  '%$search%' OR id_produit LIKE '%$search%' OR pourcentage LIKE '%$search%' OR nv_prix LIKE '%$search%' ";
				$db = config::getConnexion();
				try{
					$liste = $db->query($sql);
					return $liste;
				}
				catch (Exception $e){
					die('Erreur: '.$e->getMessage());
				}	
			}

}


?>