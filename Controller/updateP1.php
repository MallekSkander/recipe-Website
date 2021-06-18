<?php 

require_once '../db.php';

if(isset($_POST['updatebtn']))
{
        $userid_type = intval ($_GET['id_type']);
        $nom = $_POST['nom'];
        $types = $_POST['types'];

        $sql= " UPDATE `type` SET `nom`=:nom,`types`=:nomart WHERE id_type=:nouvelleid_type ";

        $query = $pdo->prepare($sql);
        $query ->bindParam(':nom', $nom, PDO::PARAM_STR);
        $query ->bindParam(':nomart', $types, PDO::PARAM_STR);
        $query ->bindParam(':nouvelleid_type', $userid_type, PDO::PARAM_STR);

        $query->execute();

        echo "<script>alert('Vous avez modifier un produit');</script>";
        echo "<script> window.location.href='../back/produit1.php'</script>";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Metre a jour Produit</title>
</head>
<body>
<?php require_once '../back/navbar.php'; ?>
                <h1>Metre a jour ce Produit </h1>
       
       <div class="container">
        <div class="row">
        <div class="col-8">

        <?php 

        $userid_type = intval ($_GET['id_type']);
        $sql ="SELECT  `nom`, `types` FROM `type` WHERE id_type=:nouvelleid_type";

        $query = $pdo->prepare($sql);
        $query->bindParam(':nouvelleid_type', $userid_type , PDO::PARAM_STR);
        $query->execute();

        $resultat= $query->fetchAll(PDO::FETCH_OBJ);

        foreach ($resultat as $row)
        {
?>
        

                <form action="" method="POST" class="form-group">
                        produit :
                        <input type="text" name="nom" id_type="" class="form-control" value="<?php echo $row->nom; ?>">
                        
                        <label for="types" class="col-sm-3 col-form-label">Types</label>
             <div class="col-sm-7">
                <select class="form-control" name="types" id_type="types">
                <option value="">Select types</option>
                <option value="Salade"  >Salade</option>
                <option value="Pate" >Pate</option>
                <option value="Dessert">Dessert</option>
                <option value="plat">plat</option>
                <option value="boissons">boissons</option>
                

                </select>
                </div>

                        <input type="submit" name="updatebtn" id_type="" value="Metre a jours" class="btn btn-primary mt-3">
                        <?php } ?>
                </form>
        </div>
        </div>
       </div>
        
</body>
</html>