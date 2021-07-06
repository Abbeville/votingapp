<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Blade;
use DB;

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
        Schema::defaultStringLength(191);
        Blade::if('can', function ($permission, $user) {
            $userPermissions = $user->getAllPermissions()->pluck('name')->toArray();
            return in_array($permission, $userPermissions);
        });

        Blade::if('role', function ($role) {
            $user = auth()->user();
            return $user->hasRole($role);
        });

        Blade::directive('mon', function ($money) {
            return "<?php echo '₦ ' . number_format($money, 2); ?>";
        });

        Blade::if('directEntryMissPayment', function () {
            $user = auth()->user();
            $userTotalTransaction = $user->transactions()->where('status', 'success')->sum('amount');
            $matric = $user->matric;
            $sub_matric = substr($matric, 0, 4);

            if ($sub_matric == '2019') {
                return $userTotalTransaction < 2650 ? true : false;
            }

            return false;
        });

        Blade::if('hasVoted', function($contestant){
            //Check if the auth user has voted for this contestant
            $count = auth()->user()->votes()->where('contestant_id', $contestant->id)->count();

            if ($count > 0) {
                return true;
            }

            return false;
        });

        /*config([
            'global' => DB::table('settings')->get()
                    ->keyBy('key')
                    ->transform(function ($setting) {
                        return $setting->value;
                    })->toArray()
        ]);*/
    }
}
