<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TasksController extends BaseController
{
    public function index()
    {
        $db=\Config\Database::connect();
        $builder=$db->table('Tareas');
        $builder->select('Tareas.*, Users.nombre_completo');
        $builder->join('Users', 'Users.id = Tareas.user_id');
        $tareas=$builder->get()->getResultArray();

        $data = [
            'titulo'=>'Organizador de Tareas',
            'tareas'=>$tareas
            ];

        return view('tasks', $data);
    }
}
