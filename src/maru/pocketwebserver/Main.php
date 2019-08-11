<?php
namespace maru\pocketwebserver;

use pocketmine\plugin\PluginBase;
use maru\pocketwebserver\webserver\WebServer;

class Main extends PluginBase {
	private $webServer;
	
    public function onEnable() {
    	$this->webServer = new WebServer();
    	$this->webServer->start();
    }
}

