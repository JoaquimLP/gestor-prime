<?php

use App\Http\Controllers\Admin\Cadastro\DocumentosController as CadastroDocumentosController;
use App\Http\Controllers\Admin\Cadastro\EspecialidadeController;
use App\Http\Controllers\Admin\Cadastro\Medico\ContatoEmergenciaController;
use App\Http\Controllers\Admin\Cadastro\Medico\ContratoController;
use App\Http\Controllers\Admin\Cadastro\Medico\DadosBancarioController;
use App\Http\Controllers\Admin\Cadastro\Medico\DocumentosController;
use App\Http\Controllers\Admin\Cadastro\MedicoController;
use App\Http\Controllers\Admin\Cadastro\UnidadeAtendimentoController;
use App\Http\Controllers\Admin\Configuracao\EmpresaController;
use App\Http\Controllers\Admin\Configuracao\GestaoContratoController;
use App\Http\Controllers\Admin\Configuracao\UserController;
use App\Http\Controllers\Ativacao\AtivacaoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('ativacao')->group(function () {
        Route::get('/empresa', [AtivacaoController::class, 'index'])->name('ativacao.empresa.index');
        Route::get('/empresa/cadastro', [AtivacaoController::class, 'create'])->name('ativacao.empresa.create');
        Route::post('/empresa/salvar', [AtivacaoController::class, 'store'])->name('ativacao.empresa.store');
        Route::get('/empresa/editar/{empresa}', [AtivacaoController::class, 'edit'])->name('ativacao.empresa.edit');
        Route::put('/empresa/update/{empresa}', [AtivacaoController::class, 'update'])->name('ativacao.empresa.update');
        Route::get('/empresa/excluir/{empresa}', [AtivacaoController::class, 'destroy'])->name('ativacao.empresa.destroy');
        Route::get('/empresa/alterar/{empresa}', [AtivacaoController::class, 'alterar'])->name('ativacao.empresa.alterar');
    });

    Route::prefix('configuracao')->group(function () {

        // Empresa
        Route::get('/empresa', [EmpresaController::class, 'index'])->name('configuracao.empresa.index');
        Route::get('/empresa/cadastro', [EmpresaController::class, 'create'])->name('configuracao.empresa.create');
        Route::post('/empresa/salvar', [EmpresaController::class, 'store'])->name('configuracao.empresa.store');
        Route::get('/empresa/editar/{empresa}', [EmpresaController::class, 'edit'])->name('configuracao.empresa.edit');
        Route::put('/empresa/update/{empresa}', [EmpresaController::class, 'update'])->name('configuracao.empresa.update');
        Route::get('/empresa/excluir/{empresa}', [EmpresaController::class, 'destroy'])->name('configuracao.empresa.destroy');

        // usuário
        Route::get('/usuario', [UserController::class, 'index'])->name('configuracao.usuario.index');
        Route::get('/usuario/cadastro', [UserController::class, 'create'])->name('configuracao.usuario.create');
        Route::post('/usuario/salvar', [UserController::class, 'store'])->name('configuracao.usuario.store');
        Route::get('/usuario/editar/{user}', [UserController::class, 'edit'])->name('configuracao.usuario.edit');
        Route::put('/usuario/update/{user}', [UserController::class, 'update'])->name('configuracao.usuario.update');
        Route::get('/usuario/excluir/{user}', [UserController::class, 'destroy'])->name('configuracao.usuario.destroy');

        // Gestão de Contrato
        Route::get('/gestao-contrato', [GestaoContratoController::class, 'index'])->name('configuracao.gestao-contrato.index');
        Route::get('/gestao-contrato/cadastro', [GestaoContratoController::class, 'create'])->name('configuracao.gestao-contrato.create');
        Route::post('/gestao-contrato/salvar', [GestaoContratoController::class, 'store'])->name('configuracao.gestao-contrato.store');
        Route::get('/gestao-contrato/editar/{gestaoContrato}', [GestaoContratoController::class, 'edit'])->name('configuracao.gestao-contrato.edit');
        Route::put('/gestao-contrato/update/{gestaoContrato}', [GestaoContratoController::class, 'update'])->name('configuracao.gestao-contrato.update');
        Route::get('/gestao-contrato/excluir/{gestaoContrato}', [GestaoContratoController::class, 'destroy'])->name('configuracao.gestao-contrato.destroy');
    });

    Route::prefix('cadastro')->group(function () {

        // Especialidade
        Route::get('/especialidade', [EspecialidadeController::class, 'index'])->name('cadastro.especialidade.index');
        Route::get('/especialidade/cadastro', [EspecialidadeController::class, 'create'])->name('cadastro.especialidade.create');
        Route::post('/especialidade/salvar', [EspecialidadeController::class, 'store'])->name('cadastro.especialidade.store');
        Route::get('/especialidade/editar/{especialidade}', [EspecialidadeController::class, 'edit'])->name('cadastro.especialidade.edit');
        Route::put('/especialidade/update/{especialidade}', [EspecialidadeController::class, 'update'])->name('cadastro.especialidade.update');
        Route::get('/especialidade/excluir/{especialidade}', [EspecialidadeController::class, 'destroy'])->name('cadastro.especialidade.destroy');

        // Unidade Atendimento
        Route::get('/unidade-atendimento', [UnidadeAtendimentoController::class, 'index'])->name('cadastro.unidade-atendimento.index');
        Route::get('/unidade-atendimento/cadastro', [UnidadeAtendimentoController::class, 'create'])->name('cadastro.unidade-atendimento.create');
        Route::post('/unidade-atendimento/salvar', [UnidadeAtendimentoController::class, 'store'])->name('cadastro.unidade-atendimento.store');
        Route::get('/unidade-atendimento/editar/{unidadeAtendimento}', [UnidadeAtendimentoController::class, 'edit'])->name('cadastro.unidade-atendimento.edit');
        Route::put('/unidade-atendimento/update/{unidadeAtendimento}', [UnidadeAtendimentoController::class, 'update'])->name('cadastro.unidade-atendimento.update');
        Route::get('/unidade-atendimento/excluir/{unidadeAtendimento}', [UnidadeAtendimentoController::class, 'destroy'])->name('cadastro.unidade-atendimento.destroy');

        // Documentos
        Route::get('/documento', [CadastroDocumentosController::class, 'index'])->name('cadastro.documento.index');
        Route::get('/documento/cadastro', [CadastroDocumentosController::class, 'create'])->name('cadastro.documento.create');
        Route::post('/documento/salvar', [CadastroDocumentosController::class, 'store'])->name('cadastro.documento.store');
        Route::get('/documento/editar/{documento}', [CadastroDocumentosController::class, 'edit'])->name('cadastro.documento.edit');
        Route::put('/documento/update/{documento}', [CadastroDocumentosController::class, 'update'])->name('cadastro.documento.update');
        Route::get('/documento/excluir/{documento}', [CadastroDocumentosController::class, 'destroy'])->name('cadastro.documento.destroy');

        // Unidade Atendimento
        Route::get('/medico', [MedicoController::class, 'index'])->name('cadastro.medico.index');
        Route::get('/medico/cadastro', [MedicoController::class, 'create'])->name('cadastro.medico.create');
        Route::post('/medico/salvar', [MedicoController::class, 'store'])->name('cadastro.medico.store');
        Route::get('/medico/editar/{medico}', [MedicoController::class, 'edit'])->name('cadastro.medico.edit');
        Route::put('/medico/update/{medico}', [MedicoController::class, 'update'])->name('cadastro.medico.update');
        Route::get('/medico/excluir/{medico}', [MedicoController::class, 'destroy'])->name('cadastro.medico.destroy');

        Route::get('/medico/documentos/{medico}', [DocumentosController::class, 'index'])->name('cadastro.medico.documentos.index');
        Route::get('/medico/documentos/{medico}/create', [DocumentosController::class, 'create'])->name('cadastro.medico.documentos.create');
        Route::post('/medico/documentos/{medico}/salvar', [DocumentosController::class, 'store'])->name('cadastro.medico.documentos.store');
        Route::get('/medico/documentos/{medico}/excluir', [DocumentosController::class, 'destroy'])->name('cadastro.medico.documentos.destroy');

        Route::get('/medico/contato-emergencia/{medico}', [ContatoEmergenciaController::class, 'index'])->name('cadastro.medico.contato-emergencia.index');
        Route::get('/medico/contato-emergencia/{medico}/create', [ContatoEmergenciaController::class, 'create'])->name('cadastro.medico.contato-emergencia.create');
        Route::post('/medico/contato-emergencia/{medico}/salvar', [ContatoEmergenciaController::class, 'store'])->name('cadastro.medico.contato-emergencia.store');
        Route::get('/medico/contato-emergencia/{medico}/excluir', [ContatoEmergenciaController::class, 'destroy'])->name('cadastro.medico.contato-emergencia.destroy');

        Route::get('/medico/dados-bancario/{medico}', [DadosBancarioController::class, 'index'])->name('cadastro.medico.dados-bancario.index');
        Route::get('/medico/dados-bancario/{medico}/create', [DadosBancarioController::class, 'create'])->name('cadastro.medico.dados-bancario.create');
        Route::post('/medico/dados-bancario/{medico}/salvar', [DadosBancarioController::class, 'store'])->name('cadastro.medico.dados-bancario.store');
        Route::get('/medico/dados-bancario/{medico}/excluir', [DadosBancarioController::class, 'destroy'])->name('cadastro.medico.dados-bancario.destroy');

        Route::get('/medico/contrato/{medico}', [ContratoController::class, 'index'])->name('cadastro.medico.contrato.index');
        Route::get('/medico/contrato/{medico}/create', [ContratoController::class, 'create'])->name('cadastro.medico.contrato.create');
        Route::post('/medico/contrato/{medico}/salvar', [ContratoController::class, 'store'])->name('cadastro.medico.contrato.store');
        Route::get('/medico/gerar-contrato/{medico}/{contrato}/upload', [ContratoController::class, 'uploadPdf'])->name('cadastro.medico.contrato.gerar.upload-pdf');
        Route::post('/medico/gerar-contrato/{medico}/{contrato}/upload/save', [ContratoController::class, 'savePdf'])->name('cadastro.medico.contrato.gerar.save-pdf');
        Route::get('/medico/gerar-contrato/{medico}/{contrato}', [ContratoController::class, 'gerar'])->name('cadastro.medico.contrato.gerar');
        Route::get('/medico/gerar-contrato/{medico}/{contrato}/{documento}', [ContratoController::class, 'documentoPdf'])->name('cadastro.medico.contrato.gerar.documento-pdf');
    });
});

require __DIR__ . '/auth.php';
