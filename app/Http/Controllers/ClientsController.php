<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientsController extends Controller{
public function create(Request $request){
    $clientes = new Client;
    
    $clientes->nome = $request->nome;
    $clientes->telefone =$request->telefone;
    $clientes->data_nascimento=$request->data_nascimento;
    $clientes->endereco =$request->endereco;
    $clientes->cpf =$request->cpf;
    $clientes->save();
        return response()->json([$clientes]);
    }


    public function list(){
        return client::all();
    }

    public function acha($id){
        $cliente = Client::findOrFail($id);
        return response()-> json([$cliente]);
    }

    public function update(Request $request, $id)
    {
        $cliente = Client::find($id);
    
        if($request->has('nome') ) $cliente->nome = $request->nome;
        if($request->has('telefone') ) $cliente->telefone =$request->telefone;
        if($request->has('data_nascimento') ) $cliente->data_nascimento =$request->data_nascimento;
        if($request->has('endereco') ) $cliente->endereco =$request->endereco;
        if($request->has('cpf') ) $cliente->cpf =$request->cpf;
        $cliente->save();
    
        return response()->json([$cliente]);
    }

    public function delete($id){
        Client::destroy($id);
        return response()->json(['Cliente apagado!']);
    }
};