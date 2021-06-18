<?php
require '../Controllers/HistoryCtrl.php';
$ctrl = new HistoryCtrl();
$history_entries = $ctrl->fetchHistory();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../Views/Includes/header.php'; ?>
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin - Profiles</title>
</head>
<body>
    <div class="icon-wrapper" id="back"><i class="fas fa-arrow-left"></i></div>
    <div class="centered-content">
        <h1 id="header">History</h1>
        <p id="error-info">Here's your every activity.</p>
        <hr>
        <p class="notification"></p>
    </div>
<?php
    if (!empty($history_entries)) {
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Description</th>";
    echo "<th>Date</th>";
    echo "<th>Time</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

foreach ($history_entries as &$h) {
    echo "<tr>";
    echo "<td>".$h['description']."</td>";
    echo "<td>".$h['date']."</td>";
    echo "<td>".$h['time']."</td>";
    echo "</tr>";
}
    echo "</tbody>";
    echo "</table>";

    echo "<br>";
    echo "<div class='icon-container'>";
    echo "<span data-tooltip='Clear History' data-flow='bottom'>";
    echo "<div class='icon-wrapper' id='clear'><i class='fas fa-eraser'></i></div>";
    echo "</span>";
    echo "</div>";
} else {
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo"<div class='centered-content'>";
        echo"<p id='error-info'>You haven't done anything lately...</p>";
        echo"</div>";
    }  
?>


<script type="text/javascript" src="../js/history.js"></script>
</body>
</html>