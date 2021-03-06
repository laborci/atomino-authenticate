<?php namespace Atomino\Mercury\Plugins\Authenticate;

use Atomino\Bundle\Authenticate\Authenticator;
use Atomino\Mercury\Pipeline\Handler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthCheck extends Handler {
	public function __construct(private Authenticator $authenticator) { }

	public function handle(Request $request): Response {
		if ($this->authenticator->isAuthenticated()) return $this->next($request);
		return new Response(null, Response::HTTP_UNAUTHORIZED);
	}
}
