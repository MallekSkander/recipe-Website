<?php
require_once('../Controller/conn.php');
require_once('../Controller/functions.php');
require_once('../Controller/SQL_functions.php');
$errors = [];


$id = $_GET['id'] ?? redirect_to(('../Views/index.php')); //if !isset redirect

$instructions = find_recipe_by_id($dbb,$id);  // yejbed les instructions mel base (name / contenct)

$instructions_selected=$instructions->fetch(PDO::FETCH_ASSOC); // bech isatafhom w yafichihom mba3d

//-----------------------------------------------------------------------------------

$assigned_categories = find_cat_of_recipe($dbb,$id); // i7eb ya3ref l category mta3 el recette 

/****************************************************************************** */

$recepie = find_ingredients_of_recipe($dbb,$id); // bech tlawej 3al ingrediant  mta3 instruction(mekla)
                                                    // ama el quantité 7adhra
//--------------------------------------------------------------------------------------------------------------



?>


<?php include('Abidaheader.php'); ?>

<div id="content" style="position:relative; left: 100px ; top: 70px">

    <?php echo display_status_message(); ?>

    <div class="view_recipe">


        <div class="title_cat_style">
            <div class="section-header">
                <h2>NOM:</h2>

            </div>
            <h3 class="title"> <?php echo h($instructions_selected['name']) ?? ''; ?> </h3>



            <h3 class="title">   <div class="section-header">
                    <h2>Categorie:</h2>

                </div>


                <?php
                $i = 1;
                while ($category=$assigned_categories->fetch(PDO::FETCH_ASSOC)) {
                    echo h(find_name_of_cat($dbb,$category['cat_id']));

                    $count_categories = $assigned_categories->rowCount();
                    if (($count_categories) > $i) echo ' | ';
                    $i++;
                } ?></h3>


        </div>

        <div class="ing_style">
            <div class="section-header">
                <h2>Ingrédients:</h2>

            </div>
            <h3 class="title">     <table>


                    <?php while ($ingredient=$recepie->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td><?php echo h(find_name_of_ingredient($dbb,$ingredient['ing_id'])); ?></td>
                            <td><?php echo h($ingredient['quantity']); ?></td>
                        </tr>
                    <?php } ?>
                </table></h3>


        </div>

        <div class="ins_style">
            <div class="section-header">
                <h2>Instructions:</h2>


            </div>
            <h3 class="title"> <?php echo nl2br(h($instructions_selected['content'])); ?></h3>
        </div>


    </div>
</div>
<?php include('Abidafoot.php'); ?>

