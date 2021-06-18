<?php

require '../Classes/Controller.php';
require '../Models/RegisterMod.php';

class RegisterCtrl extends Controller {
    public $model;

    public function __construct() {
        $this->model = new RegisterMod();
		$this->enforceRestrictions();
    }

	public function enforceRestrictions() {
        if (isset($_SESSION["username"])) {
			header('location: profile.php');
            die();
		}
    }

	// Check if the password and password confirmation are identical.
    public function arePasswordsIdentical($password, $passwordConfirm) {
		if ($password == $passwordConfirm) {
			return true;
		}

		return false;
	}

	// Check if the phone number is an 8 digit integer.
    public function isPhoneNumberValid($arg) {
		$valid = (strlen($arg) == 8 && is_int(intval($arg))) ? true : false;
		return $valid;
	}

    // Sends the user-provided account details to the user model.
	public function createUser(){
		if($_SERVER['REQUEST_METHOD']=='POST') {
		// Assign each form field to a variable
		$firstName = $_POST["first_name"];
		$lastName = $_POST["last_name"];
		$email = $_POST["email"];
		$username = $_POST["username"];
		$password = $_POST["password"];
		$passwordConfirm = $_POST["password_confirm"];
		$state = $_POST["state"];
		$phoneNumber = $_POST["phone_number"];

		// Check if any of the required fields aren't set.
		// Exit if they're not all set.
		if (empty($email) || empty($username) || empty($password) || empty($passwordConfirm) || empty($phoneNumber)) {
			$this->setError("You missed some required fields.");
			return;
		}

		// Check if the username/email provided by the user wanting to sign up,
		// already exists within the database.
		$result = $this->model->doesUserAlreadyExist($email, $username);
		// Exit if such username/email already exists.
		if ($result == true) {
            $this->setError("The email/username you entered is already in use.");
            return;
        }

		// Check if the password and password confirmation are identical
		$result = $this->arePasswordsIdentical($password, $passwordConfirm);
		// Exit if they're not.
		if ($result == false) {
            $this->setError("Passwords do not match.");
            return;
        }

		// Check if the phone number is valid
		$result = $this->isPhoneNumberValid($phoneNumber);
		// Exit if it is not.
		if ($result == false) {
            $this->setError("The phone number you entered is not a valid number :(");
            return;
        }

		// All checks have passed, we can safely
		// pass the user credentials to the model, which
		// will then query the database to add a new user.
        $this->model->createUser(
			$firstName,
			$lastName,
			$email,
			$username,
			$password,
			$state,
			$phoneNumber
		);
		
		// Redirect to the login page
		header('location: login.php');
		}
	}
}

?>