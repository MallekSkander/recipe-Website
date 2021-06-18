<?php
require_once('../Controller/conn.php');
require_once('../Controller/functions.php');
require_once('../Controller/SQL_functions.php');
$errors = [];


$id = $_GET['id'] ?? redirect_to(('/index.php')); //if !isset redirect

$subject = find_recipe_by_id($dbb,$id);
$recipe_instructions=$subject->fetch(PDO::FETCH_ASSOC);
$cat_old_list = [];
$ing_old_list = [];

if(is_post_request()) {
    $recipe_name = $_POST['recipe_name'] ?? '';
    $instructions = $_POST['recipe_instructions'] ?? '';
    $cat_new_list = explode(',', $_POST['cat_list']);
    
    $ing_new_list = explode(',', $_POST['ing_list']);
    foreach($ing_new_list as $ing_id) {
        $ing_qty_list[$ing_id] = $_POST[$ing_id];
    }
    update_recipe_instructions($dbb,$id, $recipe_name, $instructions);
    delete_assigned_categories($dbb,$id);
    create_new_recipe_categories($dbb,$id, $cat_new_list);
    delete_recipe($dbb,$id);
    create_new_recipe_ingredients($dbb,$id, $ing_qty_list);
    
    $_SESSION['status'] = 'Recipe "' . h($recipe_name) . '" successfuly edited.';
    redirect_to(('../Views/recipe_view.php?id=' . h(u($id))));     
}
?>

<?php $page_title = 'Edit - ' . h($recipe_instructions['name']); ?>

<?php include('Abidaheader.php'); ?>

<div id="content" style="position:relative; left: 500px ; top: 70px">

    <form action="<?php echo ('../Views/recipe_edit.php?id=' . $id); ?>" method="post">
        
    <div class="sections_edit_recipe">
        <!-- N A M E -->
        
        <label for="recipe_name">Nom de la recette
        </label></br>
        <input type="text" name="recipe_name" id="recipe_name" value="<?php echo $recipe_instructions['name']; ?>" required></br>
    
    </div>

    <div class="sections_edit_recipe">

        <!-- C A T E G O R I E S -->
    
        <label for="categories_list">Sélectionnez les catégories
        </label></br>
        <?php $categories = find_all_cat($dbb); ?>
        <select name="categories_list" id="categories_list">
            <option value="" selected disabled="disabled">Select</option>
            <?php while($category=$categories->fetch(PDO::FETCH_ASSOC)) { ?>
            <option class="cat_list_item" value="<?php echo $category['id'] ?>"><?php echo find_name_of_cat($dbb,$category['id']) ?></option>
            <?php } ?>
        </select></br>

        <?php $recipe_categories = find_cat_of_recipe($dbb,$id); ?>
        <table id="categories_table">

            <?php while($category=$recipe_categories->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo find_name_of_cat($dbb,$category['cat_id']); ?></td>
                <td><a class="remove_button" href="javascript:void(0)" id="<?php echo 'rem_cat_' . $category['cat_id']; ?>"><i class="far fa-trash-alt delete_button" title="delete"></i></a></td>
            </tr>
            <?php $cat_old_list[] = $category['cat_id']; } ?>
        </table>

        <input type="text" name="cat_list" id="cat_list" class="hidden" value=""/>
    </div>

    <div class="sections_edit_recipe">        
        <!-- I N G R E D I E N T S -->
            
        <label for="ingredients_list">Sélectionnez un nouvel ingrédient
        </label></br>
        <?php $ingredients = find_all_ingredients($dbb); ?>
        <select name="ingredients_list" id="ingredients_list">
            <option value="" selected disabled="disabled">Select</option>
            <?php while($ingredient=$ingredients->fetch(PDO::FETCH_ASSOC)) { ?>
            <option class="ing_list_item" value="<?php echo $ingredient['id'] ?>"><?php echo find_name_of_ingredient($dbb,$ingredient['id']) ?></option>
            <?php } ?>
        </select></br>

        <?php $recipe_ingredients = find_ingredients_of_recipe($dbb,$id); ?>
        <table id="ingredients_table">

            <?php while($ingredient=$recipe_ingredients->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo find_name_of_ingredient($dbb,$ingredient['ing_id']); ?></td>
                <td>
                    <input 
                    type="text" 
                    name="<?php echo h($ingredient['ing_id']); ?>"
                    value="<?php echo h($ingredient['quantity']); ?>" />
                </td>
                <td><a class="remove_button" href="javascript:void(0)" id="<?php echo 'rem_ing_' . $ingredient['ing_id']; ?>"><i class="far fa-trash-alt delete_button" title="delete"></i></a></td>

                <!-- <td><button type="button" class="remove_button" id="<?php //echo 'rem_ing_' . $ingredient['ing_id']; ?>">Remove</button></td> -->
            </tr>
            <?php $ing_old_list[] = $ingredient['ing_id']; } ?>
        </table>

        <input type="text" name="ing_list" id="ing_list" class="hidden" value=""/>
    </div>

    <div class="sections_edit_recipe">
        <!-- I N S T R U C T I O N S -->
            
        <label for="recipe_instructions_form">Instructions de recette
        </label></br>
        <textarea name="recipe_instructions" id="recipe_instructions" cols="30" rows="10">
            <?php echo h($recipe_instructions['content']); ?>
        </textarea></br>
    </div>     
            
        <!-- S U B M I T -->
        <button type="submit" id="submit">Valider</button>
    </form>

</div>

<script> var catArray = <?php echo json_encode($cat_old_list); ?>; </script>
<script> var ingArray = <?php echo json_encode($ing_old_list); ?>; </script>
<script src="<?php echo ('../scripts/script.js'); ?>"></script>


<?php include('Abidafoot.php'); ?>
