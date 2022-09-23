{{ $dados->getCodigoVerificacao() }} é o seu código de verificação do Agilize MEI. Nunca compartilhe.
@if($dados->hasHash())
    {{ PHP_EOL }}
    {{ PHP_EOL }}
    {{ $dados->getHash() }}
@endif
