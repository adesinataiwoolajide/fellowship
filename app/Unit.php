<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class Unit extends Model
{
    use SoftDeletes;
    use LogsActivity;
    protected $table = 'units';
    protected $primaryKey = 'unit_id';
    protected $fillable = [
        'unit_name',
    ];

    protected static $logAttributes = ['unit_name'];

    public function getUnitNameAttribute($value){
        return ucwords($value);
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

    public function setUnitNameAttribute($value){
        return $this->attributes['unit_name'] = ucwords($value);

    }

    public function excos(){
        return $this->hasMany('App\Excos', 'exco_id', 'unit_id');
    }
}
