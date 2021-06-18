<?php
require_once('../Controller/conn.php');

require_once('../Controller/functions.php');
require_once('../Controller/SQL_functions.php');
$errors = [];


$id = $_GET['id'] ?? redirect_to(('../Views/ingredient.php')); //if !isset redirect
$ingredient_name = find_name_of_ingredient($dbb,$id);

if(is_post_request()) {
    update_to_date_ingredient($dbb,$id, $_POST['new_value']);
    $_SESSION['status'] = 'Ingredient "' . h($_POST['new_value']) . '" successfuly edited.';
    redirect_to(('../Views/ingredient.php'));
}

?>

<?php $page_title = 'Edit Ingredient - ' . h($ingredient_name); ?>

<?php include('Abidaheader.php'); ?>

<div id="content" style="position:relative; left: 500px ; top: 70px">
    <h1>MODIFIER L'INGRÉDIENT
        - <?php echo h($ingredient_name); ?></h1>
    
    <form action="<?php echo ('../Views/ingredient_edit.php?id=' . h(u($id))) ?>" method="post">
        <input type="text" name="new_value" value="<?php echo h($ingredient_name); ?>" required></br>
        <button type="submit">Valider</button>
    </form>
</div>

<?php include('Abidafoot.php'); ?>
