<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Contrato</title>
    @include('admin.cadastro.medico.contrato.include.style')
</head>

<body>
    <header>
        <div class="header-content">
            <img src="https://config-delta-prog.s3.us-east-2.amazonaws.com/delta-system-pedidos/img/log_login.png" height="50" width="70" class="logo" />
            <div class="header-text" style="margin-bottom: 1000px">
                <h1>{{ $documento->descricao }}</h1>
            </div>
        </div>
    </header>

    <main>
        <x-contrato.contrato-component :documento="$documento" :medico="$medico" />
        @if (isset($contrato->clausula_adicional))
            {!! $contrato->clausula_adicional !!}
        @endif
    </main>
    <footer>
        <div class="div-local">
            <p>Bocaiuva do Sul, {{ date_extension() }}.</p>
        </div>
        <div class="div-assinatura">
            <table style="background-color: #FFF; padding: 0px;border-spacing: 0;">
                <tbody style="border: none; background-color: #FFF; padding: 0px; height: 2px;">
                    <tr style="border: none; background-color: #FFF; padding: 0px; height: 2px;">
                        <td style="border: none; background-color: #FFF; text-align: center; padding-top: 0; margin: 0px;">
                            ______________________________________
                        </td>
                        <td style="border: none; background-color: #FFF; text-align: center; padding-top: 0; margin: 0px; ">
                            ______________________________________
                        </td>
                    </tr>
                    <tr style="border: none; background-color: #FFF;  padding: 0px;">
                        <td rowspan="2"  VALIGN="TOP" style="border: none; background-color: #FFF; padding-top: 0; text-align: center; margin: 0px; font-size: 15px;">
                            FECON SERVIÇOS MÉDICOS LTDA. SÓCIO OSTENSIVO
                        </td>
                        <td rowspan="2"  VALIGN="TOP" style="border: none; background-color: #FFF;  padding-top: 0; text-align: center; margin: 0px; font-size: 15px;">
                            {{ $medico->nome }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </footer>

    <script type="text/php">

        if ( isset($pdf) ) {

          $font = Font_Metrics::get_font("helvetica", "bold");
          $pdf->page_text(280, 780, "Page {PAGE_NUM} of {PAGE_COUNT}", $font, 10, array(0,0,0));

        }
    </script>
</body>

</html>
