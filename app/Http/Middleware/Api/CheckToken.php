<?php

namespace App\Http\Middleware\Api;

use App\Models\ApiToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response) $next
     * @return Response
     */
    public function handle($request, Closure $next)
    {
        $bearerToken = $this->getBearerTokenFromRequest($request);
        $validated = $this->checkValidToken($bearerToken);
        if ($bearerToken === false || $validated === false) {
            return response()->json(['error' => 'Not authorized.'], 403);
        }
        return $next($request);
    }

    private function getBearerTokenFromRequest($request)
    {
        $authStr = $request->header("authorization");
        if ($this->startsWith($authStr, 'Bearer ')) {
            $tokenStartIndex = 7;
            return substr($authStr, $tokenStartIndex);
        }
        return false;
    }

    function startsWith($string, $startString)
    {
        $len = strlen($startString);
        return (substr($string, 0, $len) === $startString);
    }

    private function checkValidToken($token)
    {
        if (empty($token)) {
            return false;
        }
        $t = ApiToken::reactToken()->token;
        if ($t != $token) {
            return false;
        }
        return true;
    }
}
