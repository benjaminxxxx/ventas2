<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Fortify;
use Auth;

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
        
        $this->registerPolicies();

        //
        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('dni', $request->dni)->first();
            if($user!=null){
                if($user->estado=='0'){
                    //Auth::logout();
                    redirect()->route('login')->with('status', 'Usuario bloqueado');
                    return;
                }
            }else{
                redirect()->route('login')->with('status', 'Usuario no existe');
                return;
            }
            
            //dd(Auth::user());
            if ($user &&
                Hash::check($request->password, $user->password)) {
                return $user;
            }
        });
    }
}
