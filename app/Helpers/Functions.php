<?php
if (!function_exists('shopId')) {
    function shopId(?int $shop_id = null): ?int
    {
        return $shop_id ?? auth()->user()->shop_id ?? null;
    }
}

if (!function_exists('checkRoute')) {
    function checkRoute(string $route, bool|string $returned = true): bool|string
    {
        $route = $route ? '.' . trim($route, '.') : '';
        return request()->routeIs(env('ROUTE_PREFIX') . "{$route}") ? $returned : false;
    }
}

if (!function_exists('routeHelper')) {
    function routeHelper(string|null $route, object|array|string|int|null $options = null): string
    {
        if (!$route || $route == '#') return '';
        return route(env('ROUTE_PREFIX') . ".$route", $options);
    }
}

if (!function_exists('getModule')) {
    function getModule(bool $singular = false): string
    {
        try {
            return request()->route()->getController()->getModule($singular);
        } catch (Exception $e) {
            dd($e);
            return env('ROUTE_PREFIX');
        }
    }
}
