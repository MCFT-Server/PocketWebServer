<?php

namespace maru\pocketwebserver\webserver\task;

use pocketmine\scheduler\AsyncTask;

class RunWebAsync extends AsyncTask {
	public $webServer;
	public function __construct($webServer) {
		$this->webServer = $webServer;	
	}
	
	public function onRun() {
		require_once __DIR__ . '/../../../../../vendor/autoload.php';
		$this->webServer->run_forever();
	}
}

