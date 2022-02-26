@php
    $cart_counter = 0;
@endphp

<div class="flex justify-space-between w-full">
    <x-h1 class="text-gray-900">{{$npedido}}</x-h1>
  
    <div class="w-48">
        @livewire('navigation-menu')
    </div>

</div>
<div class="gap-1 grid grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 mt-5">
    @for($me = 1; $me <= $mesas; $me++)
    @php
        $mesadisponibleClass = true;
        $mesaseleccionadaClass = '';
        if(in_array($me,$mesasOcupadas)){
            $mesadisponibleClass = '';
        }
        if($me == $mesaseleccionada){
            $mesaseleccionadaClass = 'bg-green-600 mesa-seleccionada';
           
        }
    @endphp
    @if($mesadisponibleClass)
        <a href="#" wire:click.prevent="seleccionarmesa({{$me}})" class="bg-green-400 {{$mesaseleccionadaClass}} p-2 col-span-1 relative flex items-center justify-center ">
            <div class="w-16 h-16" style="background: url({{asset('image/mesa.png')}}) no-repeat; background-size: contain;">
                <x-titulo class="text-white text-center">{{$me}}</x-titulo>
            </div>
        </a>
    @else
    <div  class="{{$mesaseleccionadaClass}} p-2 col-span-1 relative flex items-center justify-center ">
     
        @if($me == $mesaseleccionada)
            <a href="#" wire:click.prevent="cancelar" class="rounded-full font-bold text-center w-6 h-6 hover:bg-red-700 bg-red-600 text-white font-sm absolute right-0 top-0 pointer">
                &times;
            </a>
        @endif
        <a href="#" class="w-16 h-16 hover:bg-gray-400" wire:click.prevent="vermesa({{$iddemesa[$me]}},'{{$codigosPedidos[$me]}}')" style="background: url({{asset('image/mesa.png')}}) no-repeat; background-size: contain;">
            <x-titulo class="text-white text-center">{{$me}}</x-titulo>
            <p class="w-full text-center mt-5 font-bold text-sm">{{$codigosPedidos[$me]}}</p>
        </a>
    </div>
    @endif
    @endfor
    <div class="col-span-4 mt-3">
        @if(count($carrito)!=0)
        <x-button-pink type="button" wire:click.prevent="llevarPedido">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg> 
            Nuevo Pedido para llevar
        </x-button-pink>
        @endif
        @if($mesaseleccionada!=null)
        <x-secondary-button type="button" wire:click="imprimirboucher({{$pedidoseleccionado}})">
            Imprimir Pedido
        </x-secondary-button>
        @endif
    </div>
    
</div>

<x-card class="mt-10">
    <x-table-responsive>
        <thead>
            <tr>
                <x-th class="text-center" value="N°" />
                <x-th class="text-left" value="Menú" />
                <x-th class="text-right" value="Precio" />
                <x-th class="text-center" value="Cant." />
                <x-th class="text-right" value="Total" />
                <x-th class="text-center" value="" />
            </tr>
        </thead>
        <tbody>
            @if(count($carrito)>0)
                @foreach ($carrito as $menuid => $cart)
                @php
                    $cart_counter+=1;
                @endphp
                <tr>
                    <x-td class="text-center">
                        {{$cart_counter}}
                    </x-td>
                    <x-td>
                        {{mb_strtoupper($cart['plato'])}}
                    </x-td>
                    <x-td class="text-right">
                        {{$cart['precio']}}
                    </x-td>
                    <x-td class="text-center">
                        {{$cart['cantidad']}}
                    </x-td>
                    <x-td class="text-right">
                        {{$cart['subtotal']}}
                    </x-td>
                    <x-td class="text-right">
                        <x-button-red wire:click.prevent="remove('{{$menuid}}')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                              </svg>
                        </x-button-red>
                    </x-td>
                </tr>  
                @endforeach
            @else
                <tr>
                    <x-td colspan="100%">Ningun producto agregado</x-td>
                </tr>
            @endif
        </tbody>
        <tfoot>
            <tr>
                <x-th colspan="4" class="text-right" value="TOTAL" />
                <x-th class="text-right" value="{{$subtotal}}" />
                <x-th value="" />
            </tr>
            @if($mesaseleccionada!=null && count($carrito)!=0)
            <tr>
                <x-th colspan="100%" class="text-right">
                    <x-button-yellow type="button" wire:click.pevent="resetear()" wire:loading.attr="disabled" >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg> VOLVER A CREAR
                          <x-loading target="cancelarpedido" fill="black" />
                    </x-button-yellow>

                    @if ($modoEditar)

                    @if($haSidoModificado)
                    <x-button-red type="button" wire:click="enviarpedido({{$pedidoseleccionado}})">
                        <svg xmlns="http://www.w3.org/2000/svg"  wire:loading.attr="disabled" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                          </svg> ACTUALIZAR PEDIDO 

                        <x-loading target="enviarpedido"/>

                    </x-button-red>
                    @else
                    <x-button-pink type="button" wire:click="procesarPago({{$pedidoseleccionado}})"  wire:loading.attr="disabled">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg> PROCESAR PAGO
                    </x-button-pink>
                    @endif
                    <x-secondary-button type="button" wire:click.pevent="porconfirmar({{$pedidoseleccionado}})" wire:loading.attr="disabled" >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M3 12l6.414 6.414a2 2 0 001.414.586H19a2 2 0 002-2V7a2 2 0 00-2-2h-8.172a2 2 0 00-1.414.586L3 12z" />
                          </svg> CANCELAR PEDIDO
                          <x-loading target="cancelarpedido" fill="black" />
                    </x-secondary-button>
                    @else
                    <x-button-red type="button" wire:click="enviarpedido()"  wire:loading.attr="disabled">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                          </svg> 

                        REGISTRAR PEDIDO
                        <x-loading target="enviarpedido" />
                    </x-button-red>
                    @endif
                    
                </x-th>
            </tr>
            @endif
        </tfoot>
    </x-table-responsive>
</x-card>
@if(Auth::user()->categoria=='caja')
<x-panel class="mt-10">
    <x-titulo>Ventas de hoy</x-titulo>
    <x-table-responsive>
        <thead>
            <tr>
                <x-th class="text-center" value="N°" />
                <x-th class="text-center" value="Hora" />
                <x-th class="text-center" value="Mesa" />
                <x-th class="text-right" value="Subtotal" />
                <x-th class="text-center" value="Atendido" />
            </tr>
        </thead>
        <tbody>
            @if(count($ventas)>0)
                @foreach ($ventas as $ventaIndex => $venta)
                @php
                    $classSelectedD = '';
                    if($venta->id == $pedidoseleccionado):
                    $classSelectedD = 'bg-green-400';
                    endif
                @endphp
                <tr class="{{$classSelectedD}}">
                    <x-td class="text-center">
                        @php
                            $codigolargo = 'P' . str_pad($venta->id, 4, "0", STR_PAD_LEFT);
                            
                        @endphp
                        <a href="#" class="underline text-blue-500" wire:click.prevent="vermesa({{$venta->id}},'{{$codigolargo}}')">{{$codigolargo}}</a>
                    </x-td>
                    <x-td class="text-center">
                        {{date('H:i:s',strtotime($venta->created_at))}}
                    </x-td>
                    <x-td class="text-center">
                        {{$venta->mesa}}
                    </x-td>
                    <x-td class="text-right">
                        {{$venta->subtotal}}
                    </x-td>
                    <x-td class="text-center">
                        {{mb_strtoupper($venta->estado)}}
                    </x-td>
                    
                </tr>  
                @endforeach
            @else
                <tr>
                    <x-td colspan="100%">Ninguna venta aún</x-td>
                </tr>
            @endif
        </tbody>
      
    </x-table-responsive>
</x-panel>
@endif

