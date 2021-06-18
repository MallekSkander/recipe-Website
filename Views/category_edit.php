<?php
require_once('../Controller/conn.php');
require_once('../Controller/functions.php');
require_once('../Controller/SQL_functions.php');
$errors = [];


$id = $_GET['id'] ?? redirect_to(('../Views/category.php')); //if !isset redirect
$category_name = find_name_of_cat($dbb,$id);

if(is_post_request()) {
    update_cat($dbb,$id, $_POST['new_value']);
    $_SESSION['status'] = 'Category "' . h($_POST['new_value']) . '" successfuly edited.';
    redirect_to(('../Views/category.php'));
}

?>

<?php $page_title = 'Edit Category - ' . h($category_name); ?>

<?php include('Abidaheader.php'); ?>

<div id="content" style="position:relative; left: 500px ; top: 70px">
    <h1>MODIFIER LA CATÉGORIE?
        - <?php echo h($category_name); ?></h1>
    
    <form action="<?php echo ('../Views//category_edit.php?id=' . h(u($id))) ?>" method="post">
        <input type="text" name="new_value" value="<?php echo h($category_name); ?>" required></br>
        <button type="submit">Valider</button>
    </form>
</div>

<?php include('Abidafoot.php'); ?>
