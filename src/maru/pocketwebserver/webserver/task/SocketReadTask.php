<?php
namespace maru\pocketwebserver\webserver\task;

use AttachableThreadedLogger;
use pocketmine\scheduler\AsyncTask;

class SocketReadTask extends AsyncTask { 
	protected $socket;
	private $logger;
	
	public function __construct($socket, AttachableThreadedLogger $logger) {
		$this->socket = $socket;
		$this->logger = $logger;
	}
	
    public function onRun() {
    	while(true) {
	        $client = @stream_socket_accept($this->socket);
	        
	        if ($client) {
	        	$request = fread($client, 1024);
	        	$this->logger->debug("[PocketWebServer] request: " . $request);
	        	
	        	$response = 'HTTP/1.0 200 OK' . PHP_EOL;
	        	$response .= 'Content-Type: text/html' . PHP_EOL;
	        	$response .= PHP_EOL;
	        	$response .= 'you sent :' . PHP_EOL . $request . PHP_EOL;
	        	
	        	fwrite($client, $response, strlen($response));
	        	fclose($client);
	        }
    	}
    }
}
