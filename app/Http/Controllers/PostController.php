<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use App\Mail\sendMail;

class PostController extends Controller
{

    public function guardarFormulario(Request $request){
        $email = Post::where(['email'=>$request->email])->first();

        $status = '';
        if(empty($email)){
            Post::create([
            'nombre'=> $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'mensaje' => $request->mensaje
            ]);
             $status = 'GUARDADO';
               
        }else{
             $status = 'YA EXISTE';
            dd('El email ya exite');
            
        }

        $details = [
            'title' => 'Post title: ' . $request->nombre,
            'body' => $request->mensaje
    ];
        
        \Mail::to('adrianammendola92@gmail.com')->send(new \App\Mail\sendMail($details));
        
    }

    public function nuevoFormulario(){
        return view('formulario');
    }

}
