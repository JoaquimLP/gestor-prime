<?php

namespace App\Http\Controllers\Admin\Cadastro\Medico;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cadastro\Medico\DadosBancarioRequest;
use App\Models\Admin\Cadastro\DadosBancario;
use App\Models\Admin\Cadastro\Medico;
use Illuminate\Http\Request;

class DadosBancarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Medico $medico)
    {
        $dadosBancarios = $medico->dadosBancarios->where('ativo', 'S');

        return view("admin.cadastro.medico.dados-bancario.index", compact('dadosBancarios', 'medico'));
    }

    /**
     * Display a listing of the resource.
     */
    public function create(Medico $medico)
    {

        return view("admin.cadastro.medico.dados-bancario.create", compact('medico'));
    }

    /**
     * Display a listing of the resource. Cadastro\\Medico\\
     */
    public function store(DadosBancarioRequest $request, Medico $medico)
    {
        DadosBancario::create([
            'medico_id'     => $medico->id,
            'nome'          => $request->nome,
            "tipo_conta"    => $request->tipo_conta,
            "conta"         => $request->conta,
            "agencia"       => $request->agencia,
            "pix"           => $request->pix,
            "cpf"           =>  preg_replace("/[^0-9]/", "", $request->cpf),
            "rg"            => preg_replace("/[^0-9]/", "", $request->rg),
        ]);

        return redirect()->route('cadastro.medico.dados-bancario.index', $medico->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Medico $medico)
    {
        $arquivo = DadosBancario::where('id', $request->item_id)->where('medico_id', $medico->id)->first();

        if ($arquivo) {
            $arquivo->update(["ativo" => "N"]);
        }

        return redirect()->route('cadastro.medico.dados-bancario.index', $medico->id);
    }
}
