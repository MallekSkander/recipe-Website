<?PHP
require_once "../config.php";
require_once "../Model/comment.php";

class CommentC
{
	public function afficherCom($id)
	{
		$sql = "SELECT * FROM comments WHERE thread =".$id;
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	public function afficherComs()
	{
		$sql = "SELECT * FROM comments";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	public function ajouterCom($comment)
	{
		$sql = "insert into comments (user,content,thread)
			values (:user,:content,:thread)";
		$db = config::getConnexion();
		try {
			$req = $db->prepare($sql);
			$user = $comment->getUser();
			$content = $comment->getContent();
			$thread = $comment->getThread();
			$req->bindValue(':user', $user);
			$req->bindValue(':content', $content);
			$req->bindValue(':thread', $thread);
			$req->execute();
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}

	function supprimerCom($ID)
	{
		$sql = "DELETE FROM comments where ID=:ID";
		$db = config::getConnexion();
		try {
			$req = $db->prepare($sql);
			$req->bindValue(':ID', $ID);
			$req->execute();
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}

	public function updateCom($thread, $id)
	{
		try {
			$db = config::getConnexion();
			$sql = "UPDATE comments SET user = :user, thread = :thread, content = :content WHERE ID = :ID";
			$req = $db->prepare($sql);
			$req->bindValue(':ID', $id);
			$user = $thread->getUser();
			$threadID = $thread->getThread();
			$content = $thread->getContent();
			$req->bindValue(':user', $user);
			$req->bindValue(':thread', $threadID);
			$req->bindValue(':content', $content);
			$req->execute();
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
	function recupererCom($ID){
		$db = config::getConnexion();
		try{
			$sql="SELECT * from comments where ID=:ID";
			$req=$db->prepare($sql);
			$req->bindValue(':ID',$ID);
			$req->execute();

			$thread=$req->fetch();
			return $thread;
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
	}

	function triCmd(){
		
        $sql="SElECT * From commande ORDER BY(montant) ASC";
        $db = config::getConnexion();
        try{
        $listeCmd=$db->query($sql);
        return $listeCmd;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

}
