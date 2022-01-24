<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use App\Mail\Mail;

class PostController extends Controller
{

    public function guardarFormulario(Request $request){
        $email = Post::where(['email'=>$request->email])->first();

        $status = '';
        if(empty($email)){
            Post::create([
            'name'=> $request->name,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'mensaje' => $request->mensaje
            ]);
            // $status = 'GUARDADO';
            dd('Su consulta fue guardada con exito');
        }else{
            // $status = 'YA EXISTE';
            dd('El email ya exite');
            
        }

        $details = [
            'name' => 'name: ' . $request->name,
            'body' => $request->email . ' ESTADO = ' . $status
        ];
        // \Mail::to(env('adrianammendola@icloud.com'))->send(new \App\Mail\Mail($details));
}

    public function nuevoFormulario(){
        return view('formulario');
    }
}
