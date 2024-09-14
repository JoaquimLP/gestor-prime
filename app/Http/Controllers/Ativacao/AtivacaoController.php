<?php

namespace App\Http\Controllers\Ativacao;

use App\Http\Controllers\Controller;
use App\Http\Requests\Configuracao\Empresa\StoreEmpresaRequest;
use App\Models\Admin\Configuracao\Empresa;
use App\Models\Admin\Configuracao\Pacote;
use App\Models\Admin\Configuracao\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AtivacaoController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if($user->root == 0) {
            abort(403);
        }

        return view("ativacao.empresa.index");
    }

        /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        if($user->root == 0) {
            abort(403);
        }

        return view("ativacao.empresa.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmpresaRequest $request)
    {
        $user = Auth::user();

        if($user->root == 0) {
            abort(403);
        }

        do {
            $token = str()->random(50);
        } while (Empresa::where("token", $token)->exists());

        $request = $request->merge([
            "cep" =>  preg_replace("/[^0-9]/", "", $request->cep),
            "celular" =>  preg_replace("/[^0-9]/", "", $request->celular),
            "cnpj" =>  preg_replace("/[^0-9]/", "", $request->cnpj),
            "celular_resp" =>  preg_replace("/[^0-9]/", "", $request->celular_resp),
            "data_nascimento_resp" =>  date_reverse_mask($request->data_nascimento_resp),
            "token" => $token,
            "tipo_empresa" => "M",
        ]);

        DB::transaction(function() use ($request){
            $empresa = Empresa::create($request->except(['logo', '_method', '_token']));
            $extension = $request->logo->getClientOriginalExtension();
            if(isset($request->logo)){
                $empresa->logo = $request->logo->storeAs('eskalamed/empresa/logo', $empresa->token . '.' . $extension, "s3");
            }

            $empresa->empresa_id = $empresa->id;
            $empresa->save();

            Pacote::create([
                'empresa_id' => $empresa->id,
                'qtd_empresa' => $request->qtd,
            ]);

            $user = User::create([
                "name" => $request->nome_resp,
                "celular" => $request->celular_resp,
                "data_nascimento" => $request->data_nascimento_resp,
                "email" => $request->email_resp,
                "password" => Hash::make($request->password),
                "admin" => 1
            ]);

            $user->empresas()->sync([$empresa->id]);
            return;
        });

        return redirect()->route("ativacao.empresa.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function alterar(Empresa $empresa)
    {
        $user = User::find(Auth::user()->id);
        $user->empresas()->sync([$empresa->id]);

        return redirect()->route("dashboard");
    }

}
