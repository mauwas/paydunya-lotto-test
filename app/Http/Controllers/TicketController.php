<?php

namespace App\Http\Controllers;

use App\Services\UserService;

class TicketController extends Controller
{
    protected $userService;

    public function __construct()
    {
        $this->middleware('auth');
        $this->userService = new UserService();
    }

    /**
     * Page / Affichage de la liste des tockets de l'utilisateur connecté
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.tickets-list')->with([
            'tickets' => $this->userService->getListTicketsByUser(auth()->user()->id),
        ]);
    }
}
