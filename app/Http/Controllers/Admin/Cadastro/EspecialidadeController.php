<?php

namespace App\Http\Controllers\Admin\Cadastro;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cadastro\Especialidade\UpdateEspecialidadeRequest;
use App\Http\Requests\Cadastro\Especialidade\StoreEspecialidadeRequest;
use App\Models\Admin\Cadastro\Especialidade;
use App\Models\Admin\Configuracao\Empresa;
use Illuminate\Support\Facades\Auth;

class EspecialidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.cadastro.especialidade.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.cadastro.especialidade.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEspecialidadeRequest $request)
    {
        $user = Auth::user();
        $empresa = $user->empresas->first()->empresaMatriz;

        if(empty($empresa)) {
            flash()->error('Usuário Não possui vinculo com a empresa matriz.');
            return back()->withInput();
        }

        $request = $request->merge([
            "empresa_id" => $empresa->id,
        ]);

        Especialidade::create($request->all());

        flash()->success('Especialidade cadastrada com sucesso!');

        return redirect()->route("cadastro.especialidade.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Especialidade $especialidade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Especialidade $especialidade)
    {
        return view("admin.cadastro.especialidade.edit", compact('especialidade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEspecialidadeRequest $request, Especialidade $especialidade)
    {
        $especialidade->update($request->all());

        flash()->success('Especialidade atualizado com sucesso!');
        return redirect()->route("cadastro.especialidade.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Especialidade $especialidade)
    {
        $especialidade->update(["ativo" => "N"]);

        flash()->success('Especialidade excluida com sucesso!');
        return redirect()->route("cadastro.especialidade.index");
    }
}
