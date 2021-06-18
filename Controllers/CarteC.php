<?PHP
	include "../configh.php";
	require_once '../Models/Carte.php';

		

	class CarteC {
		
		function addcarte($carte){
			$sql="INSERT INTO carte (username, date_creation, nb_points) 
			VALUES (:username,:date_creation,:nb_points)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'username' => $_POST['username'],
					'date_creation' => $_POST['date_creation'],
					'nb_points' => $_POST['nb_points']
				
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function displaycarte(){
			
			$sql="SELECT * FROM carte";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function deletecarte($id){
			$sql="DELETE FROM carte WHERE id= :id";
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
		function updatecarte($carte, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE carte SET 
						username = :username,
						date_creation = :date_creation,
						nb_points = :nb_points
					
					WHERE id = :id'
				);
				$query->execute([
					'username' => $carte->getusername(),
					'date_creation' => $carte->getdate_creation(),
					'nb_points' => $carte->getnb_points(),
				
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recovercartebyid($id){
			$sql="SELECT * from carte where id=:id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute(['id'=>$id]);

				$carte=$query->fetch();
				return $carte;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function triercarte($tri){
			switch ($tri) {
				case 0:
					$sql="SELECT * FROM carte";
					   break;
				case 1:
					$sql="SELECT * FROM carte ORDER BY username ";
				  break;
				case 2:
					$sql="SELECT * FROM carte ORDER BY date_creation ";
					   break ;
			   case 3:
						$sql="SELECT * FROM carte ORDER BY nb_points ";
					  break;
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
			function searchcarte($search){
			
				$sql="SELECT * FROM carte WHERE id LIKE  '%$search%' OR username LIKE '%$search%' OR date_creation LIKE '%$search%'OR nb_points LIKE '%$search%' ";
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