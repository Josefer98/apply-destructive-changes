<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//spati
use Spatie\Permission\Models\Permission;
class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos=[
            //roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //temas
            'ver-temas',
            'crear-temas',
            'editar-temas',
            'borrar-temas',
        ];
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
