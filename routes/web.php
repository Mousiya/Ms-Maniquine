<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\CustomerHomeComponent;
use App\Http\Livewire\Admin\AdminHomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\OurserviceComponent;
use App\Http\Livewire\OurworksComponent;
use App\Http\Livewire\AboutusComponent;
use App\Http\Livewire\ContactusComponent;
use App\Http\Livewire\Admin\Category\AdminCategoryComponent;
use App\Http\Livewire\Admin\Product\AdminProductComponent;
use App\Http\Livewire\Admin\Works\AdminWorkComponent;
use App\Http\Livewire\Admin\Service\AdminServiceComponent;
use App\Http\Livewire\Admin\Category\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\Category\AdminEditCategoryComponent;
//use App\Http\Livewire\Admin\Product\AdminAddProductComponent;
//use App\Http\Livewire\Admin\Works\AdminAddWorksComponent;
//use App\Http\Livewire\Admin\Service\AdminAddServiceComponent;
//use App\Http\Livewire\Admin\Product\AdminEditProductComponent;



















































































































































































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
Route::get('/admin-home-component',AdminHomeComponent::class);

//Route::get('/product',[HomeController::class,'product']);

Route::get('/CustomerHome',[HomeController::class,'dashboard']);

Route::get('/shop',ShopComponent::class);
Route::get('/cart',CartComponent::class);
Route::get('/checkout',CheckoutComponent::class);
Route::get('/ourservice',OurserviceComponent::class);
Route::get('/ourworks',OurworksComponent::class);
Route::get('/contactus',ContactusComponent::class);
Route::get('/aboutus',AboutusComponent::class);
Route::get('/admin/categories',AdminCategoryComponent::class)->name('admin.categories');
Route::get('/admin/products',AdminProductComponent::class)->name('admin.products');
Route::get('/admin/ourworks',AdminWorkComponent::class)->name('admin.ourworks');
Route::get('/admin/ourservices',AdminServiceComponent::class)->name('admin.ourservices');
Route::get('/admin/categories/addcategories',AdminAddCategoryComponent::class)->name('admin.addcategories');
//Route::get('/admin/categories/editcategories/{category_slug}',AdminEditCategoryComponent::class)->name('admin.editcategories');
//Route::get('/admin/product/editproduct/{product_slug}',AdminEditProductComponent::class)->name('admin.editproducts');