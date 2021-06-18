<?php
require_once('../Controller/conn.php');
require_once('../Controller/functions.php');
require_once('../Controller/SQL_functions.php');
$errors = []; 

if (!isset($_SESSION['username'])) {
    header('location: login.php');
    die();
}

?>


<?php $page_title = 'Categories'; ?>

<?php include('Abidaheader.php'); ?>

<div id="content" style="position:relative; left: 500px ; top: 70px">

    <?php echo display_status_message(); ?>



    <div class="section-header">
        <h2>Categories:</h2>

    </div>

    <button><a href="<?php echo('../Views/category_new.php') ?>">Crée une nouvelle Categorie</a></button>

    <table>
        <?php $categories = find_all_cat($dbb);

        while ( $category=$categories->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td class="title"><?php echo $category['name']; ?></td>
                <td><a class="action"
                       href="<?php echo('../Views/category_edit.php?id=' . h(u($category['id']))); ?>"><i
                                class="far fa-edit edit_button" title="edit"></i></a></td>
                <td><a class="action"
                       href="<?php echo('../Views/category_delete.php?id=' . h(u($category['id']))); ?>"><i
                                class="far fa-trash-alt delete_button" title="delete"></i></a></td>
            </tr>
        <?php } ?>
    </table>
</div>
<?php include('Abidafoot.php'); ?>

