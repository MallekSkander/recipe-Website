<?php

require '../Classes/Controller.php';
require '../Models/AdminHistoryMod.php';

class AdminHistoryCtrl extends Controller {
    private $model;

    public function __construct() {
        $this->model = new AdminHistoryMod();
		$this->enforceRestrictions();
    }

	public function enforceRestrictions() {
        if (!isset($_SESSION["username"])) {
			header('location: profile.php');
            die();
		}

        if (!isset($_SESSION["is_admin"])) {
			header('location: profile');
            die();
		}
    }

    public function fetchHistory() {
        return $this->model->fetchHistory();
    }
}

?>