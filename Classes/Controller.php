<?php

class Controller { 
    private ?string $error = "";

    public static function createView($viewName) {
        $root = dirname(dirname(__FILE__));
        require_once($root . "/Views/". strtolower($viewName) . ".php");
    }

    public static function createNestedView($directory, $viewName) {
        $root = dirname(dirname(__FILE__)) . '/';
        require_once($root . "Views/". $directory . "/" . strtolower($viewName) . ".php");
    }

    public function printError() {
		return $this->error;
	}

	public function setError($message) {
		$this->error = $message;
	}
}

?>
