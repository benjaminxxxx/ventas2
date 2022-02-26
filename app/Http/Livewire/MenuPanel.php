<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Menu;
use App\Models\Pedido;
use App\Models\Detallepedido;
use App\Events\MyEvent;
use DB;
use Auth;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use PDF;

class MenuPanel extends Component
{
    public $carrito = [];
    public $subtotal = 0;
    public $mesas = 16;
    public $mesaseleccionada;
    
    public $codigosPedidos = [];
    public $iddemesa = [];
    public $npedido = 'PEDIDO';
    public $modoEditar = false;
    public $pedidoseleccionado;

    public $confirmacion = false;
    public $pedidoporcancelar;

    public $pagando = false;
    public $pedidoporpagar;

    public $porpagar_subtotal;
    public $porpagar_pagado;
    public $porpagar_vuelto;
    public $porpagar_total;

    public $haSidoModificado = false;

    public $showNewOrderNotification = 'false';


    public function getListeners()
    {
        return [
            "echo:my-channel,.my-event" => 'notifyNewOrder',
        ];
    }
    public function notifyNewOrder()
    {
        $this->showNewOrderNotification = 'true';
        if(Auth::user()->categoria=='caja'):
            $this->dispatchBrowserEvent('sendnotification',[]);
        endif;
        $this->render();
    }
    public function render()
    {
        $menus = Menu::get()->toArray();
        $nuevomenu = [];
        $vmesasOcupadas = [];

        
        
        $mesasOcupadas = Pedido::where(['estado'=>'pendiente'])->get();
        if($mesasOcupadas->count()>0){
            
            foreach ($mesasOcupadas as $lamesa) {
                $vmesasOcupadas[] = $lamesa->mesa;
                $this->codigosPedidos[$lamesa->mesa] = 'P' . str_pad($lamesa->id, 4, "0", STR_PAD_LEFT);
                $this->iddemesa[$lamesa->mesa] = $lamesa->id;
            }
        }
        
        if($menus!=null){
            if(is_array($menus) && count($menus)>0){
                foreach ($menus as $menu) {
                    $nuevomenu[$menu['categoria']][] = $menu;
                }
            }
        }
        
        if($this->porpagar_pagado!=null){
            if($this->porpagar_subtotal!=null){
                $this->porpagar_vuelto = $this->porpagar_pagado - $this->porpagar_subtotal;
            }
        }

        $hoy = date('Y-m-d-');

        $ventas = Pedido::whereDate('created_at', '=',$hoy)->orderBy('created_at','desc')->get();

        return view('livewire.menu',[
            'menus'=>$nuevomenu,
            'mesasOcupadas'=>$vmesasOcupadas,
            'ventas'=>$ventas
        ]);
    }
    public function vermesa($id,$codigomesa){
        
        $pedido = Pedido::find($id);
        $carrito = [];

        if ($pedido!=null) {
            
            $this->carrito = [];
            $this->npedido = 'PEDIDO ' . $codigomesa;
            $this->pedidoseleccionado = $id;

            $carritoObj = Detallepedido::where(['pedido_id'=>$id])->get();

            foreach ($carritoObj as $cart) {
               
                $carrito[$cart->menu_id] = [
                    'cantidad'=>$cart->menu_cantidad,
                    'plato'=>$cart->menu_titulo,
                    'precio'=>$cart->menu_precio,
                    'subtotal'=>$cart->menu_subtotal,
                ];
            }
            
            $this->modoEditar = true;
            $this->mesaseleccionada = $pedido->mesa;
        
            $this->carrito = $carrito;
            
            $this->calculartotal();

        }
    }
    public function agregar($id,$boolrestar=false){
        
        $producto = Menu::find($id);
        $carrito = $this->carrito;

        if ($producto!=null) {
            if (array_key_exists($id,$carrito)) {
                #si existe, debemos actualizar la cantidad
                $cantidad = $carrito[$id]['cantidad'];
                
                if($boolrestar){
                    if($cantidad>1){
                        $cantidad-=1;
                    }

                }else{
                    $cantidad+=1;
                }

                $carrito[$id]['cantidad'] = $cantidad;
                $carrito[$id]['subtotal'] = $cantidad*$carrito[$id]['precio'];
            }else{
                if(!$boolrestar){
                    $carrito[$id] = [
                        'cantidad'=>1,
                        'plato'=>$producto->plato,
                        'precio'=>$producto->precio,
                        'subtotal'=>$producto->precio,
                    ];
                }
            }

            $this->haSidoModificado = true;

            $this->carrito = $carrito;
            $this->calculartotal();
        }
    }
    
    public function calculartotal(){
        
        $carrito = $this->carrito;
        $this->subtotal = 0;

        if (count($carrito)>0) {
            foreach ($carrito as $cart) {
                $subtotal = $cart['cantidad']*$cart['precio'];
                $this->subtotal+=$subtotal;
            }
        }

    }
    public function seleccionarmesa($mesa){
        $this->mesaseleccionada = $mesa;
        $this->npedido = 'PEDIDO';
        $this->modoEditar = false;
    }
    public function imprimirboucher($pedidoId){

        $pedido = Pedido::find($pedidoId);
      

        if ($pedido!=null) {
            
            $carritoObj = Detallepedido::where(['pedido_id'=>$pedidoId])->get();

         
            $customPaper = array(0,0,250,400);
            
            $pdf = PDF::loadView('snippets.detalle', [
                'detalles'=>$carritoObj,
                'pedido'=>$pedido
                ])->setPaper($customPaper)->output();
            
                //header("Content-type: application/pdf");
                //header("Content-Disposition: inline; filename=documento.pdf");
            
                //return response()->file($pdf);
                /*return response()->make(file_get_contents(public_path('pdfs/ficha_c4.pdf')), 200, [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename="2"'
                ]);*/
            /*
                return response()->streamDownload(function () use ($pdf) { 
                    print($pdf); 
               }, md5(time()).".pdf"); */

            return response()->streamDownload(
                fn() => print($pdf), 'Detalle.pdf'
            );

        }

        
    }
    /*
    public function DownloadNotes(PDF $p) { 
        $note = AcademyLessonNote::where('user_id',auth()->user()->id)->first(); 
        if($note)
        {
             $pdf = $p->loadView('pdf.notesPdf',compact('note'))->output(); 
             return response()->streamDownload(function () use ($pdf) { 
                 print($pdf); 
            }, md5(time()).".pdf"); 
        } 
    }*/
    public function enviarpedido($pedidoseleccionado = false,$pagar=false){
        /*$nombreImpresora = "smb://computer/printer notation";//"XP-80C";//
            $connector = new WindowsPrintConnector($nombreImpresora);
            $impresora = new Printer($connector);
            $impresora->setJustification(Printer::JUSTIFY_CENTER);
            $impresora->setTextSize(2, 2);
            $impresora->text("Imprimiendo\n");
            $impresora->text("ticket\n");
            $impresora->text("de\n");
            $impresora->text("Prueba\n");
            $impresora->setTextSize(1, 1);
            $impresora->text("hventas");
            $impresora->feed(5);
            $impresora->close();*/
        DB::beginTransaction();
        try{
            
            $pedido = Pedido::updateOrCreate([
                'id'=>$pedidoseleccionado
            ],[
                'mesa' =>  $this->mesaseleccionada,
                'subtotal' =>  $this->subtotal,
                'estado' =>  'pendiente',
                'usuario_modifico'=>Auth::user()->name,
                'usuario_modifico_id'=>Auth::id(),
            ]);
                
            $pedidoId = $pedido->id;
/*********************************PUSHER */
            //$this->orderId = $orderId;
            //$this->notifyNewOrder();
            
            event(new MyEvent('hello world'));
            /********************************************** */

            if(count($this->carrito)){
                
                $arrforsave = [];

                foreach ($this->carrito as $menu_id => $carrito) {
                    $arrforsave[] = [
                        'pedido_id'=>$pedidoId,
                        'menu_id'=>$menu_id,
                        'menu_titulo'=>mb_strtoupper($carrito['plato']),
                        'menu_precio'=>$carrito['precio'],
                        'menu_cantidad'=>$carrito['cantidad'],
                        'menu_subtotal'=>$carrito['subtotal']
                    ];
                }

                $pedido->detallepedido()->delete();

                $pedido->detallepedido()->insert($arrforsave);

                $this->haSidoModificado = false;

                if($pagar){
                    $this->procesarPago($pedidoId);
                }
                
                //$this->carrito = []; EN CASO PARALAS VENTAS PARA LLEVAR, ES IMPORANTE NO ELIMINAR EL PRODUCTO
                //$this->mesaseleccionada = null;
            }else{
                DB::rollBack();
            }

            DB::commit();
            

        } catch(\Exception $e){
            
            DB::rollBack();
            return $e->getMessage();
        
        }
    }
    public function llevarPedido(){
        $this->mesaseleccionada = null;
        $this->enviarpedido(false,true);
    }
    public function procesarPago($pedidoId){
        
        $pedido = Pedido::with(['detallepedido'])->where(['id'=>$pedidoId])->first();
     

        if($pedido->count()>=1){
            $this->pagando = true;
            $this->pedidoporpagar = $pedido;
            $this->porpagar_subtotal = $pedido->subtotal;
            $this->porpagar_total = $pedido->subtotal;
        }

    }
    public function remove($id){

        $carrito = $this->carrito;
        unset($carrito[$id]);
        $this->carrito = $carrito;
        $this->calculartotal();

    }
    public function cancelar(){
        
        $this->carrito = [];
        $this->pedidoseleccionado = null;
        $this->modoEditar = false;
        $this->subtotal = 0;
        $this->mesaseleccionada = null;
        $this->iddemesa = [];
        $this->npedido = 'PEDIDO';
        $this->calculartotal();
    }
    public function resetear(){
        $this->cancelar();
    }
    public function porconfirmar($pedidoporcancelar){
        $this->confirmacion = true;
        $this->pedidoporcancelar = $pedidoporcancelar;
    }
  
    public function cancelarpedido(){
        $elpedido = Pedido::find($this->pedidoporcancelar);
        if($elpedido){
            $elpedido->update([
                'estado'=>'cancelado',
                'usuario_cancelo'=>Auth::user()->name,
                'usuario_cancelo_id'=>Auth::id(),
            ]);
            $this->confirmacion = false;
            $this->pagando = false;
            $this->carrito = [];
        }
        
    }
    public function realizarpago(){
        
        $pedido = $this->pedidoporpagar;
        if($pedido){
            if($pedido->estado!='pagado'){
                $pedido->update([
                    'estado'=>'pagado',
                    'total'=>$this->porpagar_total,
                    'usuario_proceso'=>Auth::user()->name,
                    'usuario_proceso_id'=>Auth::id(),
                ]);

                
            }

        }
        $this->pagando = false;
        $this->pedidoporpagar = null;
        $this->porpagar_subtotal = null;
        $this->porpagar_pagado = null;
        $this->porpagar_vuelto = null;
        $this->porpagar_total = null;
        $this->pedidoporcancelar = null;
        $this->pedidoseleccionado = null;
        $this->carrito = [];

    }
}
