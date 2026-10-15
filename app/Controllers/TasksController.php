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
    
    public function edit($id)
    {
        if (!session()->get('logged_in') && !session()->get('user_id')) {
            return redirect()->to(base_url('auth/login'));
        }

        $tareaModel = new \App\Models\TareaModel();
        $tarea = $tareaModel->where('id', $id)
                            ->where('user_id', session()->get('user_id'))
                            ->first();

        if (!$tarea) {
            return redirect()->to(base_url('tasks'))->with('error', 'Tarea no encontrada.');
        }

        return view('Tasks/edit', ['titulo' => 'Editar Tarea', 'tarea' => $tarea]);
    }

    public function update($id)
    {
        if (!session()->get('logged_in') && !session()->get('user_id')) {
            return redirect()->to(base_url('auth/login'));
        }

        $rules = [
            'titulo'       => 'required|min_length[3]|max_length[255]',
            'descripcion'  => 'required',
            'estado'       => 'required',
            'fecha_limite' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $tareaModel = new \App\Models\TareaModel();
        
        // Verificar que la tarea pertenezca al usuario actual
        $tarea = $tareaModel->where('id', $id)->where('user_id', session()->get('user_id'))->first();
        if (!$tarea) {
            return redirect()->to(base_url('tasks'))->with('error', 'No tienes permiso para modificar esta tarea.');
        }

        $tareaModel->update($id, [
            'titulo'       => $this->request->getPost('titulo'),
            'descripcion'  => $this->request->getPost('descripcion'),
            'estado'       => $this->request->getPost('estado'),
            'fecha_limite' => $this->request->getPost('fecha_limite'),
        ]);

        return redirect()->to(base_url('tasks'))->with('success', '¡Tarea actualizada exitosamente!');
    }

    public function delete($id)
    {
        if (!session()->get('logged_in') && !session()->get('user_id')) {
            return redirect()->to(base_url('auth/login'));
        }

        $tareaModel = new \App\Models\TareaModel();
        
        // Verificar que la tarea pertenezca al usuario actual
        $tarea = $tareaModel->where('id', $id)->where('user_id', session()->get('user_id'))->first();
        if (!$tarea) {
            return redirect()->to(base_url('tasks'))->with('error', 'No tienes permiso para eliminar esta tarea.');
        }

        $tareaModel->delete($id);

        return redirect()->to(base_url('tasks'))->with('success', '¡Tarea eliminada exitosamente!');
    }
}
