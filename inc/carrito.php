<?php

class Item
{
    public $nombre;
    public $id;
    public $precio;
    public $cantidad;
    
    public function __construct($id_c,$name,$price,$cant) {
        $this->nombre = $name;
        $this->id = $id_c;
        $this->precio = $price;
        $this->cantidad = $cant;
    }
}

class Carrito
{
    public $productos = array();
    public $total;
    
    public function add($p)
    {
        if(!isset($this->productos))
        {
            array_push($this->productos, $p);
            $this->total = $p->precio * $p->cantidad;
        }
        else
        {
            $boolean = false;
            foreach ($this->productos as $value) {
                if($value->nombre == $p->nombre)
                {
                    $value->cantidad = $value->cantidad + $p->cantidad;
                    $boolean = true;
                }
            }
            if(!$boolean)
            {
                array_push($this->productos, $p);
            }
            
            $this->total = 0;
            
            foreach ($this->productos as $value) {
                $this->total = $this->total + ($value->precio * $value->cantidad);
            }
        }
    }
    
    public function imprimir() {
        if(count($this->productos) > 0)
        {
            echo '<div class="row">
                        <table class="table" style="color: #CEF6CE;">
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Total</th>
                            <th>Acción</th>';
            $i = 0;
            foreach ($this->productos as $value) {
                echo '<tr><td>'.($value->nombre).'</td>';
                echo '<td>'.($value->cantidad).'</td>';
                echo '<td>'.($value->precio).'</td>';
                echo '<td>'.($value->precio * $value->cantidad).'</td>';
                echo '<td><button class="btn btn-danger btn-small fa fa-close" onclick="return dropItem('.$i.')"></button></td><tr>';
                $i++;
            }
            echo '<tr><td colspan="4">Total:</td>';
            echo '<td>'.$this->total.'</td>';
            echo '</table>';
        }
    }
    
    public function detalles($permiso) {
        if(count($this->productos) > 0)
        {
            echo '<div class="row">
                        <table class="table" style="color: #CEF6CE;">
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Total</th>';
            if($permiso === '1'){echo '<th>Acción</th>';}
            
            foreach ($this->productos as $value) {
                echo '<tr><td>'.($value->nombre).'</td>';
                echo '<td>'.($value->cantidad).'</td>';
                echo '<td>'.($value->precio).'</td>';
                echo '<td>'.($value->precio * $value->cantidad).'</td>';
                if($value->cantidad > 0 && $permiso === '1')
                {
                        echo '<td><button class="btn btn-success btn-small fa fa-reply" onclick="return dev('.($value->cantidad).','.($value->id).','.($value->precio).')"></button></td><tr>';
                }
                else if($permiso === '1')
                {
                    echo '<td></td>';
                }
            }
            if($permiso == '1'){echo '<tr><td colspan="4">Total:</td>';}else{echo '<tr><td colspan="3">Total:</td>';}
            echo '<td>'.$this->total.'</td>';
            echo '</table></div>';
        }
    }
    
    public function detallesNB() {
        if(count($this->productos) > 0)
        {
            echo '<div class="row">
                        <table class="table" style="color: #CEF6CE;">
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Total</th>';
            
            foreach ($this->productos as $value) {
                echo '<tr><td>'.($value->nombre).'</td>';
                echo '<td>'.($value->cantidad).'</td>';
                echo '<td>'.($value->precio).'</td>';
                echo '<td>'.($value->precio * $value->cantidad).'</td>';
                
            }
            echo '<tr><td colspan="3">Total:</td>';
            echo '<td>'.$this->total.'</td>';
            echo '</table></div>';
        }
    }
    
    public function calcularTotal()
    {
        $this->total = 0;
            foreach ($this->productos as $value) {
                $this->total = $this->total + ($value->precio * $value->cantidad);
            }
    }
}
