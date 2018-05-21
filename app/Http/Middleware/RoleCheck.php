<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\Role;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class RoleCheck {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

      

        if (!Role::can('add_post')) {
            return Response::make(View::make('errors.404', ['page_404' => true]), 404);
        }

        return $next($request);
    }

}
