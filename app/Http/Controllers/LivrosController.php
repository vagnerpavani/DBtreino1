<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Livros;

class LivrosController extends Controller
{
    public function create(Request $request){
    $livros = new Livros;

    $livros->titulo = $request->titulo;
    $livros->autor =$request->autor;
    $livros->editora =$request->editora;
    $livros->versao =$request->versao;
    $livros->anoDeLancamento =$request->anoDeLancamento;
    $livros->qtdEstoque =$request->qtdEstoque;
    $livros->qtdEmprestada =$request->qtdEmprestada;
    $livros->save();

        return response()->json([$livros]);
    }
    public function list(){
        return Livros::all();
    }
    public function acha($id){
        $livro = Livros::findOrFail($id);
        return response()->json([$livro])
    }

    public function deleta($id){
        $livro = Livros::find($id);
        return $livro->delete();
    }
    public function update(Request $request, $id){
        $livro = Livros::find($id);
    
        if($request->has('titulo') ) $livro->titulo = $request->titulo;
        if($request->has('autor') ) $livro->autor =$request->autor;
        if($request->has('editora') ) $livro->editora =$request->editora;
        if($request->has('versao') ) $livro->versao =$request->versao;
        if($request->has('anoDeLancamento') ) $livro->anoDeLancamento =$request->anoDeLancamento;
        if($request->has('qtdEstoque') ) $livro->qtdEstoque =$request->qtdEstoque;
        if($request->has('qtdEmprestada') )$livro->qtdEmprestada =$request->qtdEmprestada;
        $livro->save();
    
        return response()->json([$livro]);
    }
};
