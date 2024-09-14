<?php

namespace App\Http\Controllers\Admin\Configuracao;

use App\Http\Controllers\Controller;
use App\Http\Requests\Configuracao\Empresa\StoreGestaoContratoRequest;
use App\Http\Requests\Configuracao\Empresa\UpdateGestaoContratoRequest;
use App\Models\Admin\Cadastro\UnidadeAtendimento;
use App\Models\Admin\Configuracao\Empresa;
use App\Models\Admin\Configuracao\GestaoContrato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GestaoContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.configuracao.gestao-contrato.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresas = Empresa::where('ativo', 'S')->empresa()->get();

        return view("admin.configuracao.gestao-contrato.create", compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGestaoContratoRequest $request)
    {
        //::
        $request = $request->merge([
            "valor_hora" =>  str_replace([".", ","], ["", "."], $request->valor_hora),
            "valor_total" =>  str_replace([".", ","], ["", "."], $request->valor_total),
            "start_date" =>  date_reverse_mask($request->start_date),
            "end_date" =>  date_reverse_mask($request->end_date),
        ]);


        DB::transaction(function () use ($request) {
            $gestaoContrato = GestaoContrato::create($request->except(['path', '_method', '_token']));

            if (isset($request->path)) {
                $extension = $request->path->getClientOriginalExtension();
                $gestaoContrato->path = $request->path->storeAs('eskalamed/gestao-contrato/logo/' . $gestaoContrato->id,  time() . '.' . $extension, "s3");
                $gestaoContrato->save();
            }

            return;
        });

        flash()->success('Contrato cadastrado com sucesso!');
        return redirect()->route("configuracao.gestao-contrato.index");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GestaoContrato $gestaoContrato)
    {
        $empresas = Empresa::where('ativo', 'S')->empresa()->get();

        return view("admin.configuracao.gestao-contrato.edit", compact('gestaoContrato', 'empresas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGestaoContratoRequest $request, GestaoContrato $gestaoContrato)
    {
        //::
        $request = $request->merge([
            "valor_hora" =>  str_replace([".", ","], ["", "."], $request->valor_hora),
            "valor_total" =>  str_replace([".", ","], ["", "."], $request->valor_total),
            "start_date" =>  date_reverse_mask($request->start_date),
            "end_date" =>  date_reverse_mask($request->end_date),
        ]);


        DB::transaction(function () use ($request, $gestaoContrato) {

            $dados = $request->except(['path', '_method', '_token']);
            if (isset($request->logo)) {
                $extension = $request->logo->getClientOriginalExtension();
                $dados["path"] = $request->path->storeAs('eskalamed/gestao-contrato/logo/' . $gestaoContrato->id,  time() . '.' . $extension, "s3");
            }

            $gestaoContrato->update($dados);

            return;
        });

        flash()->success('Contrato atualizado com sucesso!');
        return redirect()->route("configuracao.gestao-contrato.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GestaoContrato $gestaoContrato)
    {
        $gestaoContrato->update(["ativo" => "N"]);

        flash()->success('Contrato removido com sucesso!');
        return redirect()->route("configuracao.gestao-contrato.index");
    }
}
