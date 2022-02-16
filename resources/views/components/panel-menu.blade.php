@props(['value'])

<div {{ $attributes->merge(['class' => 'w-screen lg:w-132 xl:w-176 h-screen overflow-y-auto  p-10']) }}>

        {{ $value ?? $slot }}

    
</div>
