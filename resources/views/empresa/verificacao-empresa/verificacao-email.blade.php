<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>Confirmação de Email</title>
    <style>
        body {
            font-family: 'SF Pro';
            font-style: normal;
        }

        h1 {
            font-size: 24px;
            line-height: 29px;
            color: #2D2D38;
        }

        p {
            font-weight: 400;
            font-size: 16px;
            line-height: 150%;
            color: #2D2D38;
        }

        .link-validacao {
            margin: 0 auto;
            text-decoration: none;
        }

        .btn-validacao {
            width: 163px;
            height: 48px;
            background: #744ab5;
            border-radius: 12px;
            border: none;
            display: flex;
        }

        .span-confirmar {
            font-size: 16px;
            line-height: 120%;
            font-weight: 510;
            color: #FFFFFF;
            margin: auto;
        }

        .div-validacao {
            display: flex;
            text-align: center;
            margin: 40px 0;
        }
    </style>
</head>
<body>
<h1>Olá, {{$dados->getNomeUsuario()}}!</h1>
<p>
    Sua conta no app Agilize MEI foi criada! Para sua segurança, precisamos confirmar seu endereço de email. Esse link expira em 24 horas.
</p>
<div class="div-validacao">
    <a class="link-validacao" href={{$dados->getLink()}}>
        <div class="btn-validacao"><span class="span-confirmar">Confirmar email</span></div>
    </a>
</div>
<p>Caso você não tenha solicitado a criação dessa conta, ignore este email.</p>
</body>
</html>
