<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
      return view('auth/login');
    }

    public function loginProcess()
    {
        $session = session();
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if ($user) {
            if (password_verify($password, $user['password']) || $password === $user['password']) {
                $sessionData = [
                    'user_id'         => $user['id'],
                    'nombre_completo' => $user['nombre_completo'],
                    'usuario'         => $user['usuario'] ?? $user['nombre_completo'],
                    'email'           => $user['email'],
                    'logged_in'       => true,      
                ];
                $session->set($sessionData);
                $session->setFlashdata('success', 'Inicio de sesión exitoso.');
           
                return redirect()->to(base_url('tasks'));
            } else {
                $session->setFlashdata('error', 'Credenciales incorrectas.');
                return redirect()->back()->withInput();
            }
        } else {
            $session->setFlashdata('error', 'Usuario no encontrado.');
            return redirect()->back()->withInput();
        }
    }

    public function signup()
    {
        return view('auth/signup');
    }

    public function signupProcess()
    {
        $session = session();
        $userModel = new UserModel();

        $password = $this->request->getPost('password');
        $repeatPassword = $this->request->getPost('repeat_password');

        if ($password !== $repeatPassword) {
            $session->setFlashdata('error', 'Las contraseñas no coinciden.');
            return redirect()->back()->withInput();
        }

        $email = $this->request->getPost('email');
        $existingUser = $userModel->where('email', $email)->first();

        if ($existingUser) {
            $session->setFlashdata('error', 'El correo electrónico ya está registrado.');
            return redirect()->back()->withInput();
        }

        $data = [
            'nombre_completo' => $this->request->getPost('nombre'),
            'usuario'         => explode('@', $email)[0],
            'email'           => $email,
            'password'        => password_hash($password, PASSWORD_DEFAULT),
        ];

        $userModel->insert($data);
        $session->setFlashdata('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
        return redirect()->to(base_url('auth/login'));
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('auth/login'));
    }
}
