<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Buses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Validator;
use App\Services\RoleViewService;

class BusesController extends Controller
{
	public function index()
	{ 
		if (!auth()->check()) { 
            return redirect()->route('login'); 
        }
        
        return RoleViewService::roleView(
            auth()->user()->role->name,
            'BusesView'
        );
	}
	
    /**
     * Datatable Server Side
     */
    public function getDataAll(Request $request)
    {
        $allowedFilter = ['bus_code', 'plate_number', 'capacity', 'status']; // dari schema

        $filterValue = $request->input('filtervalue');
        $filterText  = $request->input('filtertext');
        $start       = $request->input('start', 0);
        $length      = $request->input('length', 10);

        if (!in_array($filterValue, $allowedFilter)) {
            return response()->json([
                'RecordsTotal' => 0,
                'RecordsFiltered' => 0,
                'Data' => []
            ]);
        }

        // Total semua data TANPA filter
        $recordsTotal = Buses::count();
        
        // Query utama
        // contoh untuk relasi : Users::with('role:id,name')
        $query = Buses::query();

        // Apply filter jika ada
        if ($filterText && in_array($filterValue, $allowedFilter)) {
            $query->where($filterValue, 'LIKE', "%{$filterText}%");
        }
        
        // Total setelah filter
        $recordsFiltered = $query->count();
 
        $data = $query->orderBy('id', 'desc')
            ->skip($start)
            ->take($length)
            ->get();

        return response()->json([
            'RecordsTotal'    => $recordsTotal,
            'RecordsFiltered' => $recordsFiltered,
            'Data'            => $data
        ]);
    }

    /**
     * Get single data
     */
    public function getDataSelect(Request $request)
    {
        return Buses::findOrFail($request->id);
    }

    /**
     * Insert
     */
    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), ['bus_code' => 'required|unique:buses',
                'plate_number' => 'required|unique:buses',
                'capacity' => 'nullable',
                'status' => 'required']);

        if ($validator->fails()) {
            return response()->json([
                'result' => 'VALIDATION_ERROR',
                'errors' => $validator->errors()
            ]);
        }

        Buses::create($request->all());

        return response()->json(['result' => 'OK']);
    }

    /**
     * Update
     */
    public function update(Request $request)
    {
        $data = Buses::findOrFail($request->id);
        $data->update($request->all());

        return response()->json(['result' => 'OK']);
    }

    /**
     * Delete
     */
    public function destroy(Request $request)
    {
        Buses::where('id', $request->id)->delete();
        return response()->json(['result' => 'OK']);
    }
}
