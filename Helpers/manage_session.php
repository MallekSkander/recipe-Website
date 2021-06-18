<?php

// This session management script is primarily to be called
// through ajax to manage the user session:
// - Get username session variable
// - Kill the session / logout
// - Delete the current user & logout

require_once '../Classes/Database.php';

switch ($_POST['action']) {
    case "get_username": {
        // Return the username session variable
        echo json_encode(array("username"=>$_SESSION['username']));
        break;
    }
    case "kill_session": {
        // Kill the session and redirect to home page.
        unset($_SESSION['username']);
        session_destroy();
        break;
    }
    case "delete_user": {
        // Kill the session and redirect to home page.
        $db = new Database();
        $db->bind("u", $_SESSION['username']);
        $db->query("DELETE FROM user WHERE username=:u");
        unset($_SESSION['username']);
        session_destroy();
        break;
    }
    case "ban_user": {
        // Kill the session and redirect to home page.
        $db = new Database();
        $db->bind("u", $_POST['username']);
        $db->query("UPDATE user SET is_banned = 1 WHERE username=:u");
        break;
    }
    case "unban_user": {
        // Kill the session and redirect to home page.
        $db = new Database();
        $db->bind("u", $_POST['username']);
        $db->query("UPDATE user SET is_banned = 0 WHERE username=:u");
        break;
    }
    case "clear_history": {
        $db = new Database();
        $db->bind("u", $_SESSION['username']);
        $db->query("DELETE FROM history WHERE username=:u");
        break;
    }
    case "admin_search_history": {
        $db = new Database();
        $db->bind("val", $_POST['search']);
        $entries = $db->query("
        SELECT username AS 'Username', description AS 'Description',
        code AS 'Code', date AS 'Date', time AS 'Time'
        FROM history WHERE username=:val OR description=:val OR code=:val OR date=:val OR time=:val");
        echo json_encode($entries);
        break;
    }
    case "admin_search_users": {
        $db = new Database();
        $db->bind("val", $_POST['search']);
        $entries = $db->query("
        SELECT first_name AS 'First Name', last_name AS 'Last Name', 
        email AS 'Email', username AS 'Username', state AS 'State', 
        phone_number AS 'Phone Number', is_admin AS 'Admin', is_banned AS 'Banned'
        FROM user 
        WHERE first_name=:val OR last_name=:val 
        OR email=:val OR username=:val OR phone_number=:val OR state=:val");
        echo json_encode($entries);
        break;
    }
    case "admin_clear_search": {
        $db = new Database();
        $entries = $db->query("SELECT * FROM history");
        echo json_encode($entries);
        break;
    }
    case "admin_sort_users": {
        $db = new Database();
        switch ($_POST['search']) {
            case 'first_name': {
                $entries = $db->query("
                SELECT first_name AS 'First Name', last_name AS 'Last Name', 
                email AS 'Email', username AS 'Username', state AS 'State', 
                phone_number AS 'Phone Number', is_admin AS 'Admin', is_banned AS 'Banned'
                FROM user ORDER BY first_name ASC");
                echo json_encode($entries);
                break;
            }
            case 'last_name': {
                $entries = $db->query("
                SELECT first_name AS 'First Name', last_name AS 'Last Name', 
                email AS 'Email', username AS 'Username', state AS 'State', 
                phone_number AS 'Phone Number', is_admin AS 'Admin', is_banned AS 'Banned'
                FROM user ORDER BY last_name ASC");
                echo json_encode($entries);
                break;
            }
            case 'email': {
                $entries = $db->query("
                SELECT first_name AS 'First Name', last_name AS 'Last Name', 
                email AS 'Email', username AS 'Username', state AS 'State', 
                phone_number AS 'Phone Number', is_admin AS 'Admin', is_banned AS 'Banned'
                FROM user ORDER BY email ASC");
                echo json_encode($entries);
                break;
            }
            case 'username': {
                $entries = $db->query("SELECT first_name AS 'First Name', last_name AS 'Last Name', 
                email AS 'Email', username AS 'Username', state AS 'State', 
                phone_number AS 'Phone Number', is_admin AS 'Admin', is_banned AS 'Banned'
                FROM user ORDER BY username ASC");
                echo json_encode($entries);
                break;
            }
            case 'phone_number': {
                $entries = $db->query("SELECT first_name AS 'First Name', last_name AS 'Last Name', 
                email AS 'Email', username AS 'Username', state AS 'State', 
                phone_number AS 'Phone Number', is_admin AS 'Admin', is_banned AS 'Banned'
                FROM user ORDER BY phone_number ASC");
                echo json_encode($entries);
                break;
            }
            case 'state': {
                $entries = $db->query("
                SELECT first_name AS 'First Name', last_name AS 'Last Name', 
                email AS 'Email', username AS 'Username', state AS 'State', 
                phone_number AS 'Phone Number', is_admin AS 'Admin', is_banned AS 'Banned'
                FROM user ORDER BY state ASC");
                echo json_encode($entries);
                break;
            }
        }
        break;
    }
    case "admin_sort_history": {
        $db = new Database();
        switch ($_POST['search']) {
            case 'username': {
                $entries = $db->query("SELECT username AS 'Username', description AS 'Description',
                code AS 'Code', date AS 'Date', time AS 'Time'
                FROM history ORDER BY username DESC");
                echo json_encode($entries);
                break;
            }
            case 'description': {
                $entries = $db->query("SELECT username AS 'Username', description AS 'Description',
                code AS 'Code', date AS 'Date', time AS 'Time'
                FROM history ORDER BY description DESC");
                echo json_encode($entries);
                break;
            }
            case 'code': {
                $entries = $db->query("SELECT username AS 'Username', description AS 'Description',
                code AS 'Code', date AS 'Date', time AS 'Time'
                FROM history ORDER BY code DESC");
                echo json_encode($entries);
                break;
            }
            case 'date': {
                $entries = $db->query("SELECT username AS 'Username', description AS 'Description',
                code AS 'Code', date AS 'Date', time AS 'Time'
                FROM history ORDER BY date DESC");
                echo json_encode($entries);
                break;
            }
            case 'time': {
                $entries = $db->query("SELECT username AS 'Username', description AS 'Description',
                code AS 'Code', date AS 'Date', time AS 'Time'
                FROM history ORDER BY time DESC");
                echo json_encode($entries);
                break;
            }
        }
        break;
    }
}

?>