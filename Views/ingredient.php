<?php
require_once('../Controller/conn.php');
require_once('../Controller/functions.php');
require_once('../Controller/SQL_functions.php');
$errors = []; ?>


<?php $page_title = 'Ingredients'; ?>

<?php include('Abidaheader.php'); ?>

<div id="content" style="position:relative; left: 500px ; top: 70px">

    <?php echo display_status_message(); ?>
    

    <div class="section-header">
        <h2>New Ingrédients</h2>

    </div>
    <button><a href="<?php echo ('../Views/ingredient_new.php') ?>">
            Enregistrer un nouvel ingrédient</a></button>
    
    <table>
        <?php $ingredients = find_all_ingredients($dbb); ?>
        <?php while($ingredient=$ingredients->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $ingredient['name']; ?></td>
            <td><a class="action" href="<?php echo ('../Views/ingredient_edit.php?id=' . h(u($ingredient['id']))); ?>"><i class="far fa-edit edit_button" title="edit"></i></a></td>
            <td><a class="action" href="<?php echo ('../Views/ingredient_delete.php?id=' . h(u($ingredient['id']))); ?>"><i class="far fa-trash-alt delete_button" title="delete"></i></a></td>        
        </tr>
        <?php } ?>
    </table>
</div>

<?php include('Abidafoot.php'); ?>
