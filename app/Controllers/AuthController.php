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

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('auth/login'));
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
            'nombre_completo' => $this->request->getPost('nombre_completo'),
            'usuario'=> explode('@', $email)[0],
            'email'=> $email,
            'password'=> password_hash($password, PASSWORD_DEFAULT),
        ];

        $userModel->insert($data);

        $emailService = \Config\Services::email();
        $emailService->setTo($email);
        $emailService->setSubject('Registro exitoso - Organizador de Tareas');
        $emailService->setMessage('¡Hola ' . $data['nombre_completo'] . '! Tu cuenta ha sido creada exitosamente. Ya puedes iniciar sesión.');
        @$emailService->send();

        $session->setFlashdata('success', '¡Registro exitoso! Por favor inicia sesión.');
        return redirect()->to(base_url('auth/login'));
    }

    public function forgotPassword()
    {
        return view('auth/forgot_password');
    }
    public function forgotPasswordProcess()
    {
        $email = $this->request->getPost('email');
        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'El correo no está registrado.');
        }

        $token = md5(uniqid(rand(), true));

        $emailService = \Config\Services::email();
        $emailService->setTo($email);
        $emailService->setSubject('Recuperación de Contraseña');
        $resetLink = base_url('auth/reset-password/' . $token);
        $emailService->setMessage('Haz clic en el enlace para restablecer tu contraseña: <a href="' . $resetLink . '">' . $resetLink . '</a>');
        @$emailService->send();

        return redirect()->to(base_url('auth/login'))->with('success', 'Se han enviado las instrucciones a tu correo electrónico.');
    }

    public function resetPassword($token)
    {
        $password = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        if ($password !== $confirmPassword) {
            return redirect()->back()->with('error', 'Las contraseñas no coinciden.');
        }

        return redirect()->to(base_url('auth/login'))->with('success', 'Contraseña restablecida exitosamente. Inicia sesión.');
    }
}

    
        
