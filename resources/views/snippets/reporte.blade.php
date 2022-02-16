<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MI REPORTE</title>
    <style>
        *{
            font-size: 12px;
            font-family: Arial, sans-serif;
        }
        table{
            width: 100%;
            border-collapse: collapse
        }
        table td,table th{
            border-bottom:1px solid #e5e7eb;; 
        }
        th{
            background-color: #dbdbdb;
            padding:6px 10px;
            font-weight: bold

        }
        td{
            padding: 6px 10px;
        }
        tbody,thead{
            border: 1px solid #e5e7eb
        }
        p{
            padding:2px 0;
            margin:0;
            line-height:14px;
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
        <table>
            <thead>
                <tr>
                  <th>PEDIDO</th>
                  <th>DETALLE DE PEDIDO</th>
   
                </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $index => $pedido)
                        <tr>
                            <td>
                                <p>N°: {{$index + 1}}</p>
                                <p>Código: {{ 'P' . str_pad($pedido->id, 4, "0", STR_PAD_LEFT) }}</p>
                                <p>Fecha: {{date('Y-m-d',strtotime($pedido->created_at))}}</p>
                                <p>Estado: {{ mb_strtoupper($pedido->estado) }}</p>
                                <p>Total calculado: {{ $pedido->subtotal }}</p>
                                <p>Total registrado: {{ $pedido->total }}</p>
                                <p>Mesa: {{ $pedido->mesa }}</p>
                                @if($pedido->usuario_modifico!=null && $pedido->usuario_modifico!='0')
                                <p>Usuario que creó/modificó:: {{mb_strtoupper($pedido->usuario_modifico)}}</p>
                                @endif
                                @if($pedido->usuario_cancelo!=null && $pedido->usuario_cancelo!='0')
                                <p>Usuario que canceló: {{mb_strtoupper($pedido->usuario_cancelo)}}</p>
                                @endif
                                @if($pedido->usuario_proceso!=null && $pedido->usuario_proceso!='0')
                                <p>Usuario que genero el pago: {{mb_strtoupper($pedido->usuario_proceso)}}</p>
                                @endif
                            </td>
                            <td>
                                
                                <table>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>PRODUCTO</th>
                                            <th>CANTIDAD</th>
                                            <th>PRECIO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($pedido->detallepedido!=null)
                                            @if ($pedido->detallepedido->count()>0)
                                            <tr>
                                                @foreach ($pedido->detallepedido as $key => $detalle)
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$detalle->menu_titulo}}</td>
                                                    <td>{{$detalle->menu_cantidad}}</td>
                                                    <td>{{$detalle->menu_subtotal}}</td>
                                                @endforeach
                                            </tr>
                                            @endif
                                        @endif
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        
                        @endforeach
                </tbody>
            </table>
    
  </body>
</html>