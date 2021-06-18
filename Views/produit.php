<?php 
        require_once '../db.php';

        if (!isset($_SESSION['username'])) {
            header('location: login.php');
            die();
        }

        $stmt = $pdo->query('SELECT * FROM produit');

        if(isset($_REQUEST['del']))
{

$sup = intval ($_GET['del']);

$sql = "DELETE FROM produit WHERE id_produit=:id_produit";
$query = $pdo->prepare($sql);
$query->bindParam(':id_produit', $sup , PDO::PARAM_STR);
$query->execute();
    echo "<script> window.location.herf='../Views/produit.php'</script>";

}



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
                        <th>prix</th>
                        <th>Quantite</th>
                        <th>Etat en stock</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    <?php 
                    while ( $row =  $stmt->fetch())
                    {
                        ?>
                    
                        <tr>
                            <td><img src="../assets/uploads/<?php echo $row-> images; ?>" alt=" "  class="image_product "></td>
                            <td><?php echo $row-> produit; ?> </td>
                            <td><?php echo $row-> prix; ?> </td>
                            <td><?php echo $row-> quantite; ?> </td>
                            <td > <span class="badge bg-success">en Stock</span> </td>
                            
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