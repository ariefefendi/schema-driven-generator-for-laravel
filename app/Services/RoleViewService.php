<?php

namespace App\Services;

class RoleViewService
{
    protected static array $allowedRoles = [
        'admin',
        'operator',
        'driver',
        'user'
    ];

    public static function roleView($role, $viewName, $data = [])
    {
        $role = strtolower($role);

        if (!in_array($role, self::$allowedRoles)) {
            abort(403);
        }

        return view($role . '.' . $viewName, $data);
    }
    
}
