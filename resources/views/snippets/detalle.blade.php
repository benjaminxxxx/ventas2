<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MI DETALLE</title>
    <style>
        *{
            font-size: 12px;
            font-family: Arial, sans-serif;
        }
        body,
        html{
            margin: 4px;
            padding:0;
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
            padding:2px 5px;
            font-weight: bold

        }
        td{
            padding: 2px 5px;
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
  
        <table width="100%">
           
                <tbody>
                        <tr>
                            <td>
                                <p>Código: {{ 'P' . str_pad($pedido->id, 4, "0", STR_PAD_LEFT) }}</p>
                                <p>Fecha: {{date('Y-m-d',strtotime($pedido->created_at))}}</p>
                                <p>Estado: {{ mb_strtoupper($pedido->estado) }}</p>
                                <p>Total calculado: {{ $pedido->subtotal }}</p>
                                <p>Total registrado: {{ $pedido->total }}</p>
                                <p>Mesa: {{ $pedido->mesa }}</p>
                                @if($pedido->usuario_modifico!=null && $pedido->usuario_modifico!='0')
                                <p>Usuario que creó/modificó:: {{mb_strtoupper($pedido->usuario_modifico)}}</p>
                                @endif
                            </td>
                            
                        </tr>
                        <tr>
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
                                            @if ($detalles->count()>0)
                                            
                                                @foreach ($detalles as $key => $detalle)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$detalle->menu_titulo}}</td>
                                                    <td>{{$detalle->menu_cantidad}}</td>
                                                    <td>{{$detalle->menu_subtotal}}</td>
                                                </tr>
                                                @endforeach
                                           
                                            @endif
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                </tbody>
            </table>
    
  </body>
</html>