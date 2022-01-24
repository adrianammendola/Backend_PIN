<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Post;

class FormulariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'nombre'=>'Jose',
            'email'=>'nolose@gmail.com',
            'telefono'=>' ',
            'mensaje'=>'esto es una prueba'
        ]);
    }
}
