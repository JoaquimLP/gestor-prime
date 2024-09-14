<?php

namespace App\Http\Controllers\Admin\Cadastro\Medico;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cadastro\Medico\DocumentosRequest;
use App\Models\Admin\Cadastro\Arquivo;
use App\Models\Admin\Cadastro\Especialidade;
use App\Models\Admin\Cadastro\Medico;
use Illuminate\Http\Request;

class DocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Medico $medico)
    {
        $documentos = $medico->documentos->where('ativo', 'S');

        return view("admin.cadastro.medico.documento.index", compact('documentos', 'medico'));
    }

    /**
     * Display a listing of the resource.
     */
    public function create(Medico $medico)
    {
        return view("admin.cadastro.medico.documento.create", compact('medico'));
    }

    /**
     * Display a listing of the resource.
     */
    public function store(DocumentosRequest $request, Medico $medico)
    {

        foreach ($request->documentos as $key => $documento) {

            $extension = $documento->getClientOriginalExtension();
            Arquivo::create([
                'medico_id' => $medico->id,
                'descricao' => $request->descricao, // MacBook-Air-de-Joaquim:
                'path'  =>  $documento->storeAs('eskalamed/documentos/' . $medico->id, time() . '.' . $extension, "s3"),
            ]);
        }

        return redirect()->route('cadastro.medico.documentos.index', $medico->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Medico $medico)
    {
        $arquivo = Arquivo::where('id', $request->item_id)->where('medico_id', $medico->id)->first();

        if ($arquivo) {
            $arquivo->update(["ativo" => "N"]);
        }

        return redirect()->route('cadastro.medico.documentos.index', $medico->id);
    }
}
