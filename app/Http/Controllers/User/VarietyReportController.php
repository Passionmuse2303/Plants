<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\VarietyReport;

class VarietyReportController extends Controller
{
    //OverView Page
    public function overviewPage()
    {
        $varietyReports_data = VarietyReport::all();
        return view('User.VarietyReport.overview', compact('varietyReports_data'));
    }
    //Detail Page
    public function detailPage($varietyReport_id)
    {
        $varietyReports_info = VarietyReport::where('id', $varietyReport_id)->first();
        return view('User.VarietyReport.detail', compact('varietyReports_info'));
    }
}