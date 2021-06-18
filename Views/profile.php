<?php
require '../Controllers/ProfileCtrl.php';
$reg = new ProfileCtrl();
$user = $reg->fetchUserInformation();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'Includes/header.php'; ?>
    <link rel="stylesheet" href="../css/style.css">
    <title>Dmak - Profile</title>
</head>
<body>
    <div class="centered-content">
        <h1 id="header">Profile</h1>
        <p id="error-info">Hey there! Say hello to your own little place, take a looksie!</p>
    </div>
    <br>
    <br>
    <div class="profile-container">
        <p class="user-info"><span id="label">First Name: </span> <?php echo htmlspecialchars($user[0]['first_name'])?></p>
        <hr>
        <p class="user-info"><span id="label">Last Name: </span><?php echo htmlspecialchars($user[0]['last_name'])?></p>
        <hr>
        <p class="user-info"><span id="label">Email: </span><?php echo htmlspecialchars($user[0]['email'])?></p>
        <hr>
        <p class="user-info"><span id="label">Username: </span><?php echo htmlspecialchars($user[0]['username'])?></p>
        <hr>
        <p class="user-info"><span id="label">State: </span><?php echo htmlspecialchars($user[0]['state'])?></p>
        <hr>
        <p class="user-info"><span id="label">Phone Number: </span><?php echo htmlspecialchars($user[0]['phone_number'])?></p>
    </div>
    <br>
    <br>
    <div class="icon-container">
        <span data-tooltip="Back to Home" data-flow="bottom">
            <div class="icon-wrapper" id="home"><i class="fas fa-home"></i></div>
        </span>
        <span data-tooltip="Sign Out" data-flow="bottom">
            <div class="icon-wrapper" id="logout"><i class="fas fa-sign-out-alt"></i></div>
        </span>
        <span data-tooltip="Account Details" data-flow="bottom">
            <div class="icon-wrapper" id="details"><i class="fas fa-user-cog"></i></div>
        </span>
        <span data-tooltip="Account Security" data-flow="bottom">
            <div class="icon-wrapper" id="security"><i class="fas fa-user-shield"></i></div>
        </span>
        <span data-tooltip="Account History" data-flow="bottom">
            <div class="icon-wrapper" id="history"><i class="fas fa-history"></i></div>
        </span>
        <?php
        if (isset($_SESSION['is_admin'])) {
            echo "<span data-tooltip='Admin Dashboard' data-flow='bottom'>";
            echo "<div class='icon-wrapper' id='admin-dash'><i class='fas fa-toolbox'></i></div>";
            echo "</span>";
        }
        ?>
        <span data-tooltip="Delete Your Account" data-flow="bottom">
            <div class="icon-wrapper" id="delete"><i class="fas fa-trash-alt"></i></div>
        </span>
    </div>
    <script type="text/javascript" src="../js/profile.js"></script>
</body>
</html>
