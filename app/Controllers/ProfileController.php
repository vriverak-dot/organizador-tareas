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

    public function changePasswordForm()
    {
        if (!session()->get('logged_in') && !session()->get('user_id')) {
            return redirect()->to(base_url('auth/login'));
        }
        return view('Profile/change_password');
    }

    public function updatePassword()
    {
        if (!session()->get('logged_in') && !session()->get('user_id')) {
            return redirect()->to(base_url('auth/login'));
        }

        $currentPassword = $this->request->getPost('current_password');
        $newPassword     = $this->request->getPost('new_password');
        $repeatPassword  = $this->request->getPost('repeat_password');

        if ($newPassword !== $repeatPassword) {
            return redirect()->back()->with('error', 'Las nuevas contraseñas no coinciden.');
        }

        $model = new \App\Models\UserModel();
        $userId = session()->get('user_id') ?? session()->get('id') ?? session()->get('id_usuario');
        $user = $model->find($userId);

        $storedPassword = $user['password'] ?? $user['contrasena'] ?? '';

        if (!password_verify($currentPassword, $storedPassword) && $currentPassword !== $storedPassword) {
            return redirect()->back()->with('error', 'La contraseña actual es incorrecta.');
        }

        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $model->update($userId, ['password' => $hashedPassword]);

        return redirect()->to(base_url('profile'))->with('success', 'Contraseña actualizada exitosamente.');
    }

    public function changeImageForm()
    {
        if (!session()->get('logged_in') && !session()->get('user_id')) {
            return redirect()->to(base_url('auth/login'));
        }
        return view('Profile/change_image');
    }

    public function uploadImage()
    {
        if (!session()->get('logged_in') && !session()->get('user_id')) {
            return redirect()->to(base_url('auth/login'));
        }

        $file = $this->request->getFile('profile_image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads', $newName);

            $model = new \App\Models\UserModel();
            $userId = session()->get('user_id') ?? session()->get('id') ?? session()->get('id_usuario');
            $model->update($userId, ['profile_image' => $newName]);

            return redirect()->to(base_url('profile'))->with('success', 'Imagen de perfil actualizada.');
        }

        return redirect()->back()->with('error', 'Selecciona una imagen válida.');
    }

    public function deleteImage()
    {
        if (!session()->get('logged_in') && !session()->get('user_id')) {
            return redirect()->to(base_url('auth/login'));
        }

        $model = new \App\Models\UserModel();
        $userId = session()->get('user_id') ?? session()->get('id') ?? session()->get('id_usuario');
        $user = $model->find($userId);

        if (!empty($user['profile_image'])) {
            $filePath = FCPATH . 'uploads/' . $user['profile_image'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $model->update($userId, ['profile_image' => null]);
        }

        return redirect()->to(base_url('profile'))->with('success', 'Imagen de perfil eliminada.');
    }

    public function deleteImageConfirm()
    {
        $userId = session()->get('user_id') ?? session()->get('id');
        $model = new \App\Models\UserModel();
        
        $user = $model->find($userId);
    
        if ($user && !empty($user['profile_image'])) {
            $imagePath = ROOTPATH . 'public/uploads/' . $user['profile_image'];

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
    
            $model->update($userId, ['profile_image' => null]);
        }
    
        return redirect()->to(base_url('profile'))->with('success', 'Imagen de perfil eliminada correctamente.');
     }
}
