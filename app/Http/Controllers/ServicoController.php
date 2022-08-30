<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use App\Http\Requests\ServicoRequest;

class ServicoController extends Controller
{
    /**
     * Lista os serviços
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $servicos = Servico::paginate(10);
        
        return view('servicos.index')->with('servicos', $servicos);
    }

    /**
     * Mostra o from vazio para criação
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('servicos.create');
    }

    /**
     * Cria um novo registro no banco de dados
     *
     * @param ServicoRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(ServicoRequest $request)
    {
        $dado = $request->except('_token');
        Servico::create($dado);
        return redirect()->route('servicos.index')
                ->with('mensagem', 'Serviço criado com sucesso');
    }

    /**
     * Mostra o formulario preenchido para alteração
     *
     * @param Servico $servico
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Servico $servico)
    {
        return view('servicos.edit')->with('servico', $servico);
    }

    /**
     * Atualiza um registro no banco de dados
     *
     * @param Servico $servico
     * @param ServicoRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(Servico $servico, ServicoRequest $request)
    {
        $dados = $request->except(['_token', '_method']);
        $servico->update($dados);

        return redirect()->route('servicos.index')
                ->with('mensagem', 'Serviço atualizado com sucesso');
    }
}
