<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ClienteController;
use App\Models\Cliente;
use App\Models\Doenca;

class DoencaController extends Controller
{
    public function formAdicionarDoenca(Cliente $cliente){
        return view('doenca.adcdoenca', compact('cliente'));
    }

    public function adcDoenca(Request $request, Cliente $cliente){

            if($request->action === 'finalizar'){
                    return redirect()->route('visualizarClientes')->with('success', 'Cadastro finalizado com sucessso!');
                }
        $request->validate([
                'nome_doenca' => 'required|string'
            ]);

            $doenca = Doenca::firstOrCreate(
                ['nome_doenca' => $request->nome_doenca],
            );

            if (!$cliente->doencas->contains($doenca->id)){
                $cliente->doencas()->attach($doenca->id, ['grau_doenca' => $request->grau_doenca]);
            }

            return redirect()->route('adicionardoenca', ['cliente' => $cliente->id])->with('success', 'Doença adicionada');
    }
}
