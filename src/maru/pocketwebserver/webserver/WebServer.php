<?php
namespace maru\pocketwebserver\webserver;

use maru\pocketwebserver\webserver\task\SocketReadTask;
use pocketmine\Server;

class WebServer {
    private $ip;
    private $port;
    private $socket;
    /**
     * 
     * @var SocketReadTask $readTask
     */
    private $readTask;
    
    public function __construct($ip='0.0.0.0', $port=80) {
        $this->ip = $ip;
        $this->port = $port;
    }
    
    public function start() {
    	$errno = $errorMessage = null;
    	$this->socket = stream_socket_server("tcp://{$this->ip}:{$this->port}", $errno, $errorMessage);
    	if ($this->socket === false) {
    		throw new \UnexpectedValueException("Could not bind to socket: $errorMessage");
    	}
    	
        $this->readTask = new SocketReadTask($this->socket, Server::getInstance()->getLogger());
        Server::getInstance()->getAsyncPool()->submitTask($this->readTask);
   	}
}

