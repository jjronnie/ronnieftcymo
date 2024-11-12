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
            'id' =>'501',
            'name'=> 'Ronnie',
            'email'=> 'ronaldjjuuko7@gmail.com',
            'password'=>bcrypt('88928892'),
            'is_admin'=>'1'
           
        ]);
        User:: create([
            'id' =>'500',
            'name'=> 'Cymon',
            'email'=> 'cymoncyk@gmail.com',
            'password'=>bcrypt('88928892'),
            'is_admin'=>'1'
           
        ]);
    }
}
