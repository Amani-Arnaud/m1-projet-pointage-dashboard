<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Pointage;
use App\Models\Absence;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAgents = Agent::count();
        $presentToday = Pointage::whereDate('date_pointage', today())->count();
        $absentCount = Absence::whereDate('date_debut', today())->count();

        $absentRate = $totalAgents > 0 ? ($absentCount / $totalAgents) * 100 : 0;

        return view('dashboard.index', compact('totalAgents', 'presentToday', 'absentRate'));
    }
}
