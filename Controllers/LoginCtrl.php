<?php

require_once '../Classes/Controller.php';
require_once '../Models/LoginMod.php';
require_once '../Controllers/HistoryCtrl.php';

class LoginCtrl extends Controller {
    private $model;

    public function __construct() {
        $this->model = new LoginMod();
		$this->enforceRestrictions();
    }

	public function enforceRestrictions() {
        if (isset($_SESSION["username"])) {
			header('location: profile.php');
            die();
		}
    }

    // Sends the user-provided account details to the user model.
	public function login(){
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Assign each form field to a variable
			$username = $_POST["username"];
			$password = $_POST["password"];

			$all_set = isset($username, $password);

			// First step is to handle non set fields
			if ($all_set == false) {
				$this->setError("Not all fields were filled.");
				return;
            }

			$result = $this->model->login($username, $password);
			$is_admin = $this->model->isAdmin($username);
			$is_banned = $this->model->isBanned($username);

			if ($is_banned) {
				header("location: index.html");
				die();
			}

			if ($is_admin) {
				$_SESSION["is_admin"] = "true";
			}

			// User exists
			if ($result) {
				$_SESSION["username"] = $username;
				$history = new HistoryCtrl();
            	$history->addToHistory($username, "Logged in", "1", date('Y-d-m'), date('H:i:s'));
				header("location: profile.php");
				die();
			}

			$this->setError("A user with such credentials does not exist.");
			}
		}
}

?>