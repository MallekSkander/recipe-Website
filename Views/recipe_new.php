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




<?php
if(is_post_request()) {
    $recipe_name = $_POST['recipe_name'] ?? '';
    $instructions = $_POST['recipe_instructions'] ?? '';


    $new_recipe_id = create_new_recipe_instructions($dbb,$recipe_name, $instructions); // yasna3 instruction jdida bech yesra9 id mte3 wi7otha fi variable

    $ing_new_list = explode(',', $_POST['ing_list']);

    foreach($ing_new_list as $ing_id) {
        $ing_qty_list[$ing_id] = $_POST[$ing_id];
    }

    $cat_new_list = explode(',', $_POST['cat_list']);
    create_new_recipe_ingredients($dbb,$new_recipe_id, $ing_qty_list);//  bech yasna3 recepie(base de donné) bech yel9i les ingrediant wel les quantité
    create_new_recipe_categories($dbb,$new_recipe_id, $cat_new_list);// bech yasna3 assigned_categories(base de donné) bech yel9i instruction  wel les categories mte3hom
    $_SESSION['status'] = 'Recipe "' . h($recipe_name) . '" successfuly created.';
    redirect_to(('../Views/recipe_view.php?id=' . h(u($new_recipe_id))));
}

?>






<?php include('Abidaheader.php'); ?>

<div id="content" style="position:relative; left: 500px ; top: 70px">

    <div class="section-header">
        <h2>New Recipe</h2>

    </div>
    <form action="<?php echo ('../Views/recipe_new.php'); ?>" id="new_recipe_form" method="post">

        <!-- N A M E -->

        <label for="recipe_name">Nom de la recette
        </label></br>
        <input type="text" name="recipe_name" id="recipe_name" placeholder="Nom" required></br>

        <!-- C A T E G O R I E S -->

        <label for="categories_list">Sélectionnez les catégories
        </label></br>
        <?php $categories = find_all_cat($dbb); ?>
        <select name="categories_list" id="categories_list">
            <option value="" selected disabled="disabled">selectionner</option>
            <?php while($category=$categories->fetch(PDO::FETCH_ASSOC)){ ?>
            <option class="cat_list_item" value="<?php echo $category['id'] ?>"><?php echo find_name_of_cat($dbb,$category['id']) ?></option>
            <?php } ?>
        </select></br>


        <table id="categories_table"></table>

        <input type="hidden" name="cat_list" id="cat_list" class="hidden" value=""/>

        <!-- I N G R E D I E N T S -->

        <label for="ingredients_list">Sélectionnez un nouvel ingrédient
        </label></br>
        <?php $ingredients = find_all_ingredients($dbb); ?>
        <select name="ingredients_list" id="ingredients_list">
            <option value="" selected disabled="disabled">selectionner</option>
            <?php while($ingredient=$ingredients->fetch(PDO::FETCH_ASSOC)) { ?>
            <option class="ing_list_item" value="<?php echo $ingredient['id'] ?>"><?php echo find_name_of_ingredient($dbb,$ingredient['id']) ?></option>
            <?php } ?>
        </select></br>

        <table id="ingredients_table"></table>

        <input type="hidden" name="ing_list" id="ing_list" class="hidden" value=""/>

        <!-- I N S T R U C T I O N S -->

        <label for="recipe_instructions_form">Instructions de recette
        </label></br>
        <textarea name="recipe_instructions" id="recipe_instructions" cols="30" rows="10"></textarea></br>

        <!-- S U B M I T -->

        <button type="submit" id="submit">Valider</button>
    </form>
</div>

<script>var catArray = []; var ingArray = [];</script>
<script src="<?php echo ('../scripts/script.js'); ?>"></script>

<?php include('Abidafoot.php'); ?>
