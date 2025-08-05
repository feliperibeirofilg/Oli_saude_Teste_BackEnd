<?php
namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\Doenca;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    
    public function cadastrarClientes(){
       return view ('cliente.criarCadastro');
    }

    public function listarCliente(){
        $clientes = Cliente::all();
        return view('cliente.listarClientes', compact ('clientes'));
    }

    public function criarCliente(Request $request){
        //Verificar se os dados do form esta indo corretamente:
        //dd($request->all());
            $request->validate([
                'nome'=>'required|string|max:150',
                'data_nascimento' =>'required|date',
                'sexo' => 'required|boolean'
            ]);

            $cliente = Cliente::create([
                'nome' => $request->nome,
                'data_nascimento' => $request->data_nascimento,
                'sexo' => $request->sexo,
            ]);
            
            return redirect()->route('doencas',['cliente' => $cliente->id])->with('success', 'Cliente cadastrado com sucesso.');
            
    }

    public function editarCliente(Cliente $cliente){
            return view ('cliente.editarCadastro', compact ('cliente'));
    }

    public function atualizarCliente(Request $request, Cliente $cliente){
        //Não é necessario pois o laravel já traz esse objeto.   
        //Cliente::findOrFail($cliente);
            $request->validate([
                'nome'=>'required|string|max:150',
                'data_nascimento' =>'required|date',
                'sexo' => 'required|boolean'
            ]);

            $cliente -> update($request->only(['nome', 'data_nascimento', 'sexo']));

            return redirect()->route('visualizarClientes')->with('success', 'Cliente atualizado com sucesso.');
    }

    public function buscarCliente($id){
        Clientes::findOrFail($id);

        //Return a view
    }

    public function deletarCliente(Request $request, $id){
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('visualizarClientes');
    }

    public function ordenarClientes(Cliente $cliente){
        //Busca clientes com doencas e grau_doenca preenchido.
        $clientes = Cliente::with('doencas')->get();

        $clientesComScore = $clientes->map(function($cliente){
            //Soma todos os graus das doencas
            $somaGraus = $cliente->doencas->sum(function ($doenca){
                return $doenca->pivot->grau_doenca;
            });

            $sd = $somaGraus;
            $score = (1 / (1 + exp(-(-2.8 + $sd)))) * 100;

            $cliente->score = round($score, 2);
            return $cliente;
        });

        $clientesOrdenados = $clientesComScore->sortByDesc('score');

        return view('cliente.ordemCliente', compact('clientesOrdenados'));
        
    }

}
