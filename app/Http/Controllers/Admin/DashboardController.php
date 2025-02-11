<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Feedback;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        $imonths_pending = [];
        $imonths_completed = [];

        $inquiries = Inquiry::select(DB::raw("COUNT(*) as count, MONTH(created_at) as month, status"))
            ->groupBy(DB::raw("MONTH(created_at), status"))
            ->get();

        for ($i = 1; $i <= 12; $i++) {
            $imonths_pending[$i] = $inquiries->where('month', $i)->where('status', 0)->sum('count') ?? 0;
            $imonths_completed[$i] = $inquiries->where('month', $i)->where('status', 1)->sum('count') ?? 0;
        }

        $data[] = ['pending' => array_values($imonths_pending), 'completed' => array_values($imonths_completed)];
        $data = json_encode($data);

        return view('admin.dashboard', compact('data'));
    }
}
