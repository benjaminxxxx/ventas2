<div>
    @livewire('navigation-menu')
    <div class="mt-2">

        <x-panel>

            <div class="mb-5">
                <form class="w-full max-w-sm">
                    <div class="flex items-center py-2">
                        <div class="mr-3">
                            <x-label>ESTADO</x-label>
                            <x-select wire:model="estado">
                                <option value="">Seleccionar estado</option>
                                <option value="pendiente">Pendientes</option>
                                <option value="pagado">Pagados</option>
                                <option value="cancelado">Cancelados</option>
                            </x-select>
                        </div>
                        <div class="mr-3">
                            <x-label>FECHA</x-label>
                            <x-input type="search" autocomplete="off" id="datepicker" wire:model="date"></x-input>
                         
                        </div>
                        <div class="mr-3">
                            <x-label>HASTA</x-label>
                            <x-input type="search" autocomplete="off" id="datepicker2" wire:model="date2"></x-input>
                         
                        </div>
                      
                        <div class="mr-3">
                            <br/>
                            <x-secondary-button wire:click.prevent="exportar()" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M186.7 286.8C198.9 251.9 200 222.9 200 215.5C200 202.5 189.2 192 176 192S152 202.5 152 215.5c0 .6562 .375 33.72 17.67 71.5c-10.89 30-23.66 56.75-35.7 78.94c-23.66 10.28-45.92 23.56-63.23 40.66C66.45 410.8 64 416.8 64 424.6C64 437.5 74.73 448 87.94 448c7.688 0 14.94-3.625 19.38-9.656c8.219-11.12 22.52-31.75 38.05-59.75c26.69-10.94 55.13-18.16 79.53-22.84c6.678 4.957 45.31 30.31 67.98 30.31C307.8 386.1 320 374.2 320 358.7c0-15.09-12.56-27.38-28-27.38c-21.44 0-59.14 6.516-63.41 7.281C208.1 322.8 195.7 304.4 186.7 286.8zM94.38 428.8C90.53 434 80 432.1 80 422.9c0-1.938 .7187-3.719 1.969-4.969c10.7-10.59 23.66-19.62 37.8-27.31C108.6 409.1 99.22 422.2 94.38 428.8zM168 215.5C168 211.3 171.6 208 176 208s8 3.344 8 7.469c0 17.56-4.906 40.25-6.844 48.56C168.3 238 168 217.5 168 215.5zM156.8 357c7.797-15.47 15.62-32.63 22.88-51.19c7.562 12.5 17.17 25.03 29.42 36.63C192.4 346.1 174.5 350.8 156.8 357zM292 347.3c6.609 0 12 5.094 12 12.22c0 5.781-4.984 10.5-11.12 10.5c-9.91 0-34.01-11.54-45.2-18.22C248.4 351.7 277.5 347.3 292 347.3zM374.6 150.6l-141.3-141.3C227.4 3.371 219.2 0 210.7 0H64C28.65 0 0 28.65 0 64l.0065 384c0 35.34 28.65 64 64 64H320c35.35 0 64-28.66 64-64V173.3C384 164.8 380.6 156.6 374.6 150.6zM224 22.63L361.4 160H248C234.8 160 224 149.2 224 136V22.63zM368 448c0 26.47-21.53 48-48 48H64c-26.47 0-48-21.53-48-48V64c0-26.47 21.53-48 48-48h144v120c0 22.06 17.94 40 40 40h120V448z"/></svg>
                                 EXPORTAR</x-secondary-button>
                        </div>

                    </div>
                  </form>
            </div>

            <x-table-responsive>
                <thead>
                    <tr>
                        <x-th>#</x-th>
                        <x-th>FECHA DE VENTA</x-th>
                        <x-th>PEDIDO N°</x-th>
                        <x-th>ESTADO</x-th>
                        <x-th>PRODUCTOS</x-th>
                        <x-th>SUBTOTAL</x-th>
                        <x-th>TOTAL PAGADO</x-th>
                        <x-th>USUARIOS</x-th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $index => $pedido)
                    <tr class="border-b">
                        <x-td>{{$index+1}}</x-td>
                        <x-td>{{date('Y-m-d [H:i:s]',strtotime($pedido->created_at))}}</x-td>
                        <x-td>{{ 'P' . str_pad($pedido->id, 4, "0", STR_PAD_LEFT) }}</x-td>
                        <x-td>{{mb_strtoupper($pedido->estado)}}</x-td>
                        <x-td>
                            @if ($pedido->detallepedido!=null)
                                @if ($pedido->detallepedido->count()>0)
                                <ul class="m-0">
                                    @foreach ($pedido->detallepedido as $detalle)
                                        <li>{{$detalle->menu_titulo . ' x' . $detalle->menu_cantidad . ' [' .$detalle->menu_subtotal. ']'}}</li>
                                    @endforeach
                                </ul>
                                    
                                @endif
                            @endif
                        </x-td>
                        <x-td>{{$pedido->subtotal}}</x-td>
                        <x-td>{{$pedido->total}}</x-td>
                        <x-td>
                            @if($pedido->usuario_modifico!=null && $pedido->usuario_modifico!='0')
                            <p>MODIFICÓ: {{mb_strtoupper($pedido->usuario_modifico)}}</p>
                            @endif
                            @if($pedido->usuario_cancelo!=null && $pedido->usuario_cancelo!='0')
                            <p>CANCELÓ: {{mb_strtoupper($pedido->usuario_cancelo)}}</p>
                            @endif
                            @if($pedido->usuario_proceso!=null && $pedido->usuario_proceso!='0')
                            <p>PROCESÓ: {{mb_strtoupper($pedido->usuario_proceso)}}</p>
                            @endif
                        </x-td>
                    </tr> 
                    @endforeach
                    
                </tbody>
                    
               
            </x-table-responsive>
            <div class="mt-2">
                {{$pedidos->links()}}
            </div>
        </x-panel>
    </div>
    @section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <script>
         var picker = new Pikaday({
            field: document.getElementById('datepicker'),
            format: 'Y-MM-DD',
            onSelect: function() {
                @this.emit('senddate',this.getMoment().format('Y-MM-DD'));
            }
        });
        var picker2 = new Pikaday({
            field: document.getElementById('datepicker2'),
            format: 'Y-MM-DD',
            onSelect: function() {
                @this.emit('senddate2',this.getMoment().format('Y-MM-DD'));
            }
        });
    </script> 
    @endsection
</div>
