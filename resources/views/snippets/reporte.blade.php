<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MI REPORTE</title>
    <link rel="stylesheet" href="https://tools.test/css/app.css">
    <style>
.text-gray-500 {
    --tw-text-opacity: 1;
    color: rgb(107 114 128 / 1);
}
.tracking-wider {
    letter-spacing: 0.05em;
}
.leading-4 {
    line-height: 1rem;
}
.leading-5 {
    line-height: 1.25rem;
}
.font-medium {
    font-weight: 500;
}
.text-xs {
    font-size: 0.75rem;
    line-height: 1rem;
}
.px-3 {
    padding-left: 0.75rem;
    padding-right: 0.75rem;
}
.py-2 {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
}
.bg-gray-50 {
    --tw-bg-opacity: 1;
    background-color: rgb(249 250 251 / 1));
}
.border-b {
    border-bottom-width: 1px;
}
.md\:break-all {
    word-break: break-all;
}
.font-medium {
    font-weight: 500;
}

.text-sm {
    font-size: 0.875rem;
    line-height: 1.25rem;
}
.px-3 {
    padding-left: 0.75rem;
    padding-right: 0.75rem;
}
    </style>
  </head>
  <body>
      <div class="heading">
          <div class="filtro">
            <label for="">ESTADO</label>
            {{$estado}}
          </div>
          <div class="filtro">
            <label for="">FECHA INICIO</label>
            {{$fechainicio}}
          </div>
          <div class="filtro">
            <label for="">FECHA FIN</label>
            {{$fechafin}}
          </div>
            
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
                        <tr>
                            <x-td>
                                {{$index + 1}}
                            </x-td>
                            <x-td>
                                {{date('Y-m-d',strtotime($pedido->created_at))}}
                            </x-td>
                            <x-td>
                                {{ 'P' . str_pad($pedido->id, 4, "0", STR_PAD_LEFT) }}
                            </x-td>
                            <x-td> {{ $pedido->estado }} </x-td>
                            <x-td> - </x-td>
                            <x-td> {{ $pedido->subtotal }} </x-td>
                            <x-td> {{ $pedido->total }} </x-td>
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
    
  </body>
</html>