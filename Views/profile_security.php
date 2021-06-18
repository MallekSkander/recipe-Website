<?php
require '../Controllers/ProfileSecurityCtrl.php';
// On submit, the register controller will be instantiated
$ctrl = new ProfileSecurityCtrl();
// And a new user will be created using the credentials
// provided in the form
$ctrl->updateUserPassword();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'Includes/header.php'; ?>
    <link rel="stylesheet" href="../css/style.css">
    <title>Profile - Security</title>
</head>
<body> 
    <div class="centered-content">
        <h1 id="header">Account Security</h1>
        <p id="error-info">Hey @<?php echo htmlspecialchars($_SESSION['username']) ?>, I heard you want to beef up security...</p>
    </div>
    <br>
    <div class="edit-container">
        <form method="POST" autocomplete="off">
            <p class="form-text">Let's reset your password <i class="fas fa-key"></i></p>
            <hr>
            <p class="input-label-security">Old Password</p>
            <div class="edit-content-wrap">
                <input type="password" class="input-field" name="password_old" required>
            </div>
            <p class="input-label-security">New Password</p>
            <div class="edit-content-wrap">
                <input type="password" class="input-field" name="password_new" required>
            </div>
            <p class="input-label-security">Confirm Password</p>
            <div class="edit-content-wrap">
                <input type="password" class="input-field" name="password_confirm" required>
            </div>
            <br>
        </form>
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
    <script type="text/javascript" src="../js/profile/security.js"></script>
</body>
</html>
