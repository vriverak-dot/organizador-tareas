<?php

namespace App\Controllers;

use App\Models\UserModel;

class UsersController extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in') && !session()->get('user_id')) {
            return redirect()->to(base_url('auth/login'))->with('error', 'Debes iniciar sesión primero.');
        }

        $userModel = new UserModel();
        $usuarios = $userModel->findAll();

        return view('Users/show', ['usuarios' => $usuarios]);
    }
}
