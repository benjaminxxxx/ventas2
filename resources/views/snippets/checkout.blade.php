<x-dialog-modal maxWidth="lg" wire:model="pagando">
    <x-slot name="title">
        CERRAR VENTA
    </x-slot>

    <x-slot name="content">
        @if($pedidoporpagar)
            @if($pedidoporpagar->detallepedido->count()>0)
            <x-table-responsive>
                <thead>
                    <tr>
                        <x-th class="text-left">DESCRIPCIÓN</x-th>
                        <x-th>PRECIO</x-th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidoporpagar->detallepedido as $detalle)
                    <tr>
                        <x-td>{{$detalle->menu_titulo . ' x' . $detalle->menu_cantidad}}</x-td>
                        <x-td class="text-center">{{$detalle->menu_subtotal}}</x-td>
                    </tr>
                    @endforeach
                </tbody>
                
            </x-table-responsive>
            <div class="mt-5">
                <x-label value="El cliente pagará con" />
                <x-input type="text"  wire:model="porpagar_pagado"></x-input>
             
                <x-label value="Vuelto: {{$porpagar_vuelto}}" />
            </div>
            <div class="mt-2">
                <x-label value="Se le cobrará un total de" />
                <x-input type="text"   wire:model="porpagar_total" />
            </div>
            @endif
        @endif
    </x-slot>
    <x-slot name="footer">
        @if($pedidoporpagar)
        @if($pedidoporpagar->mesa==null)
        <x-button-default   type="button" wire:click="porconfirmar({{$pedidoporpagar->id}})" wire:loading.attr="disabled">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg> Cancelar
        </x-button-default>
        @else
        <x-button-default  type="button" wire:click="$toggle('pagando')" wire:loading.attr="disabled">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg> Cancelar
        </x-button-default>
        @endif
        <x-button-red type="button" wire:click.prevent="realizarpago" wire:loading.attr="disabled">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg> Procesar pago
        </x-button-red>
        @endif
    </x-slot>
</x-dialog-modal>