@props(['value'])

<h1 style=" padding-left:0; padding-right:0" 
{{ $attributes->merge(['class' => ' text-xs md:text-md font-bold   uppercase']) }}>
  
    {{ $value ?? $slot }}
</h1>