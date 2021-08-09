<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        Cart::update($rowId, $product->qty + 1);
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        Cart::update($rowId, $product->qty - 1);
    }

    public function destroy($rowId)
    {
        $product = Cart::remove($rowId);
        session()->flash('success_message' , 'Item has been removed');
    }


    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
