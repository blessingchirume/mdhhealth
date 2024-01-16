<?php

namespace App\Http\Middleware;

use App\Models\Menu as ModelsMenu;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class Menu
{
    public function handle(Request $request, Closure $next)
    {
        // dd(2);
        $menuConfig = ModelsMenu::tree()->get()->toTree();

        Config::set('menu', $menuConfig);
        
        return $next($request);
    }
}
