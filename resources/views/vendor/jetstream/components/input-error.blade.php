@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'text-sm text-red-600']) }}>'El campo es requerido'</p>
@enderror
