<?php
require_once('../Controller/conn.php');
require_once('../Controller/functions.php');
require_once('../Controller/SQL_functions.php');
$errors = [];


$id = $_GET['id'] ?? redirect_to(('../Views/ingredient.php')); //if !isset redirect
$ingredient_name = find_name_of_ingredient($dbb,$id);
$errors = [];

if(is_post_request()) {
    $result = del_ingredient($dbb,$id);
    if($result) {
        $_SESSION['status'] = 'Ingredient "' . h($ingredient_name) . '" successfuly deleted.';
        redirect_to(('../Views/ingredient.php'));
    } else {
        $errors[] = 'You cannot delete an ingredient that is assigned to a recipe.';
    }
}

?>

<?php $page_title = 'Delete Ingredient - ' . h($ingredient_name); ?>

<?php include('Abidaheader.php'); ?>

<div id="content" style="position:relative; left: 500px ; top: 70px">

    <?php echo display_errors($errors); ?>

    <h1>SUPPRIMER UN INGRÉDIENT
        - <?php echo h($ingredient_name); ?></h1>
    
    <h2>Voulez-vous vraiment supprimer cet ingrédient?
    </h2>
    
    <form action="<?php echo ('../Views/ingredient_delete.php?id=' . h(u($id))) ?>" method="post">
        <button type="submit">Supprimer</button>
    </form>
</div>

<?php include('Abidafoot.php'); ?>
