<?php

namespace App\Http\Controllers\Admin\Cadastro\Medico;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cadastro\Medico\ContratoRequest;
use App\Models\Admin\Cadastro\Contrato;
use App\Models\Admin\Cadastro\Documento;
use App\Models\Admin\Cadastro\Especialidade;
use App\Models\Admin\Cadastro\Medico;
use App\Models\Admin\Cadastro\UnidadeAtendimento;
use App\Service\Cadastro\MedicoService;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Spatie\Browsershot\Browsershot;
use Wnx\SidecarBrowsershot\BrowsershotLambda;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Medico $medico)
    {
        $contratos = $medico->contratos;

        return view("admin.cadastro.medico.contrato.index", compact('contratos', 'medico'));
    }

    /**
     * Display a listing of the resource.
     */
    public function create(Medico $medico)
    {
        $especialidades = Especialidade::where('ativo', 'S')->orderBy('nome', 'DESC')->get();
        $unidades = UnidadeAtendimento::where('ativo', 'S')->orderBy('nome', 'DESC')->get();

        return view("admin.cadastro.medico.contrato.create", compact('medico', 'especialidades', 'unidades'));
    }

    /**
     * Display a listing of the resource. Cadastro\\Medico\\
     */
    public function store(ContratoRequest $request, Medico $medico)
    {
        DB::transaction(function () use ($request, $medico) {
            Contrato::create([
                'medico_id' => $medico->id,
                'descricao' => $request->descricao,
                'start_date' => date_reverse_mask($request->start_date),
                'end_date' => date_reverse_mask($request->end_date),
                'clausula_adicional'  => $request->clausula_adicional,
            ]);

            $medico->especialidades()->sync([$request->especialidade_id]);
            $medico->unidades()->sync([$request->unidade_atendimento_id]);
        });


        return redirect()->route('cadastro.medico.contrato.index', $medico->id);
    }

    public function gerar(Medico $medico, Contrato $contrato)
    {

        $empresaIds = $medico->unidades->first()->gestaoContrato->pluck('empresa_id')->toArray();

        $documentos = Documento::where('ativo', 'S')->whereIn('empresa_id', $empresaIds)->get();

        return view("admin.cadastro.medico.contrato.gerar-contrato", compact('documentos', 'contrato', 'medico'));
    }

    public function uploadPdf(Medico $medico, Contrato $contrato)
    {

        $documentos = Documento::where('ativo', 'S')->get();

        return view("admin.cadastro.medico.contrato.upload-contrato", compact('documentos', 'contrato', 'medico'));
    }

    public function savePdf(Request $request, Medico $medico, Contrato $contrato)
    {
        if (isset($request->path)) {
            $extension = $request->path->getClientOriginalExtension();

            $contrato->update([
                "situacao" => "A",
                "path" => $request->path->storeAs('eskalamed/documentos/assinado/' . $medico->id . '/' . $contrato->id, time() . '.' . $extension, "s3"),
            ]);
        }

        return redirect()->route('cadastro.medico.contrato.index', $medico->id);
    }

    public function documentoPdf(Medico $medico, Contrato $contrato, Documento $documento)
    {
        $pdf = Pdf::loadView('admin.cadastro.medico.contrato.contrato-pdf', ['medico' => $medico, 'contrato' => $contrato, 'documento' => $documento]);

        return $pdf->set_option('isRemoteEnabled', true)->stream('contrato-' . $medico->id . '.pdf');
    }
}
