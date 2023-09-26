<?php

namespace App\Http\Controllers;

use App\Http\Requests\withdrawalRequest;
use App\Services\AccountService;
use App\Services\UserService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected $userService;

    protected $accountService;

    public function __construct()
    {
        $this->middleware('auth');
        $this->userService = new UserService();
        $this->accountService = new AccountService();
    }

    /**
     * Page / Affichage de la liste des transactions de l'utilisateur connecté
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.transactions-list')->with([
            'transactions' => $this->userService->getListTransactionsByUser(auth()->user()->id),
            'account' => $this->userService->getAccountUser(auth()->user()->id),
        ]);
    }

    /**
     * Page / Formulaire de demande de remboursement
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.withdrawal')->with([
            'account' => $this->userService->getAccountUser(auth()->user()->id),
        ]);
    }

    /**
     * Traitement / processus de demande de remboursement
     *
     * @return void
     */
    public function store(withdrawalRequest $request)
    {
        if ($this->accountService->withdrawal($request->all(), auth()->user())) {
            return redirect('withdrawal')->withSuccess('Votre compte Paydunya a été crédité avec succès.');
        }
        return back()->withError('Oups ! Une erreur est survenue lors du remboursement, veuillez réessayer plus tard');
    }
}
