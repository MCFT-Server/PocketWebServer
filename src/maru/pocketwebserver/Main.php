<?php
namespace maru\pocketwebserver;

use pocketmine\plugin\PluginBase;
use maru\pocketwebserver\webserver\WebServer;
use maru\pocketwebserver\webserver\task\RunWebAsync;

require __DIR__ . '/../../../vendor/autoload.php';

class Main extends PluginBase {
	private $webServer;
	
    public function onEnable() {
    	$this->webServer = new WebServer($this);
    	$this->getServer()->getAsyncPool()->submitTask(new RunWebAsync($this->webServer));
    	
    	@mkdir($this->getDataFolder() . '/static_web');
    }
}

