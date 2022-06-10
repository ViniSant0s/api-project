@component('mail::message')
# Pagamento realizado com sucesso!!!
 
@component('mail::button', ['url' => config('app.url')])
Acessar o Site
@endcomponent
{{ config('app.name') }}
@endcomponent