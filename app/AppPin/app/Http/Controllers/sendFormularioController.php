<?php

namespace App\Http\Controllers;

use App\Models\Form;

use Illuminate\Http\Request;

class sendFormularioController extends Controller{

    public function formMethod()
    {

        return view('form');
    }

    public function FormSave(Request $request)
        {       
            $form = Form::where(['name'=>$request->name])->first();

        $status = '';
        if(empty($form)){
            Form::create([
            'name'=> $request->name,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'mensaje' => $request->mensaje
            ]);
            $status = 'GUARDADO';
        }else{
            $status = 'YA EXISTE';
        }

        $details = [
            'name' => 'name: ' . $request->name,
            'body' => $request->email . ' ESTADO = ' . $status
        ];
        \Mail::to(env('juanpablo@gmail.com'))->send(new \App\Mail\SendForm($details));
    }
}
