@component('mail::message')
    # Introdução

    O corpo da mensagem
@component('mail::button', ['url' => ''])
    Butão de texto
@endcomponent
    Obrigado, <br>
    {{ config('app.name') }}
@endcomponent
