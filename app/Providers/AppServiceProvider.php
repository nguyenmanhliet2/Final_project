<?php

namespace App\Providers;

use App\Models\Category;
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
        $menuMain = Category::where('id_category_root', 0)->where('is_open', 1)->get();
        $menuMini = Category::where('id_category_root', '<>', 0)
                                 ->where('is_open', 1)
                                 ->get();
        foreach($menuMain as $key => $value_cha) {
            $value_cha->tmp = $value_cha->id;
            foreach($menuMini as $key => $value_con) {
                if($value_con->id_danh_muc_cha == $value_cha->id) {
                    $value_cha->tmp =  $value_cha->tmp . ', ' . $value_con->id;
                }
            }
        }
        view()->share('menuMain', $menuMain);
        view()->share('menuMini', $menuMini);
    }
}
