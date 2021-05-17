<?php

namespace App\Http\Controllers\Vendedor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Chamado;

class VendedorController extends Controller
{
    public function index()
    {
        // Buscando por todos os usuários com scopo de vendedor
        $vendedores = User::where('scope', 'vendedor')->get();

        return view('vendedores.index', compact('vendedores'));
    }

    public function create()
    {
        // Instanciando um usuário para limpar o formulário
        $vendedor = new User;
        $vendedor->status = 1;

        return view('vendedores.create', compact('vendedor'));
    }

    public function store(Request $request)
    {
        //Criando regras de validação
        $request->validate([
            'nome' => 'required|max:50',
            'email'    => 'required|email|max:50|unique:users',
            'telefone' => 'required',
            'status' => 'required|boolean',
            'em_aberto' => 'required|min:0|numeric',
            'em_andamento' => 'required|min:0|numeric',
            'resolvidos' => 'required|min:0|numeric',
        ]);

        try {
            
            // Criando vendedor
            $vendedor = new User;
            $vendedor->nome = $request->nome;
            $vendedor->email = $request->email;
            $vendedor->telefone = $request->telefone;
            $vendedor->status = $request->status;
            $vendedor->chamados_abertos = $request->em_aberto;
            $vendedor->chamados_andamento = $request->em_andamento;
            $vendedor->chamados_resolvidos = $request->resolvidos;
            $vendedor->save();

            if (!$vendedor) {
                return redirect()->back()->with('error', 'Desculpe, registro não efetuado!');
            }
            return redirect()->back()->with('success', 'Vendedor '.$vendedor->nome.' registrado com sucesso!');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Desculpe ocorreu um erro no servidor.');
        }
    }

    public function show($id)
    {
        // Recuperando vendedor pelo ID e verificando se o mesmo existe no banco de dados
        $vendedor = User::find($id);
        if (!$vendedor) {
            return redirect()->back()->with('error', 'Desculpe nenhum vendedor encontrado.');
        }
        return view('vendedores.show', compact('vendedor'));
    }

    public function edit(Request $request, $id)
    {
        //Criando regras de validação
        $request->validate([
            'nome' => 'required|max:50',
            'email'    => 'required|email|max:50',
            'telefone' => 'required',
            'status' => 'required|boolean',
            'em_aberto' => 'required|min:0|numeric',
            'em_andamento' => 'required|min:0|numeric',
            'resolvidos' => 'required|min:0|numeric',
        ]);

        // Verificando se o vendedor existe
        $vendedor = User::find($id);
        if (!$vendedor || $vendedor->scope != 'vendedor') {
            return redirect()->back()->with('error', 'Desculpe vendedor não encontrado.');
        }

        // Garantindo que o e-mail seja único no banco de dados
        if ($request->email != $vendedor->email) {
            $request->validate([
                'email' => 'unique:users',
            ]);
        }

        try {

            // Atualizando dados
            $vendedor->nome = $request->nome;
            $vendedor->email = $request->email;
            $vendedor->telefone = $request->telefone;
            $vendedor->status = $request->status;
            $vendedor->chamados_abertos = $request->em_aberto;
            $vendedor->chamados_andamento = $request->em_andamento;
            $vendedor->chamados_resolvidos = $request->resolvidos;
            $vendedor->update();

            return redirect()->back()->with('success', 'Vendedor '.$vendedor->nome.' atualizado com sucesso!');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Desculpe ocorreu um erro no servidor.');
        }
    }

    public function delete($id)
    {
        // Verificando se o vendedor existe e se está vinculado a algum chamado
        $vendedor = User::find($id);
        if (!$vendedor || $vendedor->scope != 'vendedor') {
            return redirect()->back()->with('error', 'Desculpe vendedor não encontrado.');
        }

        $chamado = Chamado::where('user_id', $id)->first();
        if ($chamado) {
            return redirect()->back()->with('error', 'O vendedor '.$vendedor->nome.' está possue chamado(s) aberto(s).');
        }

        try {
            // Excluindo vendedor
            $vendedor->delete();

            return redirect()->back()->with('success', 'Vendedor excluído com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Desculpe ocorreu um erro no servidor.');
        }
    }
}
