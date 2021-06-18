<?php
require '../Controllers/AdminProfilesCtrl.php';
$ctrl = new AdminProfilesCtrl();
$users = $ctrl->fetchUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'Includes/header.php'; ?>
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin - Profiles</title>
</head>
<body>
    <div class="icon-wrapper" id="back"><i class="fas fa-arrow-left"></i></div>
    <div class="centered-content">
        <h1 id="header">Users</h1>
        <p id="error-info">Hey there! Here are all the users that have created an account.</p>
        <hr>
        <p class="notification"></p>
    </div>
    <br>
    <div class="search-box">
        <span><input type="text" class="input-field" id="search_field" placeholder="Search for something..."></span>
        <span data-tooltip="Search" data-flow="bottom">
            <div class="search-icon" id="search"><i class="fas fa-search"></i></div>
        </span>
    </div>
    <br>
    <hr>
    <br>
    <div class="search-box">
        <span>
            <select id="sort_by" class="state_dropdown">
                <option value="first_name">Sort By First Name</option>
                <option value="last_name">Sort By Last Name</option>
                <option value="email">Sort By Email</option>
                <option value="username">Sort By Username</option>
                <option value="phone_number">Sort By Phone Number</option>
                <option value="state">Sort By State</option>
            </select>
        </span>
        <span data-tooltip="Sort" data-flow="top">
            <div class="search-icon" id="sort"><i class="fas fa-sort-amount-up-alt"></i></div>
        </span>
    </div>
    <br>
<?php
    echo "<table>";
    echo "<tr>";
    echo "<th>First Name</th>";
    echo "<th>Last Name</th>";
    echo "<th>Email</th>";
    echo "<th>Username</th>";
    echo "<th>State</th>";
    echo "<th>Phone Number</th>";
    echo "<th>Admin</th>";
    echo "<th>Banned</th>";
    echo "<th>Action</th>";
    echo "</tr>";

foreach ($users as &$u) {
    $username = $u['username'];
    echo "<tr>";
    echo "<td>".$u['first_name']."</td>";
    echo "<td>".$u['last_name']."</td>";
    echo "<td>".$u['email']."</td>";
    echo "<td>".$username."</td>";
    echo "<td>".$u['state']."</td>";
    echo "<td>".$u['phone_number']."</td>";
    
    if ($u['is_admin'] == "0") {
        echo "<td>No</td>";
    } else {
        echo "<td>Yes</td>";
    }

    if ($u['is_banned'] == "0") {
        echo "<td>No</td>";
    } else {
        echo "<td>Yes</td>";
    }

    if ($username != $_SESSION['username']) {
        echo "
        <td>
        <input type='button' class='ban' id='".$username."' value='Ban'>
        </input><input type='button' class='unban' id='".$username."' value='Unban'></input>
        </td>";
    }
    echo "</tr>";
}
echo "</table>";
?>


<script type="text/javascript" src="../js/admin/profiles.js"></script>
</body>
</html>