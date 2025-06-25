<?php

namespace App\Http\Controllers;

use App\Services\ReportService;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->from ?? now()->startOfMonth();
        $to = $request->to ?? now()->endOfMonth();

        $reportService = new ReportService();
        $report = $reportService->generate($from, $to);

        return view('reports.index', array_merge($report, compact('from', 'to')));
    }

}
