<?php

if(! function_exists("isActiveRoute"))
{
    function isActiveRoute($route, $output = 'active')
    {
        if (Route::currentRouteName() == $route) {
            return $output;
        }

        return '';
    }
}

if(! function_exists("canActiveRoute"))
{
    function canActiveRoute($path, $output = 'active')
    {
        if(strpos(url()->current(), $path) !== false) {
            return $output;
        }

        return '';
    }
}

if(! function_exists("routeQuery"))
{
    function routeQuery($route)
    {
        $menu = 'false';
        if(Request::has('menu') && Request::get('menu') === 'true') {
            $menu = 'true';
        }

        $access_token = Request::has('access_token') ? Request::get('access_token') : '';

        $query = Request::all();
        $query['menu'] = $menu;
        $query['access_token'] = $access_token;

        return route($route).'?'.http_build_query($query);
    }
}