<?php

namespace App\Service\Cadastro;

class MedicoService
{
    public function listEstadoCivil(): array
    {
        return [
            ["id" => "C", "name" => "Casado"],
            ["id" => "S", "name" => "Solteiro"],
            ["id" => "D", "name" => "Divorciado"],
            ["id" => "V", "name" => "Viuvo"],
            ["id" => "N", "name" => "Não informado"],
        ];
    }

    public function listTipoContato(): array
    {
        return [
            ["id" => "E", "name" => "Email"],
            ["id" => "T", "name" => "Telefone"],
            ["id" => "O", "name" => "Outro"],
        ];
    }
}
