@component('mail::message')
# Hello {{$mail_data['user']}}

Email ini berisi tagihan anda sebesar Rp {{$mail_data['amount']}}

Mohon segera bayar kepada pihak AwanKita untuk melanjutkan transaksi ada untuk esok hari.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Go to AwanKita
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
