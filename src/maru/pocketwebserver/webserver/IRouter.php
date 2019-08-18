<?php

namespace maru\pocketwebserver\webserver;

interface IRouter {
	/**
	 * 
	 * @param \HTTPRequest $request
	 * @return \HTTPResponse
	 */
	public function request(\HTTPServer $server, \HTTPRequest $request);
}

