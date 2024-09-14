<?php

namespace App\Service\Contrato;

use App\Models\Admin\Cadastro\Contrato;
use App\Models\Admin\Cadastro\Documento;
use App\Models\Admin\Cadastro\Medico;

final class ContratoService
{
    public function __construct(
        public Documento $documento,
        public Medico $medico
    ){}

    public function convertContrato()
    {
        $contrato = $this->documento->contrato;

        $medico_nome = isset($this->medico->nome) ? $this->medico->nome : "";
        $medico_rg = isset($this->medico->rg) ? mask_rg($this->medico->rg) : "";
        $medico_cpf = isset($this->medico->cpf) ? mask_cpf($this->medico->cpf) : "";
        $medico_crm = isset($this->medico->crm) ? $this->medico->crm : "";
        $medico_rqe = isset($this->medico->rqe) ? $this->medico->rqe : "";
        $medico_uf = isset($this->medico->uf) ? $this->medico->uf : "";
        $medico_cidade = isset($this->medico->cidade_desc) ? $this->medico->cidade_desc : "";
        $medico_logradoro = isset($this->medico->cidade_desc) ? $this->medico->cidade_desc : "";
        $medico_cep = isset($this->medico->cep) ? mask_cep($this->medico->cep) : "";

        $contrato = str_replace("{medico_nome}", $medico_nome, $contrato);
        $contrato = str_replace("{medico_rg}", $medico_rg, $contrato);
        $contrato = str_replace("{medico_cpf}", $medico_cpf, $contrato);
        $contrato = str_replace("{medico_crm}", $medico_crm, $contrato);
        $contrato = str_replace("{medico_rqe}", $medico_rqe, $contrato);
        $contrato = str_replace("{medico_cidade}", $medico_cidade, $contrato);
        $contrato = str_replace("{medico_uf}", $medico_uf, $contrato);
        $contrato = str_replace("{medico_endereco}", $medico_logradoro, $contrato);
        $contrato = str_replace("{medico_cep}", $medico_cep, $contrato);
        $contrato = str_replace("{quebra_de_pagina}", '<div class="page-break"></div>', $contrato);

        return $contrato;
    }
}
