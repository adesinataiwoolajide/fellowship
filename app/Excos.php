<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class Excos extends Model
{
    use SoftDeletes;
    use LogsActivity;
    protected $table = 'excos';
    protected $primaryKey = 'exco_id';
    protected $fillable = [
        'passport','surname', 'other_names', 'email', 'phone_number', 'dept', 
        'faculty', 'unit_id', 'session_id', 'position_id', 'status', 'category', 'dob'
    ];
    protected static $logAttributes = ['surname', 'email', 'position_id'];

    public function getPassportAttribute($value){
        return strtolower($value);
    }

    public function setPassportAttribute($value){
        return $this->attributes['passport'] = strtolower($value);
    }

    public function getCategoryAttribute($value){
        return ucwords($value);
    }

    public function setCategoryAttribute($value){
        return $this->attributes['category'] = ucwords($value);
    }

    public function getDobAttribute($value){
        return ($value);
    }

    public function setDobAttribute($value){
        return $this->attributes['dob'] = ($value);
    }

    public function getStatusAttribute($value){
        return ($value);
    }

    public function setStatusAttribute($value){
        return $this->attributes['status'] = ($value);
    }

    public function getPositionIdAttribute($value){
        return ucwords($value);
    }

    public function setPositionIdAttribute($value){
        return $this->attributes['position_id'] = ($value);
    }
    public function getSessionIdAttribute($value){
        return ($value);
    }

    public function setSessionIdAttribute($value){
        return $this->attributes['session_id'] = ($value);
    }

    public function getUnitIdAttribute($value){
        return ($value);
    }

    public function setUnitIdAttribute($value){
        return $this->attributes['unit_id'] = ($value);
    }

    public function getFacultyAttribute($value){
        return ucwords($value);
    }

    public function seFacultyAttribute($value){
        return $this->attributes['faculty'] = ucwords($value);
    }

    public function getDeptAttribute($value){
        return ucwords($value);
    }

    public function setDeptAttribute($value){
        return $this->attributes['dept'] = ucwords($value);
    }

    public function getPhoneNumberAttribute($value){
        return ($value);
    }

    public function setPhoneNumberAttribute($value){
        return $this->attributes['phone_number'] = ($value);
    }
    public function getEmailAttribute($value){
        return ($value);
    }

    public function setEmailAttribute($value){
        return $this->attributes['email'] = ($value);
    }
    public function getOtherNamesAttribute($value){
        return ucwords($value);
    }

    public function setOtherNamesAttribute($value){
        return $this->attributes['other_names'] = ucwords($value);
    }

    public function getSurnameAttribute($value){
        return ucwords($value);
    }

    public function setSurnameAttribute($value){
        return $this->attributes['surname'] = ucwords($value);
    }

    public function getCreatedAtAttribute($value){
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

    public function getDeletedAtAttribute($value){
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

    public function getUpdatedAtAttribute($value){
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

    public function position(){
        return $this->belongsTo('App\Position','position_id');
    }

    public function unit(){
        return $this->belongsTo('App\Unit','unit_id');
    }

    public function session(){
        return $this->belongsTo('App\SchoolSession','session_id');
    }

}
