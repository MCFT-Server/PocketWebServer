<?php

namespace maru\pocketwebserver\webserver;

use pocketmine\plugin\Plugin;

class WebServer extends \HTTPServer {
	/**
	 * 
	 * @var IRouter[]
	 */
	protected $routers = [];
	private $plugin;
	
	public function __construct(Plugin $plugin, $ip='0.0.0.0', $port=80) {
		parent::__construct(array(
			'addr' => $ip,
			'port' => $port
		));
		$this->plugin = $plugin;
	}
	
	public function route_request($request) {
		$response = null;
		foreach($this->routers as $router) {
			$response = $router->request($server, $request);
			if ($response !== null) break;
		}
		return $response;
	}
	
	public function addRouter(IRouter $router) {
		$this->routers[] = $router;
	}
}
