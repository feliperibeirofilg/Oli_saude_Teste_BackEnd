<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    
    public function listarClientes(){
        $cliente = Cliente::all();
        //return
    }

    public function criarCliente(Request $request){
            $request->validate([
                'nome'=>'required|string|max:150',
                'data_nascimento' =>'required|date',
                'sexo' => 'required|boolean'
            ]);

            Cliente::create([
                'nome' => $request->nome,
                'data_nascimento' => $request->data_nascimento,
                'sexo' => $request->sexo
            ]);

            return view('/welcome');
        }

    public function editarCliente($id){
            Cliente::findOrFail($id);
            //return com o compact
            
    }

    public function atualizarCliente(Request $request, $id){
            Cliente::findOrFail($id);
            $request->validate([
                'nome'=>'required|string|max:150',
                'data_nascimento' =>'required|date',
                'sexo' => 'required|boolean'
            ]);

            $cliente -> update($request->only(['nome', 'data_nascimento', 'sexo']));

            //return
    }

    public function buscarCliente($id){
        Clientes::findOrFail($id);

        //Return a view
    }

    public function adcDoenca(Request $request, Cliente $id){
        Cliente::findOrFail($id);

        $request->validate([
            'nome_doenca' => 'required|string|max:150',
            'grau_doenca' => 'required|integer|max:2'
        ]);
        
    }
}
