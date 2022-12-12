<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\CustomerHomeComponent;
use App\Http\Livewire\Admin\AdminHomeComponent;

use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\Shop\DressCategoryComponent;
use App\Http\Livewire\Shop\DressDetailComponent;
use App\Http\Livewire\Shop\SearchComponent;

use App\Http\Livewire\CartComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\OurserviceComponent;

use App\Http\Livewire\OurworksComponent;
use App\Http\Livewire\Work\WorkCategoryComponent;

use App\Http\Livewire\AboutusComponent;
use App\Http\Livewire\ContactusComponent;



use App\Http\Livewire\Admin\Category\AdminCategoryComponent;
use App\Http\Livewire\Admin\Category\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\Category\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\Category\AdminViewCategoryComponent;

use App\Http\Livewire\Admin\Service\AdminServiceComponent;
use App\Http\Livewire\Admin\Service\AdminAddServiceComponent;
use App\Http\Livewire\Admin\Service\AdminEditServiceComponent;
use App\Http\Livewire\Admin\Service\AdminViewServiceComponent;

use App\Http\Livewire\Admin\Product\AdminProductComponent;
use App\Http\Livewire\Admin\Product\AdminAddNewProductComponent;
use App\Http\Livewire\Admin\Product\AdminAddProductComponent;
use App\Http\Livewire\Admin\Product\ProductAddDetailComponent;
use App\Http\Livewire\Admin\Product\AdminEditProductComponent;

use App\Http\Livewire\Admin\Product\Colour\AdminColourComponent;
use App\Http\Livewire\Admin\Product\Colour\AdminAddColourComponent;
use App\Http\Livewire\Admin\Product\Colour\AdminEditColourComponent;

use App\Http\Livewire\Admin\Product\Size\AdminSizeComponent;
use App\Http\Livewire\Admin\Product\Size\AdminAddSizeComponent;
use App\Http\Livewire\Admin\Product\Size\AdminEditSizeComponent;

use App\Http\Livewire\Admin\Works\AdminWorkComponent;
use App\Http\Livewire\Admin\Works\AdminAddWorksComponent;
use App\Http\Livewire\Admin\Works\AdminEditWorksComponent;

use App\Http\Livewire\Admin\Order\AdminOrderComponent;
use App\Http\Livewire\Admin\Order\AdminOrderDetailsComponent;
//use App\Http\Livewire\Admin\Order\AdminEditOrderComponent;

use App\Http\Livewire\Admin\Homeslide\AdminHomeSlideComponent;
use App\Http\Livewire\Admin\Homeslide\AdminAddHomeSlideComponent;
use App\Http\Livewire\Admin\Homeslide\AdminEditHomeSlideComponent;
use App\Http\Livewire\Admin\Homecategory\AdminHomeCategoryComponent;

use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\Admin\Coupon\AdminCouponsComponent;
use App\Http\Livewire\Admin\Coupon\AdminAddCouponComponent;
use App\Http\Livewire\Admin\Coupon\AdminEditCouponComponent;

use App\Http\Livewire\Admin\UserReviewComponent;
use App\Http\Livewire\Admin\CustomerDetailComponent;

use Illuminate\Support\Facades\Auth;

use App\Http\Livewire\Customer\Dashboard\CustomerDashboardComponent;
use App\Http\Livewire\Customer\Dashboard\CustomerProfileComponent;
use App\Http\Livewire\Customer\Dashboard\CustomerEditProfileComponent;
use App\Http\Livewire\Customer\Dashboard\CustomerOrdersComponent;
use App\Http\Livewire\Customer\Dashboard\CustomerOrderdetailsComponent;
use App\Http\Livewire\Customer\Dashboard\CustomerPaymentComponent;
use App\Http\Livewire\Customer\Dashboard\CustomerWishlistComponent;
use App\Http\Livewire\Customer\Dashboard\CustomerReviewComponent;






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

//for User
Route::middleware(['auth:sanctum','verified'])->group(function(){

});

//for Admin
Route::middleware(['auth:sanctum','verified'])->group(function(){

});



Route::get('/redirect',[HomeController::class,'redirect']);

Route::get('/',[HomeController::class,'index']);

Route::get('/logout',[HomeController::class,'logout']);

Route::get('/customer-home-component',CustomerHomeComponent::class)->name('customer.dashboard');
Route::get('/admin-home-component',AdminHomeComponent::class)->name('admin.dashboard');
Route::get('/CustomerHome',[HomeController::class,'dashboard']);

Route::get('/shop',ShopComponent::class)->name('dress.shop');
Route::get('/dress-category/{category_id}',DressCategoryComponent::class)->name('dress.categories');

Route::get('/dress/{dress_id}',DressDetailComponent::class)->name('dress.details');
Route::get('/search',SearchComponent::class)->name('dress.search');

Route::get('/cart',CartComponent::class)->name('dress.cart');
Route::get('/wishlist',WishlistComponent::class)->name('dress.wishlist');

Route::get('/checkout',CheckoutComponent::class)->name('checkout');

Route::get('/thankyou',ThankyouComponent::class)->name('thankyou');

Route::get('/ourservice',OurserviceComponent::class)->name('user.ourservices');

Route::get('/ourworks',OurworksComponent::class);
Route::get('/work-category/{category_id}',WorkCategoryComponent::class)->name('work.categories');

Route::get('/contact-us',ContactusComponent::class)->name('work.contact');
Route::get('/aboutus',AboutusComponent::class);
Route::get('/admin/categories',AdminCategoryComponent::class)->name('admin.categories');
Route::post('/admin/categories',AdminCategoryComponent::class)->name('admin.categories');
Route::get('/admin/products',AdminProductComponent::class)->name('admin.products');

Route::get('/admin/categories/add',AdminAddCategoryComponent::class)->name('admin.addcategories');
Route::get('/admin/categories/edit/{category_id}',AdminEditCategoryComponent::class)->name('admin.editcategories');

Route::get('/admin/ourservices',AdminServiceComponent::class)->name('admin.ourservices');
Route::get('/admin/ourservices/add',AdminAddServiceComponent::class)->name('admin.addourservices');
Route::get('/admin/ourservices/edit/{category_id}',AdminEditServiceComponent::class)->name('admin.editourservices');

Route::get('/admin/products/add',AdminAddProductComponent::class)->name('admin.addproducts');
Route::get('/admin/products/addnew',AdminAddNewProductComponent::class)->name('admin.addnewproducts');
Route::get('/admin/product/editproduct/{dress_id}',AdminEditProductComponent::class)->name('admin.editproducts');

Route::get('/admin/product/colour',AdminColourComponent::class)->name('admin.colours');
Route::get('/admin/product/colour/add',AdminAddColourComponent::class)->name('admin.addcolours');
Route::get('/admin/product/colour/edit/{color_id}',AdminEditColourComponent::class)->name('admin.editcolours');

Route::get('/admin/product/size',AdminSizeComponent::class)->name('admin.sizes');
Route::get('/admin/product/size/add',AdminAddSizeComponent::class)->name('admin.addsizes');
Route::get('/admin/product/size/edit/{size_id}',AdminEditSizeComponent::class)->name('admin.editsizes');

Route::get('/admin/customer-reviews',UserReviewComponent::class)->name('admin.reviews');

Route::get('/admin/customer-details',CustomerDetailComponent::class)->name('admin.customers');


Route::get('/admin/ourworks',AdminWorkComponent::class)->name('admin.ourworks');
Route::get('/admin/ourworks/add',AdminAddWorksComponent::class)->name('admin.addourworks');
Route::get('/admin/work/editwork/{work_id}',AdminEditWorksComponent::class)->name('admin.editworks');

Route::get('/admin/orders',AdminOrderComponent::class)->name('admin.orders');
Route::get('/admin/order/{order_id}',AdminOrderDetailsComponent::class)->name('admin.orderdetail');

Route::get('/admin/home-sliders',AdminHomeSlideComponent::class)->name('admin.homesliders');
Route::get('/admin/home-sliders/add',AdminAddHomeSlideComponent::class)->name('admin.addhomesliders');
Route::get('/admin/home-sliders/edit/{slide_id}',AdminEditHomeSlideComponent::class)->name('admin.edithomesliders');

Route::get('/admin/Manage-home-categories',AdminHomeCategoryComponent::class)->name('admin.homecategories');
Route::get('/admin/sale',AdminSaleComponent::class)->name('admin.sale');

Route::get('/admin/coupons',AdminCouponsComponent::class)->name('admin.coupons');
Route::get('/admin/coupons/add',AdminAddCouponComponent::class)->name('admin.addcoupon');
Route::get('/admin/coupons/edit/{coupon_id}',AdminEditCouponComponent::class)->name('admin.editcoupon');


Route::get('/customer/dashboard',CustomerDashboardComponent::class)->name('customer.dashboard');
Route::get('/customer/myprofile',CustomerProfileComponent::class)->name('customer.myprofile');
Route::get('/customer/editprofile',CustomerEditProfileComponent::class)->name('customer.editprofile');
Route::get('/customer/myorders',CustomerOrdersComponent::class)->name('customer.myorders');
Route::get('/customer/orders/{order_id}',CustomerOrderdetailsComponent::class)->name('customer.orderdetails');
Route::get('/customer/mypayment',CustomerPaymentComponent::class)->name('customer.mypayment');
Route::get('/customer/mywishlist',CustomerWishlistComponent::class)->name('customer.mywishlist');
Route::get('/customer/myreview/{order_item_id}',CustomerReviewComponent::class)->name('customer.myreviews');

