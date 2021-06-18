<?php
require_once('../Controller/conn.php');

require_once('../Controller/functions.php');
require_once('../Controller/SQL_functions.php');
$errors = [];


$id = $_GET['id'] ?? redirect_to(('../Views/index.php')); //if !isset redirect


$instructions = find_recipe_by_id($dbb,$id);


$instruction=$instructions->fetch(PDO::FETCH_ASSOC);


if(is_post_request()) {
    delete_recipe($dbb,$id);
    delete_assigned_categories($dbb,$id);
    delete_instructions($dbb,$id);
    $_SESSION['status'] = 'Recipe "' . h($instruction['name']) . '" successfuly deleted.';
    redirect_to(('../Views/index.php'));
}

?>

<?php $page_title = 'Delete - ' . h($instruction['name']); ?>

<?php include('Abidaheader.php'); ?>

<div id="content" style="position:relative; left: 500px ; top: 70px">
    <h1>Supprimer - <?php echo h($instruction['name']); ?></h1>
    
    <h2>Êtes-vous sûr de vouloir supprimer cette recette?
    </h2>
    
    <form action="<?php echo ('../Views/recipe_delete.php?id=' . h(u($id))) ?>" method="post">
        <button type="submit">Supprimer</button>
    </form>
</div>

<?php include('Abidafoot.php'); ?>
