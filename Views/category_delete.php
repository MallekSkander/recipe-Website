<?php
require_once('../Controller/conn.php');
require_once('../Controller/functions.php');
require_once('../Controller/SQL_functions.php');
    $errors = [];


$id = $_GET['id'] ?? redirect_to(('../Views/category.php')); //if !isset redirect


$category_name = find_name_of_cat($dbb,$id);
$errors = [];

if(is_post_request()) {

    $result = delete_cat($dbb,$id);
    if($result) {
        $_SESSION['status'] = 'Category "' . h($category_name) . '" successfuly deleted.';
        redirect_to(('../Views/category.php'));
    } else {
        $errors[] = 'You cannot delete a category that is assigned to a recipe.';
    }

}

?>

<?php $page_title = 'Delete Category - ' . h($category_name); ?>

<?php include('Abidaheader.php'); ?>

<div id="content" style="position:relative; left: 500px ; top: 70px">
    <?php echo display_errors($errors); ?>


    <h1>Supprimer Categorie - <?php echo h($category_name); ?></h1>

    <h2>Voulez-vous vraiment supprimer cette catégorie?
    </h2>

    <form action="<?php echo ('../Views/category_delete.php?id=' . h(u($id))) ?>" method="post">
        <button type="submit" name="submit">Supprimer</button>
    </form>
</div>

<?php include('Abidafoot.php'); ?>
