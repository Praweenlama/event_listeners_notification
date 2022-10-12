@component('mail::message')
    <h2>{{$post->title}}</h2>
    <p>{{$post->body}}</p>
    @component('mail::button', ['url' =>'https://www.google.com'])
        Click here
    @endcomponent
    Thank You,<br>
    {{config('app.name')}}<br>
    Laravel Team
@endcomponent