@component('mail::message')

<ul>
    <li>L'email du contact: {{$mailContact}}</li>
    <li>Le sujet du mail: {{$mailSubject}}</li>
</ul>

<p>{{$mailContent}}</p>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
