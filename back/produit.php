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

        $stmt = $pdo->query('SELECT * FROM produit');

        if(isset($_REQUEST['del']))
{

$sup = intval ($_GET['del']);

$sql = "DELETE FROM produit WHERE id_produit=:id_produit";
$query = $pdo->prepare($sql);
$query->bindParam(':id_produit', $sup , PDO::PARAM_STR);
$query->execute();
    echo "<script> window.location.herf='../back/produit.php'</script>";

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
    <?php require_once '../back/navbar.php'; ?>
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
                            <td><?php echo $row-> prix .'DT'; ?> </td>
                            <?php
                            if (intval($row->quantite) != 0) {
                                echo "<td>". $row->quantite ."</td>";
                                echo "<td><span class='badge bg-success'>En Stock</span></td>";
                            } else {
                                echo "<td></td>";
                                echo "<td><span class='badge bg-danger'>Hors stock!</span></td>";
                            }
                            ?>
                            <td>
                                    <a href="../controller/updateP.php?id_produit=<?php echo $row->id_produit;?>"><button class="btn btn-primary" ><i class="fas fa-edit"></i></button></a>
                                    
                                   <a href="../back/produit.php?del=<?php echo $row->id_produit;?>"><button class="btn btn-danger" OnClick="return confirm ('voulez vous vraiment supprimer')"><i class="fas fa-trash"></i></button></a>
                            
                            </td>
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