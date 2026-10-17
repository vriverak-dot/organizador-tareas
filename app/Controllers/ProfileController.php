<?php

namespace App\Controllers;

use App\Models\UserModel;

class ProfileController extends BaseController
{
    public function show()
    {
        $session = session();
        $userId = $session->get('user_id') 
               ?? $session->get('id') 
               ?? $session->get('id_usuario') 
               ?? $session->get('usuario_id');

        if (!$userId && !$session->get('logged_in')) {
            return redirect()->to(base_url('auth/login'))->with('error', 'Debes iniciar sesión primero.');
        }

        $usuario = null;
        if (class_exists('App\Models\UserModel')) {
            $userModel = new UserModel();
            $usuario = $userModel->find($userId);
        }

        if (!$usuario) {
            $usuario = [
                'id'              => $userId ?? 1,
                'nombre_completo' => $session->get('nombre_completo') ?? $session->get('nombre') ?? $session->get('usuario') ?? 'Carlos Eduardo Mendoza',
                'email'           => $session->get('email') ?? 'carlos@example.com',
                'username'        => $session->get('username') ?? 'carlos'
            ];
        }

        return view('Profile/show', ['usuario' => $usuario]);
    }
}
