<?php
require_once('../Controller/conn.php');
require_once('../Controller/functions.php');
require_once('../Controller/SQL_functions.php');
$errors = [];



if(is_post_request()) {
    $result = create_new_cat($dbb,$_POST['new_category_name']);
    if($result) {
        $_SESSION['status'] = 'Category "' . h($_POST['new_category_name']) . '" successfuly created.';
        redirect_to(('../Views/category.php'));
    } else {
        $message = $result;
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

?>

<?php $page_title = 'New Category'; ?>

<?php include('Abidaheader.php'); ?>

<div id="content" style="position:relative; left: 500px ; top: 70px">
    <h1>Nouvelle catégorie
    </h1>
    
    <form action="<?php echo ('../Views/category_new.php'); ?>" method="post">
        <input type="text" name="new_category_name" placeholder="New Category Name" required></br>
        <button type="submit">Valider</button>
    </form>
</div>

<?php include('Abidafoot.php'); ?>
