<x-mail::message>
Hello {{ $user->name}}

Thank you for registering on our platform.  
We are happy to have you with us!

{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
