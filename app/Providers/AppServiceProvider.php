<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\OrderDetail;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $listBill = OrderDetail::join('products', 'order_details.product_id', 'products.id')
                                     ->where('cart_status', 1)
                                     ->select('order_details.*', 'products.image_product', 'products.sales_price_product')
                                     ->get();
        $menuMain = Category::where('id_category_root', 0)->where('is_open', 1)->get();
        $menuMini = Category::where('id_category_root', '<>', 0)->where('is_open', 1)->get();
        foreach ($listBill as $key => $value_bill) {
            $value_bill->tmp = $value_bill->id;
        }
        foreach ($menuMain as $key => $value_cha) {
            $value_cha->tmp = $value_cha->id;
            foreach ($menuMini as $key => $value_con) {
                if ($value_con->id_danh_muc_cha == $value_cha->id) {
                    $value_cha->tmp =  $value_cha->tmp . ', ' . $value_con->id;
                }
            }
        }
        view()->share('menuMain', $menuMain);
        view()->share('menuMini', $menuMini);
        view()->share('listBill', $listBill);
    }
}
