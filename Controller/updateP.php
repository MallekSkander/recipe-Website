<?php 

require_once '../db.php';

if(isset($_POST['updatebtn']))
{
        $userid_produit = intval ($_GET['id_produit']);
        $produit = $_POST['produit'];
        $prix = $_POST['prix'];
        $quantite = $_POST['quantite'];

        $sql= " UPDATE `produit` SET `produit`=:code_art,`prix`=:nomart,`quantite`=:quant WHERE id_produit=:nouvelleid_produit ";

        $query = $pdo->prepare($sql);
        $query ->bindParam(':code_art', $produit, PDO::PARAM_STR);
        $query ->bindParam(':nomart', $prix, PDO::PARAM_STR);
        $query ->bindParam(':quant', $quantite, PDO::PARAM_STR);
        $query ->bindParam(':nouvelleid_produit', $userid_produit, PDO::PARAM_STR);

        $query->execute();

        echo "<script>alert('Vous avez modifier un produit');</script>";
        echo "<script> window.location.href='../back/produit.php'</script>";

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

        $userid_produit = intval ($_GET['id_produit']);
        $sql ="SELECT  `produit`, `prix`,`quantite` FROM `produit` WHERE id_produit=:nouvelleid_produit";

        $query = $pdo->prepare($sql);
        $query->bindParam(':nouvelleid_produit', $userid_produit , PDO::PARAM_STR);
        $query->execute();

        $resultat= $query->fetchAll(PDO::FETCH_OBJ);

        foreach ($resultat as $row)
        {
?>
        

                <form action="" method="POST" class="form-group">
                         Produit :
                        <input type="text" name="produit" id_produit="" class="form-control" value="<?php echo $row->produit; ?>">
                         prix : 
                        <input type="text" name="prix" id_produit="" class="form-control" value="<?php echo $row->prix; ?>">
                        Quantite Produit : 
                        <input type="text" name="quantite" id_produit="" class="form-control" value="<?php echo $row->quantite; ?>">

                        <input type="submit" name="updatebtn" id_produit="" value="Metre a jours" class="btn btn-primary mt-3">
                        <?php } ?>
                </form>
        </div>
        </div>
       </div>
        
</body>
</html>