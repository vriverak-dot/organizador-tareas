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
                'email'           => $session->get('email'),
                'username'        => $session->get('username')
            ];
        }

        return view('Profile/show', ['usuario' => $usuario]);
    }

    private function checkAuth()
    {
        if (!session()->get('logged_in') && !session()->get('user_id')) {
            return redirect()->to(base_url('auth/login'))->with('error', 'Debes iniciar sesión.');
        }
        return null;
    }

    public function index()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $model = new UserModel();
        $userId = session()->get('user_id') ?? session()->get('id');
        $data['user'] = $model->find($userId);

        return view('Profile/show', $data);
    }

    public function authenticate()
    {
        if ($redirect = $this->checkAuth()) return $redirect;
        return view('Profile/authenticate');
    }

    public function verifyPassword()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $password = $this->request->getPost('password');
        $model = new UserModel();

        $userId = session()->get('user_id') ?? session()->get('id') ?? session()->get('id_usuario');
        $user = $model->find($userId);

        if ($user) {
            $storedPassword = $user['password'] ?? $user['contrasena'] ?? '';

        if (password_verify($password, $storedPassword) || $password === $storedPassword) {
            session()->setFlashdata('password_verified', true);
            return redirect()->to(base_url('profile/edit-form'));
            }
        }

        return redirect()->back()->with('error', 'Contraseña incorrecta.');
    }

    public function editForm()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        if (!session()->getFlashdata('password_verified')) {
            return redirect()->to(base_url('profile/edit'))->with('error', 'Debes confirmar tu contraseña primero.');
        }

        $model = new UserModel();
        $userId = session()->get('user_id') ?? session()->get('id');
        $data['user'] = $model->find($userId);

        return view('Profile/edit', $data);
    }

    public function update()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $userId = session()->get('user_id') ?? session()->get('id');
        $model = new UserModel();

        $data = [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email')
        ];

        $model->update($userId, $data);
        return redirect()->to(base_url('profile'))->with('success', 'Perfil actualizado con éxito.');
    }
}
