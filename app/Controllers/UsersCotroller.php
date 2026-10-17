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
        
        $userId = session()->get('user_id') ?? session()->get('id');
        $rol = session()->get('rol') ?? session()->get('tipo');
        
        if ($userId != 1 && $rol !== 'admin' && $rol !== 'administrador') {
            return redirect()->to(base_url('/'))->with('error', 'No tienes permisos para acceder a esta sección.');
        }

        $userModel = new UserModel();
        $usuarios = $userModel->findAll();

        return view('Users/show', ['usuarios' => $usuarios]);
    }
}
