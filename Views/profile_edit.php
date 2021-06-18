<?php
require '../Controllers/ProfileEditCtrl.php';
// On submit, the register controller will be instantiated
$ctrl = new ProfileEditCtrl();
// And a new user will be created using the credentials
// provided in the form
$ctrl->updateUser();
// Fetch again.
$result = $ctrl->fetchUserInformation();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'Includes/header.php'; ?>
    <link rel="stylesheet" href="../css/style.css">
    <title>Profile - Information</title>
</head>
<body>
    <div class="centered-content">
        <h1 id="header">Account Details</h1>
        <p id="error-info">Have anything in mind you'd like to change?</p>
    </div>
    <br>
    <div class="edit-container">
        <form method="POST" name="form" autocomplete="off">
                <p class="input-label">First Name</p>
                <div class="edit-content-wrap">
                    <input type="text" class="input-field" value="<?php echo htmlspecialchars($result[0]['first_name'])?>" name="first_name">
                </div>
                <p class="input-label">Last Name</p>
                <div class="edit-content-wrap">
                    <input type="text" class="input-field" value="<?php echo htmlspecialchars($result[0]['last_name'])?>" name="last_name">
                </div>
                <p class="input-label">Email</p>
                <div class="edit-content-wrap">
                    <input type="email" class="input-field" value="<?php echo htmlspecialchars($result[0]['email'])?>" name="email" required>
                </div>
                <p class="input-label">Phone Number</p>
                <div class="edit-content-wrap">
                    <input type="text" class="input-field" value="<?php echo htmlspecialchars($result[0]['phone_number'])?>" name="phone_number" required>
                </div>
                <p class="input-label">State</p>
                <div class="edit-content-wrap">
                    <select id="state-dropdown" name="state">
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
    <script type="text/javascript" src="../js/profile/edit.js"></script>
</body>
</html>
