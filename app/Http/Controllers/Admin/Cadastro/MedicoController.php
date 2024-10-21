<?php

namespace App\Http\Controllers\Admin\Cadastro;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cadastro\Medico\StoreMedicoRequest;
use App\Http\Requests\Cadastro\Medico\UpdateMedicoRequest;
use App\Models\Admin\Cadastro\Medico;
use App\Models\Admin\Configuracao\Empresa;
use App\Service\Cadastro\MedicoService;
use Illuminate\Support\Facades\Auth;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.cadastro.medico.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estadoCivil = (new MedicoService())->listEstadoCivil();
        $empresas = Empresa::where('ativo', 'S')->empresa()->get();

        return view("admin.cadastro.medico.create", compact('estadoCivil', 'empresas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedicoRequest $request)
    {

        $request = $request->merge([
            "cep" =>  preg_replace("/[^0-9]/", "", $request->cep),
            "celular" =>  preg_replace("/[^0-9]/", "", $request->celular),
            "cpf" =>  preg_replace("/[^0-9]/", "", $request->cpf),
            "rg" =>  preg_replace("/[^0-9]/", "", $request->rg),
            "func_public" => (bool) $request->func_public,
        ]);

        Medico::create($request->all());
        return redirect()->route("cadastro.medico.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Medico $medico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medico $medico)
    {
        $estadoCivil = (new MedicoService())->listEstadoCivil();
        $empresas = Empresa::where('ativo', 'S')->empresa()->get();

        return view("admin.cadastro.medico.edit", compact('medico', 'estadoCivil', 'empresas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicoRequest $request, Medico $medico)
    {
        $medico->update($request->all());

        return redirect()->route("cadastro.medico.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medico $medico)
    {
        $medico->update(["ativo" => "N"]);

        return redirect()->route("cadastro.medico.index");
    }
}
