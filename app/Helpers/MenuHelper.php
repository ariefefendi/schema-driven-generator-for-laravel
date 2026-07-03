<?php

if (!function_exists('get_menu_by_role')) {

    function get_menu_by_role(string $role): array
    {
        $menus = config('menu');

        return filter_menu_recursive($menus, $role);
    }
}

if (!function_exists('filter_menu_recursive')) {

    function filter_menu_recursive(array $menus, string $role): array
    {
        $filtered = [];

        foreach ($menus as $menu) {

            // Skip jika role tidak diizinkan
            if (!in_array($role, $menu['roles'])) {
                continue;
            }

            // Jika ada children, filter juga
            if (isset($menu['children'])) {
                $menu['children'] = filter_menu_recursive($menu['children'], $role);

                // Jika setelah difilter children kosong, hapus parent jika perlu
                if (empty($menu['children'])) {
                    unset($menu['children']);
                }
            }

            $filtered[] = $menu;
        }

        return $filtered;
    }
}