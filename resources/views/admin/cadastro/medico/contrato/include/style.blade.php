<style>
    /* Estilos Gerais */
    body {
        font-family: Arial, sans-serif;
        margin-top: 50px;
        color: #333;
        line-height: 1.6;
    }

    /* Títulos */
    h1,
    h2,
    h3 {
        color: #2C3E50;
        font-weight: bold;
    }

    /* Subtítulos */
    h2 {
        font-size: 20px;
        margin-top: 20px;
        border-bottom: 2px solid #BDC3C7;
        padding-bottom: 5px;
    }

    /* Sub-subtítulos */
    h3 {
        font-size: 18px;
        margin-top: 150px;
        border-bottom: 1px solid #BDC3C7;
        padding-bottom: 5px;
    }

    /* Parágrafos */
    p {
        margin: 10px 0;
    }

    /* Listas */
    ul,
    ol {
        margin: 10px 0 10px 20px;
    }

    /* Tabelas */
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    th,
    td {
        border: 1px solid #BDC3C7;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #ECF0F1;
        font-weight: bold;
    }

    td {
        background-color: #FAFAFA;
    }

    .page-break {
        page-break-after: always;
    }

    /* Cabeçalho */

    header {
        position: fixed;
        top: -50px;
        left: 0px;
        right: 0px;
        height: 80px;

        /** Extra personal styles **/
        width: 100%;
        margin-bottom: -100px;
        z-index: 1000;
    }

    .header-content {
        margin: 0 2px !important;
        display: flex;
        justify-content: space-between;
    }

    .logo {
        display: flex;
        margin: 20px;
    }

    .header-text {
        text-align: center;
        margin-top: -70px;
        margin-left: 120px;
        width: 500px;
    }


    .header-text h1 {
        margin: 0;
        font-size: 15px;
        color: #2C3E50;
        text-align: center;
    }

    /* Rodapé */
    footer {
        margin-top: 30px;
        width: 100%;
    }

    .div-local {
        position: absolute;
        display: flex;
        justify-content: flex-end;
        right: 10px;
    }

    footer .div-assinatura {
        margin-top: 100px;
        padding: 0;
    }

    footer .div-assinatura .div-left {
        background-color: #333;
        color: #FAFAFA;
        width: 10px;
    }

    footer .div-assinatura .div-right {
        background-color: #cd1212;
        color: #FAFAFA;
        width: 10px;
    }


    .page-break {
        page-break-after: always;
    }
</style>
