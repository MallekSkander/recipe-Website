<?php

require '../Classes/Controller.php';
require '../Models/ProfileEditMod.php';
require_once '../Controllers/HistoryCtrl.php';

class ProfileEditCtrl extends Controller {
    public $model;

    public function __construct() {
        $this->model = new ProfileEditMod();
		$this->enforceRestrictions();
    }

	public function enforceRestrictions() {
		if (!isset($_SESSION['username'])) {
			header("location: ../login.php");
    		die();
		}
	}

    public function isPhoneNumberValid($arg) {
		$valid = (strlen($arg) == 8 && is_int(intval($arg))) ? true : false;
		return $valid;
	}

	public function fetchUserInformation() {
        return $this->model->fetchUserInformation($_SESSION['username']);
    }

    public function updateUser() {
        if($_SERVER['REQUEST_METHOD']=='POST') {
			// Assign each form field to a variable
			$firstName = $_POST["first_name"];
			$lastName = $_POST["last_name"];
			$email = $_POST["email"];
			$username = $_SESSION["username"];
			$state = $_POST["state"];
			$phoneNumber = $_POST["phone_number"];

			// Check if any of the required fields aren't set.
			$all_set = isset($email, $state, $phoneNumber); 

			if ($all_set == false) {
                $this->setError("You missed some required fields.");
                return;
            }

            $result = $this->model->doesUserAlreadyExist($email, $username);
			if ($result == true) {
                $this->setError("The email you entered is already in use.");
                return;
            }

			$result = $this->isPhoneNumberValid($phoneNumber);
			if ($result == false) {
                $this->setError("The phone number you entered is invalid.");
                return;
            }

            // All checks have passed, we can safely
			// pass the user credentials to the model
            $this->model->updateUser(
				$firstName,
				$lastName,
				$email,
				$username,
				$state,
				$phoneNumber
			);

			$history = new HistoryCtrl();
            $history->addToHistory($username, "Updated the account credentials", "0", date('Y-d-m'), date('H:i:s'));

			// Redirect the user to their profile page.
			header("location: profile.php");
        }
    }

}

?>