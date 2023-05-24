@component('mail::message')
# Hola

Este es un mensaje generado Automaticamente por Su Aplicacion Miggo.

@component('mail::button', ['url' => env('APP_URL').'miggo-front/pages/forgot/recuperar-password.html?email='.$email.'&token='.$token])
Presione Aqui Para Cambiar su Contraseña
@endcomponent


Si no solicitó un restablecimiento de contraseña, no se requiere ninguna otra acción.


Saludos,<br>
{{ config('app.name') }}


{{-- Subcopy --}}
@slot('subcopy')

    "Si tiene problemas para hacer click en Presione Aqui Para Cambiar su Contraseña, copie y pegue la URL a continuación".
    'en su navegador web:', {{env('APP_URL').'miggo-front/pages/forgot/recuperar-password.html?email='.$email.'&token='.$token}}

@endslot
@endcomponent
