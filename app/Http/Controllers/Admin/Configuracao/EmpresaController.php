<?php

namespace App\Http\Controllers\Admin\Configuracao;

use App\Http\Controllers\Controller;
use App\Http\Requests\Configuracao\Empresa\StoreEmpresaRequest;
use App\Http\Requests\Configuracao\Empresa\UpdateEmpresaRequest;
use App\Models\Admin\Configuracao\Empresa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.configuracao.empresa.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Empresa::class);

        return view("admin.configuracao.empresa.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmpresaRequest $request)
    {
        Gate::authorize('create', Empresa::class);

        do {
            $token = str()->random(50);
        } while (Empresa::where("token", $token)->exists());

        $request = $request->merge([
            "cep" =>  preg_replace("/[^0-9]/", "", $request->cep),
            "celular" =>  preg_replace("/[^0-9]/", "", $request->celular),
            "cnpj" =>  preg_replace("/[^0-9]/", "", $request->cnpj),
            "empresa_id" => Auth::user()->empresas->where('tipo_empresa', 'M')->first()->id,
            "tipo_empresa" => "F",
            "token" => $token
        ]);

        DB::transaction(function() use ($request){
            $empresa = Empresa::create($request->except(['logo', '_method', '_token']));

            $extension = $request->logo->getClientOriginalExtension();

            //$documento->storeAs('eskalamed/documentos/' . $medico->id, time() . '.' . $extension, "s3")
            if(isset($request->logo)){
                $empresa->logo = $request->logo->storeAs('eskalamed/empresa/logo', $empresa->token . '.' . $extension, "s3");
                $empresa->save();
            }

            return;
        });

        return redirect()->route("configuracao.empresa.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresa $empresa)
    {
        return view("admin.configuracao.empresa.edit", compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmpresaRequest $request, Empresa $empresa)
    {
        $request = $request->merge([
            "cep" =>  preg_replace("/[^0-9]/", "", $request->cep),
            "celular" =>  preg_replace("/[^0-9]/", "", $request->celular),
            "cnpj" =>  preg_replace("/[^0-9]/", "", $request->cnpj),
        ]);

        DB::transaction(function() use ($request, $empresa){

            $dados = $request->except(['logo', '_method', '_token']);
            if(isset($request->logo)){
                $extension = $request->logo->getClientOriginalExtension();
                $dados["logo"]= $request->logo->storeAs('eskalamed/empresa/logo', $empresa->token . '.' . $extension, "s3");
            }

            $empresa->update($dados);

            return;
        });

        return redirect()->route("configuracao.empresa.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
