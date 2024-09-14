<?php

namespace App\Http\Controllers\Admin\Cadastro;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cadastro\UnidadeAtendimento\StoreUnidadeAtendimentoRequest;
use App\Http\Requests\Cadastro\UnidadeAtendimento\UpdateUnidadeAtendimentoRequest;
use App\Models\Admin\Cadastro\UnidadeAtendimento;
use App\Models\Admin\Configuracao\GestaoContrato;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UnidadeAtendimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.cadastro.unidade-atendimento.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contratos = GestaoContrato::where('ativo', 'S')->empresa()->get();

        return view("admin.cadastro.unidade-atendimento.create", compact("contratos"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUnidadeAtendimentoRequest $request)
    {
        $user = Auth::user();
        $empresa = $user->empresas->first()->empresaMatriz;

        if(empty($empresa)) {
            flash()->error('Usuário Não possui vinculo com a empresa matriz.');
            return back()->withInput();
        }

        $request = $request->merge([
            "cep" => str_replace("-", "", $request->cep),
            "empresa_id" => $empresa->id,
        ]);

        DB::transaction(function() use ($request){

            $unidade = UnidadeAtendimento::create($request->all());
            $unidade->gestaoContrato()->sync([$request->contrato_id]);
        });

        flash()->success('U.A cadastrada com sucesso!');

        return redirect()->route("cadastro.unidade-atendimento.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(UnidadeAtendimento $unidadeAtendimento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnidadeAtendimento $unidadeAtendimento)
    {
        $contratos = GestaoContrato::where('ativo', 'S')->empresa()->get();

        return view("admin.cadastro.unidade-atendimento.edit", compact('unidadeAtendimento', 'contratos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnidadeAtendimentoRequest $request, UnidadeAtendimento $unidadeAtendimento)
    {
        $unidadeAtendimento->update($request->all());

        flash()->success('U.A atualizada com sucesso!');
        return redirect()->route("cadastro.unidade-atendimento.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnidadeAtendimento $unidadeAtendimento)
    {
        $unidadeAtendimento->update(["ativo" => "N"]);

        flash()->success('U.A removida com sucesso!');

        return redirect()->route("cadastro.unidade-atendimento.index");
    }
}
