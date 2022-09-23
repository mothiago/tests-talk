<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>Comprovante de Inscri&ccedil;&atilde;o e de Situa&ccedil;&atilde;o Cadastral</title>
</head>
<style>
    @font-face {
        font-family: Arial;
        src: url(data:font/truetype;charset=utf-8;base64,{{ file_get_contents(resource_path('fonts/arialbd.txt')) }}) format('truetype');
        font-weight: 700;
        font-style: normal;
    }

    @font-face {
        font-family: Arial;
        src: url(data:font/truetype;charset=utf-8;base64,{{ file_get_contents(resource_path('fonts/arial.txt')) }}) format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    * {
        margin: 0;
        padding: 0;
    }

    td > p {
        margin: 0;
        padding: 0;
    }

    table {
        border-collapse: collapse;
        border-spacing: 0;
    }
    td,
    th {
        padding: 0;
        margin: 0;
        border-spacing: 0;
    }

    p {
        margin: 0 0 10px;
    }

    font {
        line-height: 0;
        vertical-align: 4px;
    }

    table > thead:first-child > tr:first-child > th,
    table > thead:first-child > tr:first-child > td {
        border-top: 0 !important;
    }

    .comprovante {
        width: 100% !important;
        margin: 0;
        padding: 0;
        line-height: 0;
        text-align-all: start;
    }
</style>
<body>

<div id="app">

    <div class="container content-wrapper">

        <div class="conteudo">

            <div class="row">

                <div class="col-md-12 content">

                    <div class="row">
                        <div class="col-md-12">

                            <div id="principal">
                                <table border="1" cellspacing="0" style="width:17cm;	line-height: 9pt;">
                                    <tbody>
                                    <tr>
                                        <td style="border:solid 1pt; padding:5.65pt 5.65pt 5.65pt 5.65pt">

                                            <table border="0" width="100%" style="line-height: 9pt;">
                                                <tbody>
                                                <tr>
                                                    <td valign="middle" align="left" width="60" height="60">
                                                        <img width="60" height="60"
                                                             style="margin-left: 3px; margin-top: 2px;"
                                                             src="https://servicos.receita.fazenda.gov.br/servicos/cnpjreva/images/brasao2.gif"
                                                             alt="Bras&atilde;o" border="0">
                                                    </td>

                                                    <td align="center">

                                                        <p style="margin:0cm; margin-bottom:6px;">&nbsp;</p>

                                                        <font face="Arial" size="4">
                                                            <b>
                                                                REP&Uacute;BLICA FEDERATIVA DO BRASIL
                                                            </b>
                                                        </font>

                                                        <p style="margin:0cm; margin-bottom:0pt;">&nbsp;</p>
                                                        <p style="margin:0cm; margin-bottom:0pt;">&nbsp;</p>
                                                        <p style="margin:0cm; margin-bottom:0pt;">&nbsp;</p>

                                                        <font face="Arial">
                                                            <b>
                                                                CADASTRO NACIONAL DA PESSOA JUR&Iacute;DICA
                                                            </b>
                                                        </font>

                                                        <p style="margin:0cm; margin-bottom:0pt;">&nbsp;</p>

                                                    </td>
                                                    <td valign="middle" align="left" width="60" height="60"></td>
                                                </tr>
                                                </tbody>
                                            </table>

                                            <p style="margin:0cm; margin-bottom:0pt;">&nbsp;</p>

                                            <table border="1" width="100%" style="BORDER-COLLAPSE: collapse;">
                                                <tbody>
                                                <tr>

                                                    <td width="24%" class="td-conteudo" valign="top" border="1"
                                                        style=" border-right: 1pt solid; border-top: 1pt solid; border-left: 1pt solid; border-bottom: 1pt solid; padding-left: 3.5pt; padding-bottom: 2pt;">

                                                        <font style="font-size: 6pt; line-height: 0;" class="title">
                                                            N&Uacute;MERO DE INSCRI&Ccedil;&Atilde;O
                                                        </font>

                                                        <br>

                                                        <font style="font-size: 8pt; line-height: 0;">
                                                            <b>{{$cartaoCnpj->getCnpjComMascara()}}</b><br>
                                                            <b>MATRIZ</b>
                                                        </font>
                                                        <br>
                                                    </td>

                                                    <td width="52%" valign="center"
                                                        style=" BORDER-RIGHT: 1pt solid; BORDER-TOP:  1pt solid; BORDER-LEFT: medium none; BORDER-BOTTOM: 1pt solid; PADDING-LEFT: 3.5pt; padding-bottom: 2pt; text-align: center; ">

                                                        <font face="Arial" style="font-size: 10pt;" class="comprovante">
                                                            <b style="line-height: 15px; width:100%">
                                                                COMPROVANTE DE INSCRI&Ccedil;&Atilde;O E DE SITUA&Ccedil;&Atilde;O
                                                                CADASTRAL
                                                            </b>
                                                        </font>

                                                    </td>

                                                    <td width="24%" valign="top"
                                                        style=" BORDER-RIGHT: 1pt solid; BORDER-TOP: 1pt solid; BORDER-LEFT: 1pt solid; BORDER-BOTTOM: 1pt solid; PADDING-LEFT: 3.5pt; padding-bottom: 2pt; ">

                                                        <font face="Arial" style="font-size: 6pt" class="title">
                                                            DATA DE ABERTURA
                                                        </font>

                                                        <br>

                                                        <font face="Arial" style="font-size: 8pt">
                                                            <b>{{$cartaoCnpj->getDataAbertura()}}</b>
                                                        </font>

                                                        <br>
                                                    </td>

                                                </tr>
                                                </tbody>
                                            </table>

                                            <p style="margin:0cm; margin-bottom:0pt;">&nbsp;</p>

                                            <table border="1" width="100%" style=" BORDER-COLLAPSE: collapse; ">


                                                <tbody>
                                                <tr>


                                                    <td width="100%" valign="top"
                                                        style=" BORDER-RIGHT: 1pt solid; BORDER-TOP: 1pt solid; BORDER-LEFT: 1pt solid; BORDER-BOTTOM: 1pt solid; PADDING-LEFT: 3.5pt; padding-bottom: 2pt; ">

                                                        <font face="Arial" style="font-size: 6pt" class="title">
                                                            NOME EMPRESARIAL
                                                        </font>

                                                        <br>

                                                        <font face="Arial" style="font-size: 8pt">
                                                            <b>{{$cartaoCnpj->getNomeEmpresarial()}}</b>
                                                        </font>

                                                        <br>

                                                    </td>

                                                </tr>

                                                </tbody>
                                            </table>

                                            <p style="margin:0cm; margin-bottom:0pt;">&nbsp;</p>

                                            <table border="0" width="100%" style=" BORDER-COLLAPSE: collapse; ">

                                                <tbody>
                                                <tr>

                                                    <td width="88%" valign="top"
                                                        style=" BORDER-RIGHT: 1pt solid; BORDER-TOP: 1pt solid; BORDER-LEFT: 1pt solid; BORDER-BOTTOM: 1pt solid; PADDING-LEFT: 3.5pt; padding-bottom: 2pt; width: 88%; "
                                                        class="title">
                                                        <font face="Arial" style="font-size: 6pt">
                                                            T&Iacute;TULO DO ESTABELECIMENTO (NOME DE FANTASIA)
                                                        </font>

                                                        <br>

                                                        <font face="Arial" style="font-size: 8pt">
                                                            <b> {{$cartaoCnpj->getNomeFantasia()}} </b>
                                                        </font>

                                                        <br>
                                                    </td>


                                                    <td width="2%" style="width: 2%; BORDER-RIGHT: 1pt solid;"></td>


                                                    <td width="10%" valign="top"
                                                        style=" BORDER-RIGHT: 1pt solid; BORDER-TOP: 1pt solid; BORDER-LEFT: 1pt solid; BORDER-BOTTOM: 1pt solid; PADDING-LEFT: 3.5pt; padding-bottom: 2pt; width: 10%; ">

                                                        <font face="Arial" style="font-size: 6pt" class="title">
                                                            PORTE
                                                        </font>

                                                        <br>

                                                        <font face="Arial" style="font-size: 8pt">
                                                            <b>{{$cartaoCnpj->getPorte()}}</b>
                                                        </font>

                                                        <br>
                                                    </td>


                                                </tr>

                                                </tbody>
                                            </table>

                                            <p style="margin:0cm; margin-bottom:0pt;">&nbsp;</p>

                                            <table border="1" width="100%" style=" BORDER-COLLAPSE: collapse; ">

                                                <tbody>
                                                <tr>

                                                    <td width="100%" valign="top"
                                                        style=" BORDER-RIGHT: 1pt solid; BORDER-TOP: 1pt solid; BORDER-LEFT: 1pt solid; BORDER-BOTTOM: 1pt solid; PADDING-LEFT: 3.5pt; padding-bottom: 2pt; ">

                                                        <font face="Arial" style="font-size: 6pt">
                                                            C&Oacute;DIGO E DESCRI&Ccedil;&Atilde;O DA ATIVIDADE ECON&Ocirc;MICA
                                                            PRINCIPAL
                                                        </font>

                                                        <br>

                                                        <font face="Arial" style="font-size: 8pt">
                                                            <b> {{html_entity_decode($cartaoCnpj->getCnaePrincipalComDescricao())}}</b>
                                                        </font>

                                                        <br>
                                                    </td>

                                                </tr>

                                                </tbody>
                                            </table>

                                            <p style="margin:0cm; margin-bottom:0pt;">&nbsp;</p>

                                            <table border="1" width="100%" style=" BORDER-COLLAPSE: collapse; ">

                                                <tbody>
                                                <tr>

                                                    <td width="100%" valign="top"
                                                        style=" BORDER-RIGHT: 1pt solid; BORDER-TOP: 1pt solid; BORDER-LEFT: 1pt solid; BORDER-BOTTOM: 1pt solid; PADDING-LEFT: 3.5pt; padding-bottom: 2pt; ">

                                                        <font face="Arial" style="font-size: 6pt">
                                                            C&Oacute;DIGO E DESCRI&Ccedil;&Atilde;O DAS ATIVIDADES ECON&Ocirc;MICAS
                                                            SECUND&Aacute;RIAS
                                                        </font>
                                                        <br>


                                                        <font face="Arial" style="font-size: 8pt">
                                                            <b>
                                                                @if(count($cartaoCnpj->getCnaeSecundariasComDescricao()) > 0)
                                                                    @foreach($cartaoCnpj->getCnaeSecundariasComDescricao() as $cnaeSecundaria)
                                                                        {{html_entity_decode($cnaeSecundaria)}} <br>
                                                                    @endforeach
                                                                @else
                                                                    N&atilde;o informada
                                                                @endif
                                                            </b>
                                                        </font>


                                                    </td>

                                                </tr>

                                                </tbody>
                                            </table>

                                            <p style="margin:0cm; margin-bottom:0pt;">&nbsp;</p>

                                            <table border="1" width="100%" style=" BORDER-COLLAPSE: collapse; ">

                                                <tbody>
                                                <tr>

                                                    <td width="100%" valign="top"
                                                        style=" BORDER-RIGHT: 1pt solid; BORDER-TOP: 1pt solid; BORDER-LEFT: 1pt solid; BORDER-BOTTOM: 1pt solid; PADDING-LEFT: 3.5pt; padding-bottom: 2pt; ">

                                                        <font face="Arial" style="font-size: 6pt">
                                                            C&Oacute;DIGO E DESCRI&Ccedil;&Atilde;O DA NATUREZA JUR&Iacute;DICA
                                                        </font>

                                                        <br>

                                                        <font face="Arial" style="font-size: 8pt">
                                                            <b>{{html_entity_decode($cartaoCnpj->getNaturezaJuridica())}}</b>
                                                        </font>

                                                        <br>
                                                    </td>

                                                </tr>

                                                </tbody>
                                            </table>

                                            <p style="margin:0cm; margin-bottom:0pt;">&nbsp;</p>

                                            <table border="0" width="100%" style=" BORDER-COLLAPSE: collapse; ">

                                                <tbody>
                                                <tr>

                                                    <td width="50%" valign="top"
                                                        style=" BORDER-RIGHT: 1pt solid; BORDER-TOP: 1pt solid; BORDER-LEFT: 1pt solid; BORDER-BOTTOM: 1pt solid; PADDING-LEFT: 3.5pt; padding-bottom: 2pt; ">

                                                        <font face="Arial" style="font-size: 6pt">
                                                            LOGRADOURO
                                                        </font>

                                                        <br>

                                                        <font face="Arial" style="font-size: 8pt">
                                                            <b>
                                                                {{
                                                                    !is_null($cartaoCnpj->getEndereco()) ?
                                                                    html_entity_decode($cartaoCnpj->getEndereco()['logradouro']) :
                                                                    ''
                                                                }}
                                                            </b>
                                                        </font>

                                                        <br>
                                                    </td>

                                                    <td
                                                        style="width:2%; border:0; BORDER-RIGHT: 1pt solid;"></td>

                                                    <td width="10%" valign="top"
                                                        style=" BORDER-RIGHT: 1pt solid; BORDER-TOP: 1pt solid; BORDER-LEFT: medium none; BORDER-BOTTOM: 1pt solid; PADDING-LEFT: 3.5pt; padding-bottom: 2pt; ">

                                                        <font face="Arial" style="font-size: 6pt">
                                                            N&Uacute;MERO
                                                        </font>

                                                        <br>

                                                        <font face="Arial" style="font-size: 8pt">
                                                            <b>
                                                                {{
                                                                   !is_null($cartaoCnpj->getEndereco()) ?
                                                                    html_entity_decode($cartaoCnpj->getEndereco()['numero']) :
                                                                    ''
                                                                }}
                                                            </b>
                                                        </font>

                                                        <br>
                                                    </td>

                                                    <td width="2%" border="0"
                                                        style="BORDER-RIGHT: 1pt solid; BORDER-COLLAPSE: collapse;"></td>

                                                    <td width="36%" valign="top"
                                                        style=" BORDER-RIGHT: 1pt solid; BORDER-TOP: 1pt solid; BORDER-LEFT: medium none; BORDER-BOTTOM: 1pt solid; PADDING-LEFT: 3.5pt; padding-bottom: 2pt; ">
                                                        <font face="Arial" style="font-size: 6pt">
                                                            COMPLEMENTO
                                                        </font>

                                                        <br>

                                                        <font face="Arial" style="font-size: 8pt">
                                                            <b>
                                                                {{
                                                                    !is_null($cartaoCnpj->getEndereco()) ?
                                                                    html_entity_decode($cartaoCnpj->getEndereco()['complemento']) :
                                                                    ''
                                                                }}
                                                            </b>
                                                        </font>

                                                        <br>
                                                    </td>

                                                </tr>

                                                </tbody>
                                            </table>

                                            <p style="margin:0cm; margin-bottom:0pt;">&nbsp;</p>

                                            <table border="0" width="100%" style=" BORDER-COLLAPSE: collapse; ">

                                                <tbody>
                                                <tr>

                                                    <td width="18%" valign="top"
                                                        style=" BORDER-RIGHT: 1pt solid; BORDER-TOP: 1pt solid; BORDER-LEFT: 1pt solid; BORDER-BOTTOM: 1pt solid; PADDING-LEFT: 3.5pt; padding-bottom: 2pt; ">
                                                        <font face="Arial" style="font-size: 6pt">
                                                            CEP
                                                        </font>

                                                        <br>

                                                        <font face="Arial" style="font-size: 8pt">
                                                            <b>
                                                                {{
                                                                    !is_null($cartaoCnpj->getEndereco()) ?
                                                                    $cartaoCnpj->getEndereco()['cep'] :
                                                                    ''
                                                                }}
                                                            </b>
                                                        </font>

                                                        <br>
                                                    </td>

                                                    <td width="2%" border="0"
                                                        style="BORDER-RIGHT: 1pt solid;"></td>

                                                    <td width="30%" valign="top"
                                                        style=" BORDER-RIGHT: 1pt solid; BORDER-TOP: 1pt solid; BORDER-LEFT: medium none; BORDER-BOTTOM: 1pt solid; PADDING-LEFT: 3.5pt; padding-bottom: 2pt; ">
                                                        <font face="Arial" style="font-size: 6pt">
                                                            BAIRRO/DISTRITO
                                                        </font>

                                                        <br>

                                                        <font face="Arial" style="font-size: 8pt">
                                                            <b>
                                                                {{
                                                                    !is_null($cartaoCnpj->getEndereco()) ?
                                                                    html_entity_decode($cartaoCnpj->getEndereco()['bairro']) :
                                                                    ''
                                                                }}
                                                            </b>
                                                        </font>

                                                        <br>
                                                    </td>

                                                    <td width="2%" border="0"
                                                        style="BORDER-RIGHT: 1pt solid;"></td>

                                                    <td width="38%" valign="top"
                                                        style=" BORDER-RIGHT: 1pt solid; BORDER-TOP: 1pt solid; BORDER-LEFT: medium none; BORDER-BOTTOM: 1pt solid; PADDING-LEFT: 3.5pt; padding-bottom: 2pt; ">
                                                        <font face="Arial" style="font-size: 6pt">
                                                            MUNIC&Iacute;PIO
                                                        </font>

                                                        <br>

                                                        <font face="Arial" style="font-size: 8pt">
                                                            <b>
                                                                {{
                                                                    !is_null($cartaoCnpj->getEndereco()) ?
                                                                    html_entity_decode($cartaoCnpj->getEndereco()['municipio']) :
                                                                    ''
                                                                }}
                                                            </b>
                                                        </font>

                                                        <br>
                                                    </td>

                                                    <td width="2%" border="0"
                                                        style="BORDER-RIGHT: 1pt solid;"></td>

                                                    <td width="10%" valign="top"
                                                        style=" BORDER-RIGHT: 1pt solid; BORDER-TOP: 1pt solid; BORDER-LEFT: medium none; BORDER-BOTTOM: 1pt solid; PADDING-LEFT: 3.5pt; padding-bottom: 2pt; ">
                                                        <font face="Arial" style="font-size: 6pt">
                                                            UF
                                                        </font>

                                                        <br>

                                                        <font face="Arial" style="font-size: 8pt">
                                                            <b>
                                                                {{
                                                                    !is_null($cartaoCnpj->getEndereco()) ?
                                                                    html_entity_decode($cartaoCnpj->getEndereco()['uf']) :
                                                                    ''
                                                                }}
                                                            </b>
                                                        </font>

                                                        <br>
                                                    </td>

                                                </tr>

                                                </tbody>
                                            </table>

                                            <p style="margin:0cm; margin-bottom:0pt;">&nbsp;</p>

                                            <table border="0" width="100%" style=" BORDER-COLLAPSE: collapse; ">

                                                <tbody>
                                                <tr>

                                                    <td width="50%" valign="top"
                                                        style=" BORDER-RIGHT: 1pt solid; BORDER-TOP: 1pt solid; BORDER-LEFT: 1pt solid; BORDER-BOTTOM: 1pt solid; PADDING-LEFT: 3.5pt; padding-bottom: 2pt; ">
                                                        <font face="Arial" style="font-size: 6pt">
                                                            ENDERE&Ccedil;O ELETR&Ocirc;NICO
                                                        </font>

                                                        <br>

                                                        <font face="Arial" style="font-size: 8pt">
                                                            <b> {{$cartaoCnpj->getEmail()}} </b>
                                                        </font>

                                                        <br>
                                                    </td>

                                                    <td width="2%" border="0"
                                                        style="BORDER-RIGHT: 1pt solid;"></td>

                                                    <td width="48%" valign="top"
                                                        style=" BORDER-RIGHT: 1pt solid; BORDER-TOP: 1pt solid; BORDER-LEFT: medium none; BORDER-BOTTOM: 1pt solid; PADDING-LEFT: 3.5pt; padding-bottom: 2pt; ">
                                                        <font face="Arial" style="font-size: 6pt">
                                                            TELEFONE
                                                        </font>

                                                        <br>

                                                        <font face="Arial" style="font-size: 8pt">
                                                            <b>{{$cartaoCnpj->getTelefone()}}</b>
                                                        </font>

                                                        <br>
                                                    </td>

                                                </tr>

                                                </tbody>
                                            </table>

                                            <p style="margin:0cm; margin-bottom:0pt;">&nbsp;</p>

                                            <table border="1" width="100%" style="BORDER-COLLAPSE: collapse;">

                                                <tbody>
                                                <tr>

                                                    <td width="100%" valign="top"
                                                        style=" BORDER-RIGHT: 1pt solid; BORDER-TOP: 1pt solid; BORDER-LEFT: 1pt solid; BORDER-BOTTOM: 1pt solid; PADDING-LEFT: 3.5pt; padding-bottom: 2pt; ">

                                                        <font face="Arial" style="font-size: 6pt">
                                                            ENTE FEDERATIVO RESPONS&Aacute;VEL (EFR)
                                                        </font>

                                                        <br>

                                                        <font face="Arial" style="font-size: 8pt">
                                                            <b>
                                                                *****
                                                            </b>
                                                        </font>

                                                        <br>
                                                    </td>

                                                </tr>

                                                </tbody>
                                            </table>

                                            <p style="margin:0cm; margin-bottom:0pt;">&nbsp;</p>

                                            <table border="0" width="100%" style=" BORDER-COLLAPSE: collapse; ">

                                                <tbody>
                                                <tr>

                                                    <td width="64%" valign="top"
                                                        style=" BORDER-RIGHT: 1pt solid; BORDER-TOP: 1pt solid; BORDER-LEFT: 1pt solid; BORDER-BOTTOM: 1pt solid; PADDING-LEFT: 3.5pt; padding-bottom: 2pt; ">

                                                        <font face="Arial" style="font-size: 6pt">
                                                            SITUA&Ccedil;&Atilde;O CADASTRAL
                                                        </font>

                                                        <br>

                                                        <font face="Arial" style="font-size: 8pt">
                                                            <b> {{$cartaoCnpj->getSituacao()}} </b>
                                                        </font>

                                                        <br>
                                                    </td>


                                                    <td width="2%" border="0"
                                                        style="BORDER-RIGHT: 1pt solid;"></td>

                                                    <td width="24%" valign="top"
                                                        style=" BORDER-RIGHT: 1pt solid; BORDER-TOP: 1pt solid; BORDER-LEFT: medium none; BORDER-BOTTOM: 1pt solid; PADDING-LEFT: 3.5pt; padding-bottom: 2pt; ">
                                                        <font face="Arial" style="font-size: 6pt">
                                                            DATA DA SITUA&Ccedil;&Atilde;O CADASTRAL
                                                        </font>

                                                        <br>

                                                        <font face="Arial" style="font-size: 8pt">
                                                            <b>
                                                                {{
                                                                !is_null($cartaoCnpj->getSituacaoCadastral()) ?
                                                                    $cartaoCnpj->getSituacaoCadastral()['data'] :
                                                                    ''
                                                                }}
                                                            </b>
                                                        </font>

                                                        <br>
                                                    </td>

                                                </tr>

                                                </tbody>
                                            </table>

                                            <p style="margin:0cm; margin-bottom:0pt;">&nbsp;</p>

                                            <table border="1" width="100%" style=" BORDER-COLLAPSE: collapse; ">

                                                <tbody>
                                                <tr>
                                                    <td width="31%" valign="top"
                                                        style=" BORDER-RIGHT: 1pt solid; BORDER-TOP: 1pt solid; BORDER-LEFT: 1pt solid; BORDER-BOTTOM: 1pt solid; PADDING-LEFT: 3.5pt; padding-bottom: 6.5pt;">

                                                        <font face="Arial" style="font-size: 6pt">
                                                            MOTIVO DE SITUA&Ccedil;&Atilde;O CADASTRAL
                                                        </font>

                                                        <br>

                                                        <font face="Arial" style="font-size: 8pt;">
                                                            <b>
                                                                {{
                                                                !is_null($cartaoCnpj->getSituacaoCadastral()) ?
                                                                    html_entity_decode($cartaoCnpj->getSituacaoCadastral()['motivo']) :
                                                                    ''
                                                                }}
                                                            </b>
                                                        </font>

                                                        <br>
                                                    </td>
                                                </tr>

                                                </tbody>
                                            </table>

                                            <p style="margin:0cm; margin-bottom:0pt;">&nbsp;</p>

                                            <table border="0" width="100%" style=" BORDER-COLLAPSE: collapse; ">

                                                <tbody>
                                                <tr>

                                                    <td width="64%" valign="top"
                                                        style=" BORDER-RIGHT: 1pt solid; BORDER-TOP: 1pt solid; BORDER-LEFT: 1pt solid; BORDER-BOTTOM: 1pt solid; PADDING-LEFT: 3.5pt; padding-bottom: 2pt; ">

                                                        <font face="Arial" style="font-size: 6pt">
                                                            SITUA&Ccedil;&Atilde;O ESPECIAL
                                                        </font>

                                                        <br>

                                                        <font face="Arial" style="font-size: 8pt">
                                                            <b> ******** </b>
                                                        </font>

                                                        <br>
                                                    </td>

                                                    <td width="2%" border="0"
                                                        style="BORDER-RIGHT: 1pt solid;"></td>

                                                    <td width="24%" valign="top"
                                                        style=" BORDER-RIGHT: 1pt solid; BORDER-TOP: 1pt solid; BORDER-LEFT: medium none; BORDER-BOTTOM: 1pt solid; PADDING-LEFT: 3.5pt; padding-bottom: 2pt; ">
                                                        <font face="Arial" style="font-size: 6pt">
                                                            DATA DA SITUA&Ccedil;&Atilde;O ESPECIAL
                                                        </font>

                                                        <br>

                                                        <font face="Arial" style="font-size: 8pt">
                                                            <b> ******** </b>
                                                        </font>

                                                        <br>
                                                    </td>

                                                </tr>

                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </table>

                                </td>
                                </tr>
                                </tbody>
                                </table>

                                <br>

                                <p style="margin-top: 11px;">
                                    <font face="Arial" size="2" style="line-height: 30px">
                                        Aprovado pela Instru&ccedil;&atilde;o Normativa RFB n&deg; 1.863, de 27 de
                                        dezembro de 2018.
                                    </font>
                                </p>

                                <table border="0" cellspacing="0" style="width:17cm;	line-height: 6pt;">
                                    <tbody>
                                    <tr>
                                        <td align="left">
                                            <p><font face="Arial" size="2">Emitido no dia
                                                    <b>{{$cartaoCnpj->getDataAtual()->format('H:i:s')}}</b> &agrave;s <b>
                                                        {{$cartaoCnpj->getDataAtual()->format('d/m/Y')}} </b> (data e
                                                    hora de Bras&iacute;lia). </font></p>
                                        </td>

                                        <td align="right">
                                            <p><font face="Arial" size="2">P&aacute;gina: <b>1/1</b></font></p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
