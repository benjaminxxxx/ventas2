@props(['value'])

<h1 style="adding-left:0; padding-right:0" 
{{ $attributes->merge(['class' => 'text-md text-xs text-white']) }}>
  
    {{ $value ?? $slot }}
</h1>