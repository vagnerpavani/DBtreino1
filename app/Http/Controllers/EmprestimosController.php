<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emprestimo;
use App\Http\Resources\EmprestimosResource;

class EmprestimosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function store(Request $request){
        $emprestimo = new Emprestimo;
    
        $emprestimo->status = $request->status;
        $emprestimo->dataDeInicio =$request->dataDeInicio;
        $emprestimo->dataDeTermino =$request->dataDeTermino;
        $emprestimo->idCliente =$request->idCliente;
        $emprestimo->idLivro =$request->idLivro;
        $emprestimo->save();
    
            return new EmprestimosResource($emprestimo);
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return EmprestimosResource::collection(Emprestimo::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emprestimo = Emprestimo::findOrFail($id);
        return new EmprestimosResource($emprestimo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $emprestimo = Emprestimo::find($id);
    
        if($request->has('status') ) $emprestimo->status = $request->status;
        if($request->has('dataDeInicio') ) $emprestimo->dataDeInicio =$request->dataDeInicio;
        if($request->has('dataDeTermino') ) $emprestimo->dataDeTermino =$request->dataDeTermino;
        if($request->has('idCliente') ) $emprestimo->idCliente =$request->idCliente;
        if($request->has('idLivro') ) $emprestimo->idLivro =$request->idLivro;
        $emprestimo->save();
    
        return new EmprestimosResource($emprestimo);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Emprestimo::destroy($id);

        return response()->json('Empréstimo apagado');
    }
}