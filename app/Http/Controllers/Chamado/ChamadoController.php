<?php

namespace App\Http\Controllers\Chamado;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chamado;
use App\Models\User;

class ChamadoController extends Controller
{
    public function index()
    {
        // Recuperando todos os chamados
        $chamados = Chamado::all();

        return view('chamados.index', compact('chamados'));
    }

    public function create()
    {
        return view('chamados.create', ['chamado' => new Chamado]);
    }

    public function store(Request $request)
    {
        //Criando regras de validação
        $request->validate([
            'assunto'    => 'required|max:50',
            'descricao'  => 'required|max:150',
            'data'     => 'required',
            'status'     => 'required',
        ]);

        try {

            // Verificando se o chamado está atrasado
            if (date('y-m-d', strtotime($request->data)) < date('y-m-d') ) {
                $request->status = 'Atrasado';
            }

            // Selecionando o vendedor com o menor número de chamados abertos
            $menor_qtd_chamado = User::min('chamados_abertos');
            $vendedor = User::where('scope', 'vendedor')->where('chamados_abertos', $menor_qtd_chamado)->first();

            // Caso não exista nenhum vendedor cadastrado
            if (!$vendedor) {
                return redirect()->back()->with('error', 'Desculpe, não existe vendedor cadastrados para atender o chamado.');
            }
            
            // Abrindo chamado
            $chamado = new Chamado;
            $chamado->assunto = $request->assunto;
            $chamado->descricao = $request->descricao;
            $chamado->data_do_chamado = date('y-m-d', strtotime($request->data));
            $chamado->status = $request->status;
            $chamado->user_id = $vendedor->id;
            $chamado->save();

            if (!$chamado) {
                return redirect()->back()->with('error', 'Desculpe, não foi possível concluir a solicitação');
            }

            // Acrescendo número de chamados ao vendedor
            switch ($request->status) {
                case "Aberto":
                    $vendedor->chamados_abertos += 1;
                    $vendedor->update();
                    break;
                case "Em andamento":
                    $vendedor->chamados_andamento += 1;
                    $vendedor->update();
                    break;
                case "Resolvido":
                    $vendedor->chamados_resolvidos += 1;
                    $vendedor->update();
                    break;
            }

            return redirect()->back()->with('success', 'Chamado Nº '.$chamado->id.' encaminhado para o vendedor '.$vendedor->nome.'.');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Desculpe ocorreu um erro no servidor.');
        }
    }

    public function show($id)
    {
        // Recuperando chamado pelo ID e verificando se o mesmo existe no banco de dados
        $chamado = Chamado::find($id);
        if (!$chamado) {
            return redirect()->back()->with('error', 'Desculpe chamado não encontrado.');
        }
        return view('chamados.show', compact('chamado'));
    }

    public function edit(Request $request, $id)
    {
        //Criando regras de validação
        $request->validate([
            'assunto'    => 'required|max:50',
            'descricao'  => 'required|max:150',
            'data'     => 'required',
            'status'     => 'required',
        ]);

        // Verificando se o chamado existe 
        $chamado = Chamado::find($id);
        if (!$chamado) {
            return redirect()->back()->with('error', 'Desculpe chamado não encontrado.');
        }

        try {

            // Atualizando dados
            $chamado->assunto = $request->assunto;
            $chamado->descricao = $request->descricao;
            $chamado->data_do_chamado = date('Y-m-d', strtotime($request->data));
            $chamado->status = $request->status;
            $chamado->update();

            return redirect()->back()->with('success', 'Registro atualizado com sucesso!');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Desculpe ocorreu um erro no servidor.');
        }
    }

    public function delete($id)
    {
        // Verificando se o chamado existe
        $chamado = Chamado::find($id);
        if (!$chamado) {
            return redirect()->back()->with('error', 'Desculpe, chamado não encontrado.');
        }

        try {
            // Excluindo chamado
            $chamado->delete();

            return redirect()->back()->with('success', 'Registro excluído com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Desculpe ocorreu um erro no servidor.');
        }
    }
}
