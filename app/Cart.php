<?php
namespace App;

use Illuminate\Http\Request;

class Cart{
    public $listproduct = null; 
    public $totalprice = 0;
    public $totalqty = 0; 

    public function __construct($cart){
        if($cart){
            $this->listproduct = $cart->listproduct;
            $this->totalprice = $cart->totalprice;
            $this->totalqty = $cart->totalqty;
        }
    }

    public function AddCart($product , $id){
        $newProduct = ['qty'=> 0 , 'price' => $product->price , 'productInfo' => $product ];
        if($this->listproduct){
            if(array_key_exists($id, $this->listproduct)){
                $newProduct = $this->listproduct[$id];
            }
        }
        $newProduct['qty']++;
        $newProduct['price'] = $newProduct['qty'] * $product->price;
        $this->listproduct[$id] = $newProduct;
        $this->totalprice += $product->price;
        $this->totalqty++;
    }

    public function DeleteItemCart($id){
        $this->totalqty -= $this->listproduct[$id]['qty'];
        $this->totalprice -= $this->listproduct[$id]['price'];
        unset($this->listproduct[$id]);
    }
    
    public function UpdateItemCart($id, $qty){
        $this->totalqty -= $this->listproduct[$id]['qty'];
        $this->totalprice -= $this->listproduct[$id]['price'];

        $this->listproduct[$id]['qty'] = $qty;
        $this->listproduct[$id]['price'] = $qty * $this->listproduct[$id]['productInfo']->price;
        
        $this->totalqty += $this->listproduct[$id]['qty'];
        $this->totalprice += $this->listproduct[$id]['price'];
    }
}
?>