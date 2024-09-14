<?php

namespace App\Http\Controllers\Admin\Cadastro\Medico;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cadastro\Medico\ContatoEmergenciaRequest;
use App\Models\Admin\Cadastro\ContatoEmergencia;
use App\Models\Admin\Cadastro\Medico;
use App\Service\Cadastro\MedicoService;
use Illuminate\Http\Request;

class ContatoEmergenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Medico $medico)
    {
        $contatoEmergencias = $medico->contatoEmergencia->where('ativo', 'S');

        //   dd($contatoEmergencias);

        return view("admin.cadastro.medico.contato-emergencia.index", compact('contatoEmergencias', 'medico'));
    }

    /**
     * Display a listing of the resource.
     */
    public function create(Medico $medico)
    {
        $tipoContato = (new MedicoService())->listTipoContato();

        return view("admin.cadastro.medico.contato-emergencia.create", compact('medico', 'tipoContato'));
    }

    /**
     * Display a listing of the resource. Cadastro\\Medico\\
     */
    public function store(ContatoEmergenciaRequest $request, Medico $medico)
    {
        ContatoEmergencia::create([
            'medico_id' => $medico->id,
            'nome' => $request->nome,
            'tipo' => $request->tipo,
            'contato' => $request->contato,
        ]);

        return redirect()->route('cadastro.medico.contato-emergencia.index', $medico->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Medico $medico)
    {
        $arquivo = ContatoEmergencia::where('id', $request->item_id)->where('medico_id', $medico->id)->first();

        if ($arquivo) {
            $arquivo->update(["ativo" => "N"]);
        }

        return redirect()->route('cadastro.medico.contato-emergencia.index', $medico->id);
    }
}
