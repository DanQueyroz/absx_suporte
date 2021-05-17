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

    public function show($id)
    {
        // Recuperando vendedor pelo ID e verificando se o mesmo existe no banco de dados
        $vendedor = User::find($id);
        if (!$vendedor) {
            return redirect()->back()->with('error', 'Desculpe nenhum vendedor encontrado.');
        }

        return view('vendedores.show', compact('vendedor'));
    }
}
