<?php

use Illuminate\Database\Seeder;

class permisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //Users
        DB::table('permisos')->insert([
            'nombre'          => 'Navegar usuarios',
            'slug'          => 'users.index',
            'descripcion'   => 'Lista y navega todos los usuarios del sistema',
        ]);
        DB::table('permisos')->insert([
            'nombre'          => 'Ver detalle de usuario',
            'slug'          => 'users.show',
            'descripcion'   => 'Ve en detalle cada usuario del sistema',            
        ]);
        
        DB::table('permisos')->insert([
            'nombre'          => 'Edición de usuarios',
            'slug'          => 'users.edit',
            'descripcion'   => 'Podría editar un usuario del sistema',
        ]);
        
        DB::table('permisos')->insert([
            'nombre'          => 'Eliminar usuario',
            'slug'          => 'users.destroy',
            'descripcion'   => 'Podría eliminar cualquier usuario del sistema',      
        ]);
        
        //Roles
        DB::table('permisos')->insert([
            'nombre'          => 'Navegar roles',
            'slug'          => 'roles.index',
            'descripcion'   => 'Lista y navega todos los roles del sistema',
        ]);
        DB::table('permisos')->insert([
            'nombre'          => 'Ver detalle de un rol',
            'slug'          => 'roles.show',
            'descripcion'   => 'Ve en detalle cada rol del sistema',            
        ]);
        
        DB::table('permisos')->insert([
            'nombre'          => 'Creación de roles',
            'slug'          => 'roles.insert',
            'descripcion'   => 'Podría crear nuevos roles en el sistema',
        ]);
        
        DB::table('permisos')->insert([
            'nombre'          => 'Edición de roles',
            'slug'          => 'roles.edit',
            'descripcion'   => 'Podría editar cualquier dato de un rol del sistema',
        ]);
        
        DB::table('permisos')->insert([
            'nombre'          => 'Eliminar roles',
            'slug'          => 'roles.destroy',
            'descripcion'   => 'Podría eliminar cualquier rol del sistema',      
        ]);

        //Roles
        DB::table('permisos')->insert([
            'nombre'          => 'Navegar productos',
            'slug'          => 'products.index',
            'descripcion'   => 'Lista y navega todos los productos del sistema',
        ]);
        DB::table('permisos')->insert([
            'nombre'          => 'Ver detalle de un producto',
            'slug'          => 'products.show',
            'descripcion'   => 'Ve en detalle cada producto del sistema',            
        ]);
        
        DB::table('permisos')->insert([
            'nombre'          => 'Creación de productos',
            'slug'          => 'products.insert',
            'descripcion'   => 'Podría crear nuevos productos en el sistema',
        ]);
        
        DB::table('permisos')->insert([
            'nombre'          => 'Edición de productos',
            'slug'          => 'products.edit',
            'descripcion'   => 'Podría editar cualquier dato de un producto del sistema',
        ]);
        
        DB::table('permisos')->insert([
            'nombre'          => 'Eliminar productos',
            'slug'          => 'products.destroy',
            'descripcion'   => 'Podría eliminar cualquier producto del sistema',      
        ]);
    }
}
