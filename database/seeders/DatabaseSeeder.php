<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $role = Role::create(['name' => 'DG']);
        // $role = Role::create(['name' => 'Secretaire']);
        // $role = Role::create(['name' => 'Tresorier']);

        $create_agent = Permission::create(['name' => 'create agent']);
        $list_agent = Permission::create(['name' => 'list agent']);
        $delete_agent = Permission::create(['name' => 'delete agent']);

        $create_rapport = Permission::create(['name' => 'create rapport']);
        $list_rapport = Permission::create(['name' => 'list rapport']);
        $delete_rapport = Permission::create(['name' => 'delete rapport']);
        
        $permissionList = [$create_agent, $list_agent, $delete_agent, $create_rapport, $list_rapport, $delete_rapport];

        // \App\Models\User::factory(10)->create();

        for ($i=0; $i < 5; $i++) { 
            $user = \App\Models\User::factory()->create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => Hash::make('Motdepasse1')
            ]);
            $user->givePermissionTo($permissionList[$i]);
        }

        
    }
}
