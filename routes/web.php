<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\CustomerHomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\OurserviceComponent;
use App\Http\Livewire\OurworksComponent;
use App\Http\Livewire\AboutusComponent;
use App\Http\Livewire\ContactusComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::get('/redirect',[HomeController::class,'redirect']);

Route::get('/',[HomeController::class,'index']);

Route::get('/logout',[HomeController::class,'logout']);

Route::get('/customer-home-component',CustomerHomeComponent::class);

//Route::get('/product',[HomeController::class,'product']);

Route::get('/CustomerHome',[HomeController::class,'dashboard']);

Route::get('/shop',ShopComponent::class);
Route::get('/cart',CartComponent::class);
Route::get('/checkout',CheckoutComponent::class);
Route::get('/ourservice',OurserviceComponent::class);
Route::get('/ourworks',OurworksComponent::class);
Route::get('/contactus',ContactusComponent::class);
Route::get('/aboutus',AboutusComponent::class);
