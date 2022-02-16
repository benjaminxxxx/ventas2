@props(['menus','index'])

@if (array_key_exists($index,$menus))
    @if(count($menus[$index])>0)
    
        @foreach ($menus[$index] as $menu1)
        <div class="grid grid-cols-2 gap-2">
            <div class="col-span-1">
                
                <x-h3 class="text-white">{{$menu1['plato']}}</x-h3>
                <!--<x-subtitulo>{{$menu1['descripcion']}}</x-subtitulo>-->
                
            </div>
            <div class="col-span-1">
                
                <div class="flex items-center justify-end mb-2">
                    <x-precio class="mr-5">

                        <!--
                        <div class="w-16 h-16 overflow-hidden rounded-full mr-2">
                            <img class="" style="height: 100%; object-fit: cover;" src="{{asset('image/platos/' . $menu1['imagen'])}}" alt=""> 
                        </div>       -->           
                        <x-elprecio>{{$menu1['precio']}}</x-elprecio>
    
                    </x-precio>

                    <div class="flex items-center justify-center">

                        <x-button-default  type="button" class="mr-1" style="padding: 5px !important;" wire:click.prevent="agregar({{$menu1['id']}},true)">
                            <svg xmlns="http://www.w3.org/2000/svg"  class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                              </svg>
                        </x-button-default>
                        <x-button-default  type="button" class="ml-1" style="padding: 5px !important;" wire:click.prevent="agregar({{$menu1['id']}})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                              </svg>
                        </x-button-default>
                        
                    </div>

                </div>

                

            </div>
        </div>  
        @endforeach
    @endif
@endif