<div 
{{ $attributes->merge(
    ['class' => 'inline-flex items-center justify-center px-4 py-2 rounded-full bg-yellow-400']) }}>
    {{ $slot }}
</div>
