<?php

require '../Controllers/LoginCtrl.php';
// On submit, the login controller will be instantiated
$ctrl = new LoginCtrl();
// And the website will query the database to check if
// the provided credentials do in fact exist.
$ctrl->login();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'Includes/header.php'; ?>
    <link rel="stylesheet" href="../css/style.css">
    <title>Dmak - Login</title>
</head>
<body>
    <div class="centered-content">
        <h1 id="header">Login</h1>
        <p id="error-info">Your account is waiting for you.</p>
    </div>
    <div class="edit-container">
    <?php echo '<p id="error-message">'. $ctrl->printError() .'</p>';?>
        <form method="POST" id="login-form" autocomplete="off">
            <p class="input-label-login">Username</p>
            <div class="edit-content-wrap">
                <input type="text" class="input-field" name="username" required>
            </div>
            <p class="input-label-login">Password</p>
            <div class="edit-content-wrap">
                <input type="password" class="input-field" name="password" required>
            </div>
        </form>
        <br>
        <div class="centered-buttons">
            <span data-tooltip="Login!" data-flow="bottom">
                <div class="icon-wrapper" id="confirm"><i class="fas fa-sign-in-alt"></i></div>
            </span>
            <span data-tooltip="Cancel" data-flow="bottom">
                <div class="icon-wrapper" id="cancel"><i class="fas fa-ban"></i></div>
            </span>
        </div>
        <br>
    </div>
    <script type="text/javascript" src="../js/shared/script.js"></script>
    <script type="text/javascript" src="../js/login.js"></script>
</body>
</html>
