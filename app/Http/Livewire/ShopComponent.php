<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{
    public function store($productId, $productName, $productPrice)
    {
        Cart::add($productId,$productName,1,$productPrice)->associate('App\Models\Product');
        session()->flash('success_message','Item add in cart');
        return redirect()->route('product.cart');
    }

    use WithPagination;

    public function render()
    {
        $products = Product::paginate(12);
        return view('livewire.shop-component', ['products' => $products])->layout('layouts.base');
    }
}
