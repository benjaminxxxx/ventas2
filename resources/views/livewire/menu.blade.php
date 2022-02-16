<div >
    <audio controls id="setnotificacion" style="display: none">
        
        <source src="{{asset("sounds/notification.mp3")}}" type="audio/mpeg">

      Your browser does not support the audio element.
      </audio>

    @include('snippets.checkout')
    <x-confirmation-modal wire:model="confirmacion">
        <x-slot name="title">
            Estás seguro que vas a cancelar el pedido?
        </x-slot>
        
        <x-slot name="content">
            Si se cancela el pedido no se va a poder recuperar
        </x-slot>

        <x-slot name="content">
            Si se cancela el pedido no se va a poder recuperar
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button type="button" wire:click.pevent="$toggle('confirmacion')" wire:loading.attr="disabled">
                NO
            </x-secondary-button>
            <x-button type="button" wire:click.pevent="cancelarpedido" wire:loading.attr="disabled">
                SI
            </x-button>
        </x-slot>
    </x-confirmation-modal>
    
    
    @php
        $calculated_w  = '';
    @endphp
    <div class="block lg:flex items-center justify-content-center">
        <div class="w-screen lg:w-132 xl:w-176 h-screen bg-red-600">
            
            <div class="overflow-x-auto overflow-y-hidden lg:w-full h-screen">
                <div class="flex items-center w-screenx4  lg:w-132x4 xl:w-176x4 h-screen">
                   
                    <x-panel-menu>
                        @include('snippets.especialidades')
                    </x-panel-menu>
                    <x-panel-menu>
                        <x-h1 class="text-amber-300">HAMBURGUESAS</x-h1>
                        <x-listado index="5" :menus="$menus" />
                    </x-panel-menu>
                    <x-panel-menu>
                        <x-h1 class="text-amber-300">HAMBURGUESAS FULL FILETE</x-h1>
                        <x-listado index="6" :menus="$menus" />  
                        <x-h1 class="text-amber-300">HAMBURGUESAS FULL CARNE</x-h1>
                        <x-listado index="7" :menus="$menus" />  
                    </x-panel-menu>
                    <x-panel-menu>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="col-span-1">
                                <x-h1 class="text-amber-300">EXTRAS</x-h1>
                                <x-listado index="8" :menus="$menus" />  
                            </div>
                            <div class="col-span-1">
                                <x-h1 class="text-amber-300">BEBIDAS</x-h1>
                                <x-listado index="9" :menus="$menus" />  
                            </div>
                        </div>
                        <x-h1 class="text-amber-300">ENSALADAS</x-h1>
                        <x-listado index="10" :menus="$menus" />  

                        <x-h1 class="text-amber-300">HELADOS</x-h1>
                        <x-listado index="11" :menus="$menus" />  

                        <x-h1 class="text-amber-300">POSTRES</x-h1>
                        <x-listado index="12" :menus="$menus" />  

                        <x-h1 class="text-amber-300">JUGOS</x-h1>
                        <x-listado index="13" :menus="$menus" />  

                        <x-h1 class="text-amber-300">SANDWICH</x-h1>
                        <x-listado index="14" :menus="$menus" />  
                    </x-panel-menu>
                </div>
                
            </div>

        </div>
        <div class="flex-1 h-screen p-2 overflow-y-auto">
            @include('snippets.carrito')
        </div>
    </div>
</div>
@section('scripts')
<script>
  
    window.addEventListener('sendnotification', event => {
        var soundFile = document.getElementById('setnotificacion');

     
        soundFile.play();

   
    });
</script>
@endsection