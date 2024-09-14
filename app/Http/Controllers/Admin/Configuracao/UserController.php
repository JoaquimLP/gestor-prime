<?php

namespace App\Http\Controllers\Admin\Configuracao;

use App\Http\Controllers\Controller;
use App\Http\Requests\Configuracao\Usuario\StoreUserRequest;
use App\Http\Requests\Configuracao\Usuario\UpdateUserRequest;
use App\Models\Admin\Configuracao\Empresa;
use App\Models\Admin\Configuracao\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.configuracao.usuario.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresas = Empresa::where('ativo', 'S')->empresa()->get();
        return view("admin.configuracao.usuario.create", compact("empresas"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $request = $request->merge([
            "celular" =>  preg_replace("/[^0-9]/", "", $request->celular),
            "data_nascimento" =>  date_reverse_mask($request->data_nascimento),
        ]);

        //

        DB::transaction(function() use ($request){

            $request = $request->merge([
                "password" =>  Hash::make($request->password),
            ]);

            $user = User::create($request->all());
            $user->empresas()->sync($request->empresa_id);
        });

        return redirect()->route("configuracao.usuario.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $empresas = Empresa::where('ativo', 'S')->empresa()->get();
        return view("admin.configuracao.usuario.edit", compact("empresas", "user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $request = $request->merge([
            "celular" =>  preg_replace("/[^0-9]/", "", $request->celular),
            "data_nascimento" =>  date_reverse_mask($request->data_nascimento),
        ]);


        DB::transaction(function() use ($request, $user){

            $user->name = $request->name;
            $user->celular = $request->celular;
            $user->email = $request->email;
            $user->data_nascimento = $request->data_nascimento;

            if(!empty($request->password)) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            $user->empresas()->sync($request->empresa_id);
        });

        return redirect()->route("configuracao.usuario.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->update(["ativo" => "N"]);

        return redirect()->route("configuracao.usuario.index");
    }
}
