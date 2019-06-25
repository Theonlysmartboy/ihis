<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Patient
 *
 * @package App
 * @property string $huduma_no
 * @property string $name
 * @property string $conatct
 * @property string $zone
 * @property string $hospital
*/
class Patient extends Model
{
    use SoftDeletes;

    protected $fillable = ['huduma_no', 'name', 'conatct', 'zone_id', 'hospital_id'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Patient::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setZoneIdAttribute($input)
    {
        $this->attributes['zone_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setHospitalIdAttribute($input)
    {
        $this->attributes['hospital_id'] = $input ? $input : null;
    }
    
    public function zone()
    {
        return $this->belongsTo(ContactCompany::class, 'zone_id');
    }
    
    public function hospital()
    {
        return $this->belongsTo(Contact::class, 'hospital_id');
    }
    
}
