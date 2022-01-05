<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\model_has_roles;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Gate::define('userHasRole', 'App\Http\Controllers\EmployeeController@index');

        Gate::define('agreementAvailable', function(?User $user){
            $checkRole = model_has_roles::where('model_id', '=', $user->id)->get('role_id');
            if(($checkRole[0]->role_id == 1) || ($checkRole[0]->role_id == 4)){
                return Response::allow();
            }
            return Response::deny('У '.$user->name.' нет прав доступа к соглашениям' );
        });
        Gate::define('employeeAvailable', function (User $user){
            $checkRole = model_has_roles::where('model_id', '=', $user->id)->get('role_id');
            if($checkRole[0]->role_id == 1 ){
                return Response::allow();
            }
            return Response::deny('У '.$user->name.' нет прав доступа к сотрудникам' );
        });
        Gate::define('clientsAvailable', function (User $user){
            $checkRole = model_has_roles::where('model_id', '=', $user->id)->get('role_id');
            if($checkRole[0]->role_id == 1 ){
                return Response::allow();
            }
            return Response::deny('У '.$user->name.' нет прав доступа к клиентам' );
        });
    
        Gate::define('contractAvailable', function (User $user){
             $checkRole = model_has_roles::where('model_id', '=', $user->id)->get('role_id');
            if($checkRole[0]->role_id == 1 || $checkRole[0]->role_id == 2 || $checkRole[0]->role_id == 4){
                return Response::allow();
            }
            return Response::deny('У '.$user->name.' нет прав доступа к контрактам' );
        });
        Gate::define('paymentAvailable', function (User $user){
            $checkRole = model_has_roles::where('model_id', '=', $user->id)->get('role_id');
            if($checkRole[0]->role_id == 1 || $checkRole[0]->role_id == 3){
                return Response::allow();
            }
            return Response::deny('У '.$user->name.' нет прав доступа к платежам' );
        });
        Gate::define('voucherAvailable', function (User $user){
            //return ($user->name);
            $checkRole = model_has_roles::where('model_id', '=', $user->id)->get('role_id');
            if($checkRole[0]->role_id == 1 || $checkRole[0]->role_id == 4){
                return Response::allow();
            }
            return Response::deny('У '.$user->name. ' нет прав доступа к ваучерам');
        });
        Gate::define('currencyAvailable', function (User $user){
            $checkRole = model_has_roles::where('model_id', '=', $user->id)->get('role_id');
            if(($checkRole[0]->role_id == 1) || ($checkRole[0]->role_id == 3)){
                return Response::allow();
            }
            return Response::deny('У '.$user->name. ' нет прав доступа к валютам');
        });
        
    }
}
