<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AuthService
{
    public function register(array $userData)
    {
        $userData['password'] = Hash::make($userData['password']);
        DB::beginTransaction();
        try {
            $user = User::create($userData);
            $user->account()->create(['amount' => 0.00, 'is_active' => true]);
            DB::commit(); // Confirmer la transaction si tout s'est bien passé

            return $user;
        } catch (\Exception $e) {
            DB::rollback(); // Annuler la transaction en cas d'erreur
            Log::error('Register User : Erreur base de données');
        }

        return false;
    }

    public function login(array $credentials)
    {
        if (auth()->attempt($credentials)) {
            return true;
        }

        return false;
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
    }
}
