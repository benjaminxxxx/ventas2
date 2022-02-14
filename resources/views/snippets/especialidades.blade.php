<x-h1 class="text-amber-300">Especialidades</x-h1>

@if (array_key_exists('1',$menus))
    @if(count($menus['1'])>0)
    
        @foreach ($menus['1'] as $menu1)
        <div class="grid grid-cols-2 gap-2">
            <div class="col-span-1">
                
                <x-titulo class="text-white">{{$menu1['plato']}}</x-titulo>
                <x-subtitulo>{{$menu1['descripcion']}}</x-subtitulo>
                
            </div>
            <div class="col-span-1">
                
                <div class="flex items-center justify-center">
                    <x-precio>

                        <img class="w-20 md:w-32" src="{{asset('image/platos/' . $menu1['imagen'])}}" alt="">                   
                        <x-elprecio>{{$menu1['precio']}}</x-elprecio>
    
                    </x-precio>
                </div>

                <div class="flex items-center justify-center pt-5">

                    <x-button-default  type="button" class="mr-1" wire:click.prevent="agregar({{$menu1['id']}},true)">
                        <svg xmlns="http://www.w3.org/2000/svg"  class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                          </svg>
                    </x-button-default>
                    <x-button-default  type="button" class="ml-1" wire:click.prevent="agregar({{$menu1['id']}})">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                          </svg>
                    </x-button-default>
                    
                </div>

            </div>
        </div>  
        @endforeach
    @endif
@endif