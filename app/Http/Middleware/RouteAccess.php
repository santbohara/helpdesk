<?php

namespace App\Http\Middleware;

use App\Models\Admin\Menu;
use App\Models\Admin\Role;
use App\Models\Admin\RoleHasMenuAccess;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RouteAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Admin username will have full access dispite of permission
        if (auth()->user()->username == 'admin') {
            return $next($request);
        }

        // Else get user role permissions
        $role = Role::findOrFail(auth()->user()->role_id);

        //Get submenu route i.e. segment 2
        $url_segment_1 = request()->segment(1);
        $url_segment_2 = request()->segment(2);

        $url = $url_segment_1.'/'.$url_segment_2;

        //get submenu id as per URL segment
        $menu_id = Menu::where('route_prefix', $url)->value('id');

        //check access
        $access = RoleHasMenuAccess::where('role_id', $role->id)
            ->where('menu_id', $menu_id)
            ->first();

        // if access is found process next
        if ($access) {
            return $next($request);
        }

        //if no access then reject authorization
        return abort(403);
    }
}
