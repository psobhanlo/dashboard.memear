<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class PanelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
         return view('dashboard.dashboard.index');
    }

}
