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

};