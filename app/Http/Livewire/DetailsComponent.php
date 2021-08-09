<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
    public $slug;

    public function store($productId, $productName, $productPrice)
    {
        Cart::add($productId,$productName,1,$productPrice)->associate('App\Models\Product');
        session()->flash('success_message','Item add in cart');
        return redirect()->route('product.cart');
    }

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $popularProducts = Product::inRandomOrder()->limit(4)->get();
        $relatedProducts = Product::where('category_id', $product->cateogry_id)->inRandomOrder()->limit(5)->get();

        return view('livewire.details-component',
            [
                'product' => $product,
                'popularProducts' => $popularProducts,
                'relatedProducts ' => $relatedProducts
            ]
        )->layout('layouts.base');
    }
}
