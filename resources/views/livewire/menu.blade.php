<div >
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
    
    

    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="col-span-1 h-screen bg-red-600 p-2">
            
            <div class="overflow-auto  w-96 sm:w-97 md:w-96 lg:w-98 xl:w-100 m-auto h-full">
                <div class="flex items-center w-96x4 sm:w-97x4 md:w-96x4 lg:w-98x4 xl:w-100x4">
                    <div class="w-96 sm:w-97 md:w-96 lg:w-98 xl:w-100">
                        @include('snippets.especialidades')
                    </div>
                    <div class="bg-white w-96 sm:w-97 md:w-96 lg:w-98 xl:w-100">
                        2
                    </div>
                    <div class="bg-white w-96 sm:w-97 md:w-96 lg:w-98 xl:w-100">
                        3
                    </div>
                    <div class="bg-white w-96 sm:w-97 md:w-96 lg:w-98 xl:w-100">
                        4
                    </div>
                </div>
                
            </div>

        </div>
        <div class="col-span-1 h-screen p-2 overflow-y-auto">
            @include('snippets.carrito')
        </div>
    </div>
</div>
