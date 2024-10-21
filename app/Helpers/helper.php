<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

if (! function_exists('limit')) {
    function limit($string = "", $limit = 100)
    {
        return \Illuminate\Support\Str::limit($string, $limit, $end='...');
    }
}

if (! function_exists('getEndereco')) {
    function getEndereco($collect)
    {
        $endereco = "";
        $endereco .= $collect->logradouro ? $collect->logradouro : "não informado";
        $endereco .= $collect->numero ? " nº " . $collect->numero : "não informado";
        $endereco .= $collect->bairro_desc ? " - " . $collect->bairro_desc : "não informado";
        $endereco .= $collect->cidade_desc ? " - " . $collect->cidade_desc : "não informado";
        $endereco .= $collect->uf ? "/" . $collect->uf : "não informado";
        $endereco .= $collect->cep ? " - CEP " . mask_cep($collect->cep) : "não informado";

        return $endereco;
    }
}

if (! function_exists('mask_cep')) {
    function mask_cep($cep = null)
    {
        $maskared = '';
        $k = 0;
        $mask = "#####-###";

        if(isset($cep)) {

            for ($i = 0; $i <= strlen($mask) - 1; ++$i) {
                if ($mask[$i] == '#') {
                    if (isset($cep[$k])) {
                        $maskared .= $cep[$k++];
                    }
                } else {
                    if (isset($mask[$i])) {
                        $maskared .= $mask[$i];
                    }
                }
            }
        }
        return strtoupper($maskared);
    }
}

if (! function_exists('mask_rg')) {
    function mask_rg($rg = null)
    {
        $maskared = '';
        $k = 0;
        $mask = "##.###.###-#";

        if(isset($rg)) {

            for ($i = 0; $i <= strlen($mask) - 1; ++$i) {
                if ($mask[$i] == '#') {
                    if (isset($rg[$k])) {
                        $maskared .= $rg[$k++];
                    }
                } else {
                    if (isset($mask[$i])) {
                        $maskared .= $mask[$i];
                    }
                }
            }
        }
        return strtoupper($maskared);
    }
}

if (! function_exists('mask_cpf')) {
    function mask_cpf($rg = null)
    {
        $maskared = '';
        $k = 0;
        $mask = "##.###.###-#";

        if(isset($rg)) {

            for ($i = 0; $i <= strlen($mask) - 1; ++$i) {
                if ($mask[$i] == '#') {
                    if (isset($rg[$k])) {
                        $maskared .= $rg[$k++];
                    }
                } else {
                    if (isset($mask[$i])) {
                        $maskared .= $mask[$i];
                    }
                }
            }
        }
        return strtoupper($maskared);
    }
}

if (! function_exists('mask_cnpj')) {
    function mask_cnpj($cnpj = null)
    {
        $maskared = '';
        $k = 0;
        $mask = "##.###.###/####-##";

        if(isset($cnpj)) {

            for ($i = 0; $i <= strlen($mask) - 1; ++$i) {
                if ($mask[$i] == '#') {
                    if (isset($cnpj[$k])) {
                        $maskared .= $cnpj[$k++];
                    }
                } else {
                    if (isset($mask[$i])) {
                        $maskared .= $mask[$i];
                    }
                }
            }
        }
        return strtoupper($maskared);
    }
}

if (! function_exists('mask_celular')) {
    function mask_celular($celular = null)
    {
        $maskared = '';
        $k = 0;
        $mask = "(##) # ####-####";

        if(isset($celular)) {

            for ($i = 0; $i <= strlen($mask) - 1; ++$i) {
                if ($mask[$i] == '#') {
                    if (isset($celular[$k])) {
                        $maskared .= $celular[$k++];
                    }
                } else {
                    if (isset($mask[$i])) {
                        $maskared .= $mask[$i];
                    }
                }
            }
        }
        return strtoupper($maskared);
    }
}

if (! function_exists('route_cadastro')) {
    function route_cadastro($route_name = null)
    {
        $active = "{ isActive: false, open: false }";
        if($route_name) {
            if(str_contains($route_name, 'cadastro')) {
                $active = "{ isActive: true, open: true }";
            }
        }

        return $active;
    }
}

if (! function_exists('route_configuracao')) {
    function route_configuracao($route_name = null)
    {
        $active = "{ isActive: false, open: false }";
        if($route_name) {
            if(str_contains($route_name, 'configuracao')) {
                $active = "{ isActive: true, open: true }";
            }
        }

        return $active;
    }
}

if (! function_exists('convert_to_collect')) {
    function convert_to_collect($array = [])
    {

        return collect(json_decode(json_encode($array)));
    }
}

if (! function_exists('temporary_url_foto')) {
    function temporary_url_foto($file_path = null)
    {
        $path = "";
        if($file_path) {

            $path = Storage::disk('s3')->temporaryUrl(
                str_replace('https://prod-delta-system.s3.us-east-2.amazonaws.com/', '', $file_path),
                now()->addHour(),
            );
        }

        return $path;
    }
}

if (! function_exists('date_extension')) {
    function date_extension()
    {
        $date = Carbon::now();

        $dia = $date->translatedFormat('d');
        $mes = $date->translatedFormat('F');
        $ano = $date->translatedFormat('Y');

        $data = $dia . ' de ' . $mes . ' de ' . $ano;

        return $data;
    }
}

if (! function_exists('date_reverse_mask')) {
    function date_reverse_mask($date)
    {
        return \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    }
}

if (! function_exists('date_mask')) {
    function date_mask($date)
    {
        $date =  \Carbon\Carbon::parse($date);
        return $date->format( 'd/m/Y' );
    }
}

if (! function_exists('situacao_contrato')) {
    function situacao_contrato($status_id = null)
    {
        $status = "OK";

        if($status_id) {

            switch ($status_id) {
                case 'P':
                    $status = "Pendente";
                    break;
                case 'A':
                    $status = "Assinado";
                    break;
                case 'R':
                    $status = "Recusado";
                    break;
                case 'C':
                    $status = "Cancelado";
                    break;
            }

        }

        return $status;
    }
}

if (! function_exists('date_mask')) {
    function date_mask($date)
    {

        $date = new DateTime( $date );
        return $date->format( 'd/m/Y' );
    }
}
