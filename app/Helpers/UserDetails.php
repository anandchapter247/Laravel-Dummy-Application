<?php 
namespace App\Helpers;

class UserDetails
{
    public function getUserDetails()
    {
        return auth()->user();
    }
}
?>