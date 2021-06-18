<?php 
        require_once '../db.php';

        if (!isset($_SESSION['username'])) {
            header('location: login.php');
            die();
        }

        $stmt = $pdo->query('SELECT * FROM type');

        if(isset($_REQUEST['del']))
{

$sup = intval ($_GET['del']);

$sql = "DELETE FROM type WHERE id_type=:id_type";
$query = $pdo->prepare($sql);
$query->bindParam(':id_type', $sup , PDO::PARAM_STR);
$query->execute();
    echo "<script> window.location.herf='../Views/produit1.php'</script>";

}



?>
<?php
        // faire appel a la base de donnees

        require_once '../db.php';
   
        // ajouter un produit depuis le formulaire 
    
if(isset($_POST['ajouter']) && !empty($_POST['nom'])
                            && !empty($_POST['types'])
                            

)
{   
    $nom = $_POST['nom'];
    $types = $_POST['types'];
    $quantite = $_POST['quantite'];

    // pour l'image ya bouceaup de chose a jouter 
    // je laisse le code dans un lien dans la descreption 

        $images=$_FILES['profile']['name'];
		$tmp_dir=$_FILES['profile']['tmp_name'];
		$imageSize=$_FILES['profile']['size'];
            // creer un dossier nommer le uplods 
            // pour stocker nos images
		$upload_dir='../assets/uploads/';
		$imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
		$valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
		$picProfile=rand(1000, 1000000).".".$imgExt;
		move_uploaded_file($tmp_dir, $upload_dir.$picProfile);

        $sql ="INSERT INTO type(nom, types, images)
         VALUES (:nom, :types, :images)";
         $stmt = $pdo->prepare($sql);

         $stmt->bindParam(':nom', $nom);
         $stmt->bindParam(':types', $types);
         $stmt->bindParam(':images', $images);
         $stmt->execute();
         header('Location:produit1.php');
}
            $stmt = $pdo->query('SELECT * FROM type');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMAK</title>
</head>
<body>
    <?php require_once '../Views/navbar.php'; ?>
   
   

                  
            <div class="container">
                <table class="table table-striped display mt-3" id="example">
                    <thead>
                        <th>image</th>
                        <th>produit</th>
                       <th>Type</th>
                        
                    </thead>
                    <tbody>
                    <?php 
                    while ( $row =  $stmt->fetch())
                    {
                        ?>
                    
                        <tr>
                            <td><img src="../assets/uploads/<?php echo $row-> images; ?>" alt=" "  class="image_product "></td>
                            <td><?php echo $row-> nom; ?> </td>
                            <td><?php echo $row-> types; ?> </td>
                           
                        </tr>
                       <?php } ?>
                       
                    </tbody>
             </table>
            </div>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "scrollY":        "600px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );
</script>

<div class="text-center">
<button onClick="window.print()" class="btn btn-primary">Imprimer</button>  

    </div>
</body>
</html>