<div 
{{ $attributes->merge(
    ['class' => 'inline-flex items-center justify-center p-1 rounded-full bg-yellow-400']) }}>
    {{ $slot }}
</div>
