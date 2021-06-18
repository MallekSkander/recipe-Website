<?php

require_once('../Controller/conn.php');
require_once('../Controller/functions.php');
require_once('../Controller/SQL_functions.php');
$errors = []; ?>



<?php include('Abidaheader.php'); ?>








<div id="content " style="position:relative; left: 500px ; top: 70px">

    <?php echo display_status_message(); ?>

    <div>
        <table>
            <tr>
                <div class="section-header">
                    <h2>Nom du Recette:</h2>

                </div>
                <th>&nbsp;</th> <!--view-->
                <th>&nbsp;</th> <!--edit-->
                <th>&nbsp;</th> <!--delete-->
            </tr>

            <?php $recipes = find_all_recipes($dbb) ?>

            <?php while($recipe=$recipes->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo h($recipe['name']) ?></td>
                <td><a class="action" href="<?php echo ('../Views/recipe_view.php?id=' . h(u($recipe['id']))); ?>"><i class="fas fa-eye view_button" title="view"></i></a></td>
                <td><a class="action" href="<?php echo ('../Views/recipe_edit.php?id=' . h(u($recipe['id']))); ?>"><i class="far fa-edit edit_button" title="edit"></i></a></td>
                <td><a class="action" href="<?php echo ('../Views/recipe_delete.php?id=' . h(u($recipe['id']))); ?>"><i class="far fa-trash-alt delete_button" title="delete"></i></a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>

<?php include('Abidafoot.php'); ?>
