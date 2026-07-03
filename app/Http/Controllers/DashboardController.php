<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\RoleViewService;

class DashboardController extends Controller
{
    public function index()
    {
        // Redirect jika belum login
        if (!auth()->check()) { 
            return redirect()->route('login'); 
        }
        
        return RoleViewService::roleView(
            auth()->user()->role->name,
            'Dashboard'
        );
    }

    /**
     * API: Get Summary Dashboard
     * 
     * Endpoint:
     * GET /summary
     * 
     * Return:
     * {
     *   total_logs: int,
     *   avg_time: float,
     *   avg_distance: float,
     *   avg_nodes: int
     * }
     */
    public function getSummary()
    {
        $data = DB::table('calculation_logs')
            ->selectRaw("
                COUNT(id) as total_logs,
                ROUND(AVG(execution_time), 4) as avg_time,
                ROUND(AVG(total_distance), 2) as avg_distance,
                ROUND(AVG(total_nodes_processed)) as avg_nodes
            ")
            ->first();

        return response()->json([
            'status' => true,
            'message' => 'Dashboard summary fetched successfully',
            'data' => $data
        ]);
    }
    
    public function getExecutionTimeChart(Request $request)
    {
        $filter = $request->filter ?? 'week';
    
        $where = "";
    
        if ($filter == 'week') {
            $where = "WHERE YEARWEEK(cl.created_at, 1) = YEARWEEK(CURDATE(), 1)";
        } elseif ($filter == 'month') {
            $where = "WHERE MONTH(cl.created_at) = MONTH(CURDATE())
                      AND YEAR(cl.created_at) = YEAR(CURDATE())";
        } elseif ($filter == 'year') {
            $where = "WHERE YEAR(cl.created_at) = YEAR(CURDATE())";
        }
    
        $data = DB::select("
            SELECT 
                hours.hour,
                COALESCE(ROUND(AVG(cl.execution_time), 4), 0) as avg_execution_time
            FROM (
                SELECT 0 as hour UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3
                UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7
                UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11
                UNION ALL SELECT 12 UNION ALL SELECT 13 UNION ALL SELECT 14 UNION ALL SELECT 15
                UNION ALL SELECT 16 UNION ALL SELECT 17 UNION ALL SELECT 18 UNION ALL SELECT 19
                UNION ALL SELECT 20 UNION ALL SELECT 21 UNION ALL SELECT 22 UNION ALL SELECT 23
            ) hours
            LEFT JOIN calculation_logs cl 
                ON HOUR(cl.created_at) = hours.hour
                $where
            GROUP BY hours.hour
            ORDER BY hours.hour
        ");
    
        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }
    
    public function getDistanceNodeChart()
    {
        $data = DB::table('calculation_logs')
            ->selectRaw("
                DATE(created_at) as date,
                SUM(total_distance) as total_distance,
                SUM(total_nodes_processed) as total_nodes
            ")
            ->groupByRaw("DATE(created_at)")
            ->orderByRaw("DATE(created_at) ASC")
            ->limit(7)
            ->get();
    
        return response()->json([
            'status' => true,
            'labels' => $data->pluck('date'),
            'distance' => $data->pluck('total_distance'),
            'nodes' => $data->pluck('total_nodes')
        ]);
    }
    
    
}