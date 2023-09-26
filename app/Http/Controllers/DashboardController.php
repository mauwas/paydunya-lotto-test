<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * Construct de DashboardControlleur
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard');
    }
}
