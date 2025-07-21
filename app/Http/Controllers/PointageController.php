<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pointage;

class PointageController extends Controller
{
    //
    public function index()
    {
        $pointages = Pointage::with('agent')->get();
        return view('pointages.index', compact('pointages'));
    }
}
