<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pedido;
use PDF;

class Reporte extends Component
{
    use WithPagination;

    public $estado;
    public $date;
    public $date2;
    public $fechastart;

    protected $listeners =['senddate','senddate2'];

    public function render()
    {
        $filter = [];

        if($this->estado!=null){
            $filter['estado']=$this->estado;
        }

        if($this->date!=null){
            if($this->date2!=null){
                $pedidos = Pedido::where($filter)->whereBetween('created_at',[$this->date,$this->date2])->with(['detallepedido'])->paginate(10);
            }else{
                $pedidos = Pedido::where($filter)->whereDate('created_at', '=',$this->date)->with(['detallepedido'])->paginate(10);
            }
 
        }else{
            $pedidos = Pedido::where($filter)->with(['detallepedido'])->orderBy('created_at','desc')->paginate(10);
        }

             
        return view('livewire.reporte',[
            'pedidos'=>$pedidos
        ]);
    }
   
    public function senddate($date){
        $this->date = $date;
    }
    public function senddate2($date){
        $this->date2 = $date;
    }
    
    public function exportar(){
        
        try
        {
            $filter = [];
            $estado = 'TODOS';
            $fechainicio = '-';
            $fechafin = '-';

            if($this->estado!=null){
                $filter['estado']=$this->estado;
                $estado = mb_strtoupper($this->estado);
            }

            if($this->date!=null){
                $fechainicio = $this->date;
                if($this->date2!=null){
                    $fechafin = $this->date2;
                    $pedidos = Pedido::where($filter)->whereBetween('created_at',[$this->date,$this->date2])->with(['detallepedido'])->get();
                }else{
                    $pedidos = Pedido::where($filter)->whereDate('created_at', '=',$this->date)->with(['detallepedido'])->get();
                }
    
            }else{
                $pedidos = Pedido::where($filter)->with(['detallepedido'])->get();
            }

            $customPaper = array(0,0,595.28,841.89);
            $doc = date('Ymd') . 'REPORTE.pdf';
            $pdf = PDF::loadView('snippets.reporte', [
                'pedidos'=>$pedidos,
                'estado'=>$estado,
                'fechainicio'=>$fechainicio,
                'fechafin'=>$fechafin,
                ])->setPaper($customPaper)->output();
     
            return response()->streamDownload(
                fn() => print($pdf), 'Mi Reporte.pdf'
            );

        } catch (\Throwable $th) {
            dd($th->getMessage());
            request()->session()->flash('flash.banner', 'Error: El archivo no existe: ' . $th->getMessage());
            request()->session()->flash('flash.bannerStyle', 'danger');
        }
    }
}
