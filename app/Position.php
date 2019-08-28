<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class Position extends Model
{
    use SoftDeletes;
    use LogsActivity;
    protected $table = 'positions';
    protected $primaryKey = 'position_id';
    protected $fillable = [
        'position_name',
    ];

    protected static $logAttributes = ['position_name'];

    public function getPositionNameAttribute($value){
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
        return $this->attributes['position_name'] = ucwords($value);

    }

    public function excos(){
        return $this->hasMany('App\Excos', 'exco_id', 'position_id');
    }

}
