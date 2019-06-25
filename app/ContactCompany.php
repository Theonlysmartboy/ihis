<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ContactCompany
 *
 * @package App
 * @property string $name
 * @property string $address
 * @property string $website
 * @property string $email
 * @property string $zone_id
*/
class ContactCompany extends Model
{
    protected $fillable = ['name', 'address', 'website', 'email', 'zone_id'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        ContactCompany::observe(new \App\Observers\UserActionsObserver);
    }
    
}
