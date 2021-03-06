<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contact
 *
 * @package App
 * @property string $company
 * @property string $first_name
 * @property string $phone1
 * @property string $phone2
 * @property string $email
 * @property string $skype
 * @property string $address
 * @property string $hospital_id
 * @property string $hospital_level
*/
class Contact extends Model
{
    protected $fillable = ['first_name', 'phone1', 'phone2', 'email', 'skype', 'address', 'hospital_id', 'hospital_level', 'company_id'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Contact::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCompanyIdAttribute($input)
    {
        $this->attributes['company_id'] = $input ? $input : null;
    }
    
    public function company()
    {
        return $this->belongsTo(ContactCompany::class, 'company_id');
    }
    
}
