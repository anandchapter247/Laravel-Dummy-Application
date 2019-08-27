<?php 

namespace App\Facade;

use Illuminate\Support\Facades\Facade;

class UserDetailsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'UserDetails';
    }
}
?>