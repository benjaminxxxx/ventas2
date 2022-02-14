<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Menu;
use App\Models\Pedido;
use App\Models\Detallepedido;
use DB;
use Auth;

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

        return view('livewire.menu',[
            'menus'=>$nuevomenu,
            'mesasOcupadas'=>$vmesasOcupadas
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
    public function enviarpedido($pedidoseleccionado = false,$pagar=false){
        
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

                if($pagar){
                    $this->procesarPago($pedidoId);
                }
                
                //$this->carrito = []; EN CASO PARALAS VENTAS PARA LLEVAR, ES IMPORANTE NO ELIMINAR EL PRODUCTO
                $this->mesaseleccionada = null;
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