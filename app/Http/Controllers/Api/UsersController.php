<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Services\RoleViewService;
// use Illuminate\Support\Carbon;


class UsersController extends Controller
{
	public function index()
	{
	    // Kalau sudah login, redirect sesuai role
	    // auth()->check()  = true
        if (!auth()->check()) { 
            return redirect()->route('login'); 
        }
        
        return RoleViewService::roleView(
            auth()->user()->role->name,
            'UsersView'
        );
	}
	
    /**
     * Datatable Server Side
     */
    public function getDataAll(Request $request)
    {
        // $allowedFilter = ['role_id', 'name', 'email', 'password', 'phone'];
    
        // $filterValue = $request->input('filtervalue');
        $filterText  = $request->input('filtertext');
        $start       = $request->input('start', 0);
        $length      = $request->input('length', 10);
    
        // if (!in_array($filterValue, $allowedFilter)) {
        //     return response()->json([
        //         'RecordsTotal'    => 0,
        //         'RecordsFiltered' => 0,
        //         'Data'            => []
        //     ]);
        // }
    
        // Total semua data TANPA filter
        $recordsTotal = Users::count();
        // Query utama
        $query = Users::with('role:id,name')
            ->select('id', 'name', 'email', 'phone', 'role_id','updated_at'); 


        // GLOBAL SEARCH
        if (!empty($filterText)) {
            $query->where(function ($q) use ($filterText) {
                $q->where('name','LIKE',"%{$filterText}%")
                  ->orWhere('email','LIKE',"%{$filterText}%")
                  ->orWhere('phone','LIKE',"%{$filterText}%")
                  ->orWhere('updated_at','LIKE',"%{$filterText}%")
                  ->orWhereHas('role', function($role) use ($filterText){
                        $role->where('name','LIKE',"%{$filterText}%");
                  });
            });
        }
    
        // // Apply filter jika ada
        // if ($filterText && in_array($filterValue, $allowedFilter)) {
        //     $query->where($filterValue, 'LIKE', "%{$filterText}%");
        // }

        // Total setelah filter
        $recordsFiltered = $query->count();
    
        // Ambil data dengan pagination
        $data = $query->orderBy('id','desc')
            ->skip($start)
            ->take($length)
            ->get();
        
        $data->transform(function ($user) {
                $user->updated_at_format = optional($user->updated_at)->format('Y-m-d H:i');
            return $user;
        });
        
        return response()->json([
            'RecordsTotal'    => $recordsTotal,
            'RecordsFiltered' => $recordsFiltered,
            'Data'            => $data
        ]);
    }



    // public function getDataAll(Request $request)
    // {
    //     $filterText = $request->input('filtertext');
    //     $start      = $request->input('start', 0);
    //     $length     = $request->input('length', 10);
    
    //     // Total semua data
    //     $recordsTotal = Users::count();
    
    //     $query = Users::with('role:id,name')
    //         ->select('id','name','email','phone','role_id','updated_at');
    
    //     // GLOBAL SEARCH
    //     if (!empty($filterText)) {
    //         $query->where(function ($q) use ($filterText) {
    //             $q->where('name','LIKE',"%{$filterText}%")
    //               ->orWhere('email','LIKE',"%{$filterText}%")
    //               ->orWhere('phone','LIKE',"%{$filterText}%")
    //               ->orWhereHas('role', function($role) use ($filterText){
    //                     $role->where('name','LIKE',"%{$filterText}%");
    //               });
    //         });
    //     }
    
    //     // Total setelah filter
    //     $recordsFiltered = $query->count();
    
    //     $data = $query->orderBy('id','desc')
    //         ->skip($start)
    //         ->take($length)
    //         ->get();
    
    //     $data->transform(function ($user) {
    //         $user->role_name = optional($user->role)->name;
    //         $user->updated_at_format = optional($user->updated_at)->format('Y-m-d H:i');
    //         return $user;
    //     });
    
    //     return response()->json([
    //         'RecordsTotal'    => $recordsTotal,
    //         'RecordsFiltered' => $recordsFiltered,
    //         'Data'            => $data
    //     ]);
    // }
    





    /**
     * Get single data
     */
    public function getDataSelect(Request $request)
    {
        return Users::with('role:id,name')
            ->select('id','name','email','phone','role_id')
            ->findOrFail($request->id);
    }

    /**
     * Insert
     */
    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'role_id' => 'required',
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required',
                'phone' => 'nullable']);

        if ($validator->fails()) {
            return response()->json([
                'result' => 'VALIDATION_ERROR',
                'errors' => $validator->errors()
            ]);
        }

        Users::create($request->all());

        return response()->json(['result' => 'OK']);
    }

    /**
     * Update
     */
    public function update(Request $request)
    {
        $user = Users::findOrFail($request->id);
    
        $data = $request->only([
            'name',
            'email',
            'phone',
            'role_id'
        ]);
    
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
    
        $user->update($data);
    
        return response()->json([
            'result' => 'OK'
        ]);
    }

    /**
     * Delete
     */
    public function destroy(Request $request)
    {
        Users::where('id', $request->id)->delete();
        return response()->json(['result' => 'OK']);
    }
    
    
    
    public function getUpdatedAtFormattedAttribute()
    {
        return \Carbon\Carbon::parse($this->updated_at)->format('Y-m-d H:i');
    }
}
