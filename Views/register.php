<?php

require_once '../Controllers/RegisterCtrl.php';

// On submit, the register controller will be instantiated
$ctrl = new RegisterCtrl();
// And a new user will be created using the credentials
// provided in the form
$ctrl->createUser();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'Includes/header.php'; ?>
    <link rel="stylesheet" href="../css/style.css">
    <title>Register</title>
</head>
<body>
    <div class="centered-content">
        <h1 id="header">Create an Account</h1>
        <p id="error-info">You're one step away from getting your own little place in here :)</p>
    </div>
    <br>
    <br>
    <div class="edit-container">
        <form method="POST" name="form" autocomplete="off">
            <p class="form-text-register">Let's make you an account! <i class="far fa-laugh-wink"></i></p>
            <hr>
            <p class="input-label">First Name</p>
            <div class="edit-content-wrap">
                <input type="text" class="input-field" name="first_name">
            </div>
            <p class="input-label">Last Name</p>
            <div class="edit-content-wrap">
                <input type="text" class="input-field" name="last_name">
            </div>
            <p class="input-label">Username</p>
            <div class="edit-content-wrap">
                <input type="text" class="input-field" name="username">
            </div>
            <p class="input-label">Email</p>
            <div class="edit-content-wrap">
                <input type="email" class="input-field" name="email">
            </div>
            <p class="input-label">Phone Number</p>
            <div class="edit-content-wrap">
                <input type="text" class="input-field" name="phone_number">
            </div>
            <p class="input-label">State</p>
            <div class="edit-content-wrap">
                <select class="state-dropdown" name="state">
                    <option value="Tunis">Tunis</option>
                    <option value="Ariana">Ariana</option>
                    <option value="Ben Arous">Sousse</option>
                    <option value="Manouba">Hammamet</option>
                    <option value="Nabeul">Nabeul</option>
                    <option value="Zaghouan">Zaghouan</option>
                    <option value="Bizerte">Bizerte</option>
                    <option value="Beja">Beja</option>
                    <option value="Jendouba">Jendouba</option>
                    <option value="Kef">Kef</option>
                    <option value="Siliana">Siliana</option>
                    <option value="Sousse">Sousse</option>
                    <option value="Monastir">Monastir</option>
                    <option value="Mahdia">Mahdia</option>
                    <option value="Sfax">Sfax</option>
                    <option value="Kairouan">Kairouan</option>
                    <option value="Kasserine">Kasserine</option>
                    <option value="Sidi Bouzid">Sidi Bouzid</option>
                    <option value="Gabes">Gabes</option>
                    <option value="Mednine">Mednine</option>
                    <option value="Tataouine">Tataouine</option>
                    <option value="Gafsa">Gafsa</option>
                    <option value="Tozeur">Tozeur</option>
                    <option value="Kebili">Kebili</option>
                </select>
            </div>
            <p class="input-label">Password</p>
            <div class="edit-content-wrap">
                <input type="password" class="input-field" name="password">
            </div>
            <p class="input-label">Confirm Password</p>
            <div class="edit-content-wrap">
                <input type="password" class="input-field" name="password_confirm">
            </div>
        </form>
        <br>
        <div class="centered-buttons">
            <span data-tooltip="Confirm" data-flow="bottom">
                <div class="icon-wrapper" id="confirm"><i class="fas fa-check"></i></div>
            </span>
            <span data-tooltip="Cancel" data-flow="bottom">
                <div class="icon-wrapper" id="cancel"><i class="fas fa-ban"></i></div>
            </span>
        </div>
        <?php echo '<p id="error-message">'. $ctrl->printError() .'</p>';?>
    </div>
    <script type="text/javascript" src="../js/shared/script.js"></script>
    <script type="text/javascript" src="../js/register.js"></script>
</body>
</html>