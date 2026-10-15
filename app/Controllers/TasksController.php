<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TasksController extends BaseController
{
    public function index()
    {
        if (!session()->get('logged0') && !session()->get('user_id')) {
            return redirect()->to(base_url('auth/login'))->with('error', 'Debes iniciar sesión para ver tus tareas.');
        }

        $userID = session()->get('user_id');

        $db=\Config\Database::connect();
        $builder=$db->table('Tareas');
        $builder->select('Tareas.*, Users.nombre_completo');
        $builder->join('Users', 'Users.id = Tareas.user_id');

        $builder->where('Tareas.user_id', $userID);

        $tareas=$builder->get()->getResultArray();

        $data = [
            'titulo'=>'Organizador de Tareas',
            'tareas'=>$tareas
        ];

        return view('Tasks/tasks', $data);
    }
}
