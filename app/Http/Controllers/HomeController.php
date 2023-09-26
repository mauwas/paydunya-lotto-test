<?php

namespace App\Http\Controllers;

use App\Services\HomeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $homeService;

    /**
     * Construct de HomeControlleur
     */
    public function __construct()
    {
        $this->homeService = new HomeService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home')->with($this->homeService->index());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function results(Request $request)
    {

        return view('results')->with($this->homeService->results($request->all()));
    }
}
