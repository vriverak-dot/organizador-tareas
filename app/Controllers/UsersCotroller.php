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

        $userId = session()->get('user_id') ?? session()->get('id') ?? session()->get('id_usuario');
        if ($userId != 1) {
            return redirect()->to(base_url('/'))->with('error', 'No tienes permisos para acceder a esta sección.');
        }

        $userModel = new UserModel();
        $usuarios = $userModel->findAll();

        return view('Users/index', ['usuarios' => $usuarios]);
    }

    public function show($id = null)
    {
        if (!session()->get('logged_in') && !session()->get('user_id')) {
            return redirect()->to(base_url('auth/login'))->with('error', 'Debes iniciar sesión primero.');
        }

        $userId = session()->get('user_id') ?? session()->get('id') ?? session()->get('id_usuario');
        if ($userId != 1) {
            return redirect()->to(base_url('/'))->with('error', 'No tienes permisos.');
        }

        $userModel = new UserModel();
        $usuario = $userModel->find($id);

        if (!$usuario) {
            return redirect()->to(base_url('users'))->with('error', 'Usuario no encontrado.');
        }

        return view('Users/show', ['usuario' => $usuario]);
    }
}
