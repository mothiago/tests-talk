<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>Confirmação de Email</title>
    <style>
        h1 {
            font-family: "SF Pro", "SF Pro Display", "SF Pro Icons", "Helvetica Neue", "Helvetica", "Arial", sans-serif;
            font-weight: 590;
            line-height: 29px;
            padding-left: 35px;
        }
        p {
            font-family: "SF Pro", "SF Pro Display", "SF Pro Icons", "Helvetica Neue", "Helvetica", "Arial", sans-serif;
            font-weight: 400;
            line-height: 24px;
            padding-left: 35px;
        }
    </style>
</head>
<body>
    <div style="padding: 35px 40px 10px 40px;background:#FFF;border-top-left-radius: 5px; border-top-right-radius: 5px;">
            <a href="https://agilize.com.br" title="Visite o site da Agilize">
                <img align="absmiddle"
                     src="https://app.agilize.com.br/api/_Resources/Static/Packages/Apimenti.Account/imgs/logos/logo-500w-purple.png"
                     border="0" style="width: 150px; border:0;text-decoration:none;"></a>
    </div>
    <h1>
        @if($emailVerificado)
            Seu e-mail foi confirmado!
        @else
            Não foi possível confirmar seu e-mail
        @endif
    </h1>
    <p>
        @if($emailVerificado)
            Obrigado por confirmar seu e-mail conosco.
        @else
            O link é inválido ou expirou.
        @endif
    </p>
</body>
</html>
