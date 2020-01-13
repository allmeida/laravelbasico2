<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    public function index (){

        $clientes=Cliente::all();

        return view ('cliente.index',compact ('clientes'));
    }

    public function create (){
        return view ('cliente.form');
    }

    public function store (Request $request){

        //dd($request->all());

        try{
        Cliente::create($request->all());
        flash('Cliente salvo com sucesso')->success();

        }catch(\Exception $erro){

        flash('Erro ao salvar cliente')->error();

        return redirect()->back();

    }
        return redirect ('/clientes');


    }

    public function edit ($id){

        $cliente=Cliente::find($id);

        return view('cliente.form',compact('cliente'));



    }

    public function update (Request $request,$id){

        $cliente = Cliente::find($id);

        $cliente->update($request->all());

        return redirect ('/clientes');


    }

    public function destroy($id){

        $cliente = Cliente::find($id);
        $cliente->delete();

        flash('Cliente excluido com sucesso')->success();

        //return redirect ('/clientes');
        return "deletou";

    }
}
