<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //call the model then the create function
        //associative array
        User:: create([
            'name'=> 'JRonnie',
            'email'=> 'ronaldjjuuko7@gmail.com',
            'password'=>bcrypt('88928892'),
           
        ]);
        User:: create([
            'name'=> 'Isaac',
            'email'=> 'kclich@hotmail.com',
            'password'=>bcrypt('88928892'),
           
        ]);
    }
}
