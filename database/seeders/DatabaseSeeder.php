<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\User;
use App\Models\Feature;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $features = ['User','Role'];

        $permissions = ['create','update','read','Delete'];
        foreach($features as $feature){
            Feature::create([
                'name' => $feature
            ]);
        }

        for($i=1;$i <= count($features); $i++){
            for($j=0;$j<count($permissions);$j++){
                Permission::create([
                    'name'=>$permissions[$j],
                    'feature_id'=>$i
                ]);
            }
                
        }

        Role::create([
            'name'=> 'Admin'
        ]);

        $name = 'admin';
        $username = 'admin';
        $password = 'admin';
        $role_id = 1;
        $phone = '0909090';
        $email = 'admin@gmail.com';
        $gender = 1;
        $is_active = 1;


        User::create([
            'name' => $name,
            'password' => Hash::make($password),
            'username' => $username,
            'role_id' => $role_id,
            'phone' => $phone,
            'email' => $email,
            'gender' => $gender,
            'is_active' => $is_active
        ]);    
    }
}
