<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TareasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'titulo' => 'Organizador de tareas escolares',
                'descripcion' => 'Finalizar módulos del sistema web en CodeIgniter 4',
                'estado' => 'En proceso',
                'fecha_limite' => '2026-10-31',
            ]
        ];

        $this->db->table('Tareas')->insertBatch($data);
    }
}
