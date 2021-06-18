<?php
require '../Controllers/AdminHistoryCtrl.php';
$ctrl = new AdminHistoryCtrl();
$history_entries = $ctrl->fetchHistory();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'Includes/header.php'; ?>
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin - History</title>
</head>
<body>
    <div class="icon-wrapper" id="back"><i class="fas fa-arrow-left"></i></div>
    <div class="centered-content">
        <h1 id="header">History</h1>
        <p id="error-info">Here's every user's activity.</p>
        <hr>
        <p class="notification"></p>
    </div>
    <br>
    <div class="search-box">
        <span><input type="text" class="input-field" id="search_field" placeholder="Search for something..."></span>
        <span data-tooltip="Search" data-flow="bottom">
            <div class="search-icon" id="history"><i class="fas fa-search"></i></div>
        </span>
    </div>
    <br>
    <hr>
    <br>
    <div class="search-box">
        <span>
            <select id="sort_by" class="state_dropdown">
                <option value="username">Sort By Username</option>
                <option value="description">Sort By Description</option>
                <option value="code">Sort By Code</option>
                <option value="date">Sort By Date</option>
                <option value="time">Sort By Time</option>
            </select>
        </span>
        <span data-tooltip="Sort" data-flow="top">
            <div class="search-icon" id="sort"><i class="fas fa-sort-amount-up-alt"></i></div>
        </span>
    </div>
    <br>
<?php
    if (!empty($history_entries)) {
    echo "<table>";
    echo "<tr>";
    echo "<th>Username</th>";
    echo "<th>Description</th>";
    echo "<th>Code</th>";
    echo "<th>Date</th>";
    echo "<th>Time</th>";
    echo "</tr>";

    foreach ($history_entries as &$h) {
        echo "<tr>";
        echo "<td>".$h['username']."</td>";
        echo "<td>".$h['description']."</td>";
        echo "<td>".$h['code']."</td>";
        echo "<td>".$h['date']."</td>";
        echo "<td>".$h['time']."</td>";
        echo "</tr>";
    }

    echo "</table>";
    } else {
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo"<div class='centered-content'>";
        echo"<p id='error-info'>Users haven't done anything lately...</p>";
        echo"</div>";
    }  
?>


<script type="text/javascript" src="../js/admin/history.js"></script>
</body>
</html>