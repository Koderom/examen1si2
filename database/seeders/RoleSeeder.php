<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Roles
        $admin = Role::create(['name'=>'admin']);
        $juez = Role::create(['name'=>'juez']);
        $abogado = Role::create(['name'=>'abogado']);
        $implicado = Role::create(['name'=>'implicado']);

        //usuarios
        Permission::create(['name'=>'user.index'])->syncRoles([$admin,$juez,$abogado]);
        Permission::create(['name'=>'user.create'])->syncRoles([$admin,$juez,$abogado]);
        Permission::create(['name'=>'user.store'])->syncRoles([$admin,$juez,$abogado]);
        Permission::create(['name'=>'user.destroy'])->syncRoles([$admin,$juez,$abogado]);
        Permission::create(['name'=>'user.edit'])->syncRoles([$admin,$juez,$abogado]);
        Permission::create(['name'=>'user.update'])->syncRoles([$admin,$juez,$abogado]);
        Permission::create(['name'=>'user.show'])->syncRoles([$admin,$juez,$abogado]);

        Permission::create(['name'=>'juzgado.index'])->syncRoles([$admin,$juez,$abogado,$implicado]);
        Permission::create(['name'=>'juzgado.create'])->syncRoles([$admin,$juez]);
        Permission::create(['name'=>'juzgado.store'])->syncRoles([$admin,$juez]);
        Permission::create(['name'=>'juzgado.destroy'])->syncRoles([$admin,$juez]);
        Permission::create(['name'=>'juzgado.edit'])->syncRoles([$admin,$juez]);
        Permission::create(['name'=>'juzgado.update'])->syncRoles([$admin,$juez]);
        Permission::create(['name'=>'juzgado.show'])->syncRoles([$admin,$juez,$abogado,$implicado]);

        Permission::create(['name'=>'juez.index'])->syncRoles([$admin,$juez,$abogado,$implicado]);
        Permission::create(['name'=>'juez.create'])->syncRoles([$admin,$juez]);
        Permission::create(['name'=>'juez.store'])->syncRoles([$admin,$juez]);
        Permission::create(['name'=>'juez.destroy'])->syncRoles([$admin,$juez]);
        Permission::create(['name'=>'juez.edit'])->syncRoles([$admin,$juez]);
        Permission::create(['name'=>'juez.update'])->syncRoles([$admin,$juez]);
        Permission::create(['name'=>'juez.show'])->syncRoles([$admin,$juez,$abogado,$implicado]);

        Permission::create(['name'=>'abogado.index'])->syncRoles([$admin,$juez,$abogado,$implicado]);
        Permission::create(['name'=>'abogado.create'])->syncRoles([$admin,$juez]);
        Permission::create(['name'=>'abogado.store'])->syncRoles([$admin,$juez]);
        Permission::create(['name'=>'abogado.destroy'])->syncRoles([$admin,$juez]);
        Permission::create(['name'=>'abogado.edit'])->syncRoles([$admin,$juez]);
        Permission::create(['name'=>'abogado.update'])->syncRoles([$admin,$juez]);
        Permission::create(['name'=>'abogado.show'])->syncRoles([$admin,$juez,$abogado,$implicado]);

        Permission::create(['name'=>'persona.index'])->syncRoles([$admin,$juez,$abogado,$implicado]);
        Permission::create(['name'=>'persona.create'])->syncRoles([$admin,$juez,$abogado]);
        Permission::create(['name'=>'persona.store'])->syncRoles([$admin,$juez,$abogado]);
        Permission::create(['name'=>'persona.destroy'])->syncRoles([$admin,$juez,$abogado]);
        Permission::create(['name'=>'persona.edit'])->syncRoles([$admin,$juez,$abogado]);
        Permission::create(['name'=>'persona.update'])->syncRoles([$admin,$juez,$abogado]);
        Permission::create(['name'=>'persona.show'])->syncRoles([$admin,$juez,$abogado,$implicado]);

        Permission::create(['name'=>'procesoJudicial.index'])->syncRoles([$admin,$juez,$abogado,$implicado]);
        Permission::create(['name'=>'procesoJudicial.create'])->syncRoles([$admin,$juez]);
        Permission::create(['name'=>'procesoJudicial.store'])->syncRoles([$admin,$juez]);
        Permission::create(['name'=>'procesoJudicial.destroy'])->syncRoles([$admin,$juez]);
        Permission::create(['name'=>'procesoJudicial.edit'])->syncRoles([$admin,$juez]);
        Permission::create(['name'=>'procesoJudicial.update'])->syncRoles([$admin,$juez]);
        Permission::create(['name'=>'procesoJudicial.show'])->syncRoles([$admin,$juez,$abogado,$implicado]);

        Permission::create(['name'=>'expedienteJudicial.index'])->syncRoles([$admin,$juez,$abogado,$implicado]);
        Permission::create(['name'=>'expedienteJudicial.create'])->syncRoles([$admin,$juez]);
        Permission::create(['name'=>'expedienteJudicial.store'])->syncRoles([$admin,$juez]);
        Permission::create(['name'=>'expedienteJudicial.destroy'])->syncRoles([$admin,$juez]);
        Permission::create(['name'=>'expedienteJudicial.edit'])->syncRoles([$admin,$juez]);
        Permission::create(['name'=>'expedienteJudicial.update'])->syncRoles([$admin,$juez]);
        Permission::create(['name'=>'expedienteJudicial.show'])->syncRoles([$admin,$juez,$abogado,$implicado]);

        Permission::create(['name'=>'archivo.index'])->syncRoles([$admin,$juez,$abogado,$implicado]);
        Permission::create(['name'=>'archivo.create'])->syncRoles([$admin,$juez,$abogado]);
        Permission::create(['name'=>'archivo.store'])->syncRoles([$admin,$juez,$abogado]);
        Permission::create(['name'=>'archivo.destroy'])->syncRoles([$admin,$juez]);
        Permission::create(['name'=>'archivo.edit'])->syncRoles([$admin,$juez,$abogado]);
        Permission::create(['name'=>'archivo.update'])->syncRoles([$admin,$juez,$abogado]);
        Permission::create(['name'=>'archivo.show'])->syncRoles([$admin,$juez,$abogado,$implicado]);

        Permission::create(['name'=>'bitacora.index'])->syncRoles([$admin,$juez]);
//        $user = User::find('1');
  //      $user->assignRole($admin);
    }
}
