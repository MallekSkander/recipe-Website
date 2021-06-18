<?php
//To mark navigation option 'active'
$search_page = 'selected';
require_once('../Controller/conn.php');
require_once('../Controller/functions.php');
require_once('../Controller/SQL_functions.php');



//If search form submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $search = trim(filter_input(INPUT_POST,'search',FILTER_SANITIZE_STRING));
    //Add like wildcard for SQL
    $search_term = '%'.$search.'%';
}
?>

<?php include('Abidaheader.php');?>

<div id="content" style="position:relative; left: 400px ; top: 70px">
    <h1>chercher une Rectte</h1>
<!--Add another search form-->
<div class="jumbotron well">
    <form method="post" action="">
        <input type="text" name="search" id="search" />
        <input type="submit" class="btn" value="Search">
    </form>
</div>

<?php
//If search form submitted, display this:
if ($_SERVER["REQUEST_METHOD"]  == "POST"){
?>    
<div class="jumbotron well">
    <h1>Search Results</h1>
    <br>
    <br>
    <h3>
         <?php if($search == ''){
                echo "All Recipes:";
            }
            else{
                echo 'For "'.$search.'"';
            }?>
    </h3>

    <br>
    <br>

    <!-- Search the database for the term, display results-->
    <?php $searchRecipes = search_recipe($dbb,$search_term); ?>
        <?php
            $i=1;
            foreach($searchRecipes as $item){
                echo $i.") <a href='../Views/recipe_view.php?id=".$item['id']."'>".$item['name']."</a>";
                echo "<br>";
                $i++;
            }
        ?>
</div>
</div>

<?php } ?>


