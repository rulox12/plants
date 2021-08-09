<?php

use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeComponent::class);
Route::get('/shop', ShopComponent::class);
Route::get('/cart', CartComponent::class)->name('product.cart');
Route::get('/checkout', CheckoutComponent::class);
Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');

//For user
Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::get('user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});

//For admin
Route::middleware(['auth:sanctum', 'verified', 'auth.admin'])->group(function (){
    Route::get('admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
});

