@props(['value'])

<h1 style="font-family: Bebas Neue; padding-left:0; padding-right:0" 
{{ $attributes->merge(['class' => 'font-bebas text-2xl md:text-3xl font-bold text-xs  uppercase']) }}>
  
    {{ $value ?? $slot }}
</h1>