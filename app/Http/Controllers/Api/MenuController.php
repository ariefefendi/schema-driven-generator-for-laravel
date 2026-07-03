<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RoleViewService;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        // Cek apakah user sudah login
        if (!auth()->check()) {
            return response()->json([
                'status'  => false,
                'message' => 'Unauthorized. Please login first.'
            ], 401);
        }
    
        // Ambil role user yang sedang login
        $role = auth()->user()->role->name;

        // Ambil menu berdasarkan role
        $menus = get_menu_by_role($role);

        return response()->json([
            'status' => true,
            'message' => 'Menu loaded successfully',
            'data' => [
                'user' => [
                    'id' => auth()->user()->id,
                    'name' => auth()->user()->name,
                    'role' => $role
                ],
                'menus' => $menus
            ]
        ], 200);
    }
}