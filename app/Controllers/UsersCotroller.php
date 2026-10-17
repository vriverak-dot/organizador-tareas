<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UsersController extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in') && !session()->get('user_id')) {
            return redirect()->to(base_url('auth/login'))->with('error', 'Debes iniciar sesión primero.');
        }

        $userId = session()->get('user_id') ?? session()->get('id') ?? session()->get('id_usuario');
        if ((int)$userId !== 1) {
            return redirect()->to(base_url('/'))->with('error', 'No tienes permisos para acceder a esta sección.');
        }

        $model = new UserModel();
        $data['users'] = $model->findAll();

        return view('users/index', $data);
    }

    public function show($id = null)
    {
        if (!session()->get('logged_in') && !session()->get('user_id')) {
            return redirect()->to(base_url('auth/login'))->with('error', 'Debes iniciar sesión primero.');
        }

        $userId = session()->get('user_id') ?? session()->get('id') ?? session()->get('id_usuario');
        if ((int)$userId !== 1) {
            return redirect()->to(base_url('/'))->with('error', 'No tienes permisos.');
        }

        if ($id === null) {
            return redirect()->to(base_url('users'));
        }

        $model = new UserModel();
        $data['user'] = $model->find($id);

        if (empty($data['user'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Usuario no encontrado: ' . $id);
        }

        return view('users/show', $data);
    }
}
