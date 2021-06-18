<?php

require_once '../Classes/Controller.php';
require_once '../Models/HistoryMod.php';

class HistoryCtrl extends Controller {
    private $model;

    public function __construct() {
        $this->model = new HistoryMod();
		$this->enforceRestrictions();
    }

	public function enforceRestrictions() {
        if (!isset($_SESSION["username"])) {
			header('location: profile');
            die();
		}
    }

    public function fetchHistory() {
        return $this->model->fetchHistory($_SESSION['username']);
    }

    public function addToHistory($username, $description, $code, $date, $time) {
        return $this->model->addToHistory($username, $description, $code, $date, $time);
    }
}

?>