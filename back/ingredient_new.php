<?php
require_once('../Controller/conn.php');

require_once('../Controller/functions.php');
require_once('../Controller/SQL_functions.php');
$errors = [];


if(is_post_request()) {
    $result = create_new_ingredient($dbb,$_POST['new_ingredient_name']);
    if($result) {
        $_SESSION['status'] = 'Ingredient "' . h($_POST['new_ingredient_name']) . '" successfuly registered.';
        redirect_to(('../back/Recettes.php'));
    } else {
        $message = $result;
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

?>

<?php $page_title = 'New Ingredient'; ?>


<div id="content" style="position:relative; left: 500px ; top: 70px">
    <h1>Nouvel ingrédient
    </h1>
    
    <form action="<?php echo ('../back/ingredient_new.php'); ?>" method="post">
        <input type="text" name="new_ingredient_name" placeholder="New Ingredient Name" required></br>
        <button type="submit">Valider</button>
    </form>
<div id="content">

