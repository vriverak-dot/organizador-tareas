<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $session = session();
        $usuarioNombre = null;

        if ($session->has('user_id')) {
            $db = \Config\Database::connect();
            $builder = $db->table('Users');
            $user = $builder->where('id', ($session->get('user_id')))->get()->getRowArray();

            if ($user) {
                $usuarioNombre = $user['nombre_completo'];
            }
        }

        $data = [
            'titulo'=>'Organizador de Tareas',
            'usuario'=> $usuarioNombre
            ];

        return view('Home/index', $data);
    }
}
