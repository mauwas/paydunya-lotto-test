<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    private $authService;

    /**
     * Construct de AuthControlleur
     */
    public function __construct(AuthService $authService)
    {
        $this->middleware('auth')->only('logout');
        $this->middleware('guest')->except('logout');
        $this->authService = $authService;
    }

    /**
     * Formulaire de connexion
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.auth.login');
    }

    /**
     * Formulaire de création de compte
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function register()
    {
        return view('admin.auth.register');
    }

    /**
     * Connexion d'un utilisateur/jour et redirection sur le tableau de bord
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(LoginRequest $request)
    {
        if ($this->authService->login($request->only('email', 'password'))) {
            // Rediriger vers la page d'accueil après la connexion réussie
            return redirect()->intended('dashboard')
                ->withSuccess('Vous vous êtes connecté avec succès');
        }

        return redirect('login')->withError("Oups ! Vous avez saisi des informations d'identification invalides");
    }

    /**
     * Création de compte utilisateur/jour
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postRegister(RegisterRequest $request)
    {
        if ($this->authService->register($request->validated())) {
            return redirect('dashboard')->withSuccess('Super ! Vous vous êtes connecté avec succès');
        }

        return back()->withError('Oups ! Une erreur est survenue, veuillez réessayer plus tard');
    }

    /**
     * Déconnexion d'un utilisateur/jour
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        $this->authService->logout();

        return redirect('login');
    }
}
