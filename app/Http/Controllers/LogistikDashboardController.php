<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanBarang;
use Carbon\Carbon;

class LogistikDashboardController extends Controller
{
    public function index()
    {
        // Get statistics for the dashboard
        $pendingRequests = PengajuanBarang::where('status', 'pending_logistic_approval')->count();
        $approvedRequests = PengajuanBarang::where('status', 'approved')->count();
        $itemReady = PengajuanBarang::where('status', 'item_ready')->count();
        $rejectedRequests = PengajuanBarang::where('rejected_by', 'logistik')->count();
        
        // Recent activities (last 10 requests)
        $recentActivities = PengajuanBarang::whereIn('status', [
            'pending_logistic_approval', 
            'pending_superadmin_approval', 
            'approved', 
            'rejected', 
            'item_ready', 
            'item_not_ready'
        ])
        ->orderBy('updated_at', 'desc')
        ->limit(10)
        ->get();
        
        // Monthly statistics
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        
        $monthlyTotal = PengajuanBarang::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->count();
            
        $monthlyTarget = 100; // Set target or get from settings
        $monthlyProgress = $monthlyTotal > 0 ? min(($monthlyTotal / $monthlyTarget) * 100, 100) : 0;
        
        return view('logistik.dashboard', compact(
            'pendingRequests',
            'approvedRequests', 
            'itemReady',
            'rejectedRequests',
            'recentActivities',
            'monthlyTotal',
            'monthlyTarget',
            'monthlyProgress'
        ));
    }
}