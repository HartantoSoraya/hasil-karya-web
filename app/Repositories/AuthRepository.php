<?php

namespace App\Repositories;

use App\Interfaces\AuthRepositoryInterface;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class AuthRepository implements AuthRepositoryInterface
{
    public function login(array $data)
    {
        $email = $data['email'];
        $password = $data['password'];

        if (auth()->attempt(['email' => $email, 'password' => $password])) {
            if (auth()->user()->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            }
        }

        Swal::toast('Email atau password salah', 'error')->timerProgressBar();

        return redirect()->back();
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }

    public function user(array $data)
    {
        return auth()->user();
    }
}
