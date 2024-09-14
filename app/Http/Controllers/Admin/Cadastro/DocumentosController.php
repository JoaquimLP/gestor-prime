<?php

namespace App\Http\Controllers\Admin\Cadastro;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cadastro\Documento\StoreDocumentoRequest;
use App\Http\Requests\Cadastro\Documento\UpdateDocumentoRequest;
use App\Models\Admin\Cadastro\Documento;
use App\Models\Admin\Configuracao\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.cadastro.documento.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresas = Empresa::where('ativo', 'S')->empresa()->get();
        return view("admin.cadastro.documento.create", compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocumentoRequest $request)
    {
        $request = $request->merge([
            "cep" => str_replace("-", "", $request->cep),
        ]);

        Documento::create($request->all());

        return redirect()->route("cadastro.documento.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Documento $documento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Documento $documento)
    {
        $empresas = Empresa::where('ativo', 'S')->empresa()->get();
        
        return view("admin.cadastro.documento.edit", compact('documento', 'empresas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocumentoRequest $request, Documento $documento)
    {
        $documento->update($request->all());

        return redirect()->route("cadastro.documento.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Documento $documento)
    {
        $documento->update(["ativo" => "N"]);

        return redirect()->route("cadastro.documento.index");
    }
}
