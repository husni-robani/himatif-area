<x-mail::message>
# Introduction

The body of your message.

    Password : {{$password}}


<x-mail::button :url="route('login')">
Login
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
