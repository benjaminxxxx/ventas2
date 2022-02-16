@props(['value'])

<h1 style="font-family: Bebas Neue; padding-left:0; padding-right:0" {{ $attributes->merge(['class' => 'text-3xl font-bold px-3 py-2 text-xs  uppercase']) }}>
  
    {{ $value ?? $slot }}
</h1>