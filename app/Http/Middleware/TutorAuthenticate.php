<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class TutorAuthenticate extends Middleware
{

    protected function authenticate($request, array $guards)
    {

        if ($this->auth->guard('tutor')->check()) {
            return $this->auth->shouldUse('tutor');
        }
        $this->unauthenticated($request, ['tutor']);
    }


    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('tutor.login');
        }
    }
}
