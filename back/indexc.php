<?php

    require_once '../db.php';

    if (!isset($_SESSION['username'])) {
    	header('location: ../Views/login.php');
    	die();
	}

	if (!isset($_SESSION['admin'])) {
    	header('location: ../Views/login.php');
    	die();
	}
    
if(isset($_POST['ajouter']) && !empty($_POST['produit'])
                            && !empty($_POST['prix'])
                            && !empty($_POST['quantite'])

)
{   
    $produit = $_POST['produit'];
    $prix = $_POST['prix'];
    $quantite = $_POST['quantite'];

        $images=$_FILES['profile']['name'];
		$tmp_dir=$_FILES['profile']['tmp_name'];
		$imageSize=$_FILES['profile']['size'];

		$upload_dir='../assets/uploads/';
		$imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
		$valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
		$picProfile=rand(1000, 1000000).".".$imgExt;
		move_uploaded_file($tmp_dir, $upload_dir.$picProfile);

        $sql ="INSERT INTO produit(produit, prix, images, quantite)
         VALUES (:produit, :prix, :images, :quantite)";
         $stmt = $pdo->prepare($sql);

         $stmt->bindParam(':produit', $produit);
         $stmt->bindParam(':prix', $prix);
         $stmt->bindParam(':images', $images);
         $stmt->bindParam(':quantite', $quantite);
         $stmt->execute();
         header('Location:index.php');
}
            $stmt = $pdo->query('SELECT * FROM produit');
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
<?php require_once '../back/navbar.php'; ?>
   
    <div class="container">
        <div class="row">
            <div class="col-2 mt-3">
               <form action="index.php" class="form-group mt-3" method="POST" enctype="multipart/form-data" >
                <label for="">Image du Produit :</label>
                     <input type="file" class="form-control mt-3" name="profile" accept="*/image">
                   <label for="">produit :</label>
                   <input type="text" class="form-control mt-3" name="produit" required>
                   <label for="">prix du Produit :</label>
                   <input type="text" class="form-control mt-3" name="prix" required>
                   <label for="">Quantite :</label>
                   <input type="text" class="form-control mt-3" name="quantite" required>
                   <button type="submit" class="btn btn-primary mt-3" name="ajouter">Enregistrer</button>
               </form>
            </div>
            <div class="col-10 mt-3">
                <table class="table table-striped display mt-3 table-sortable" id="example">
                    <thead>
                        <th>Image</th>
                        <th>produit</th>
                        <th>Prix</th>
                        <th>Quantite</th>
                    </thead>
                    <tbody>
                    <?php 
                    while ( $row =  $stmt->fetch())
                    {
                        ?>
                    
                        <tr>
                        <td><img src="../assets/uploads/<?php echo $row-> images; ?>" alt=" "  class="image_product "></td>
                            <td><?php echo $row-> produit; ?> </td>
                            <td><?php echo $row-> prix .'DT'; ?> </td>
                            <td><?php echo $row-> quantite; ?> </td>
                        </tr>
                       <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../model/tri.js"></script>
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