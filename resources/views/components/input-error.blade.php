@props(['name'])

@error($name)
    <p {{ $attributes->merge(['class' => 'text-danger mt-2']) }}> {{$message}}</p>
@enderror