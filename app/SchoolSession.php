<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class SchoolSession extends Model
{
    use SoftDeletes;
    use LogsActivity;
    protected $table = 'school_sessions';
    protected $primaryKey = 'session_id';
    protected $fillable = [
        'session_name',
    ];

    protected static $logAttributes = ['session_name'];

    public function getSessionNameAttribute($value){
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

    public function setSessionNameAttribute($value){
        return $this->attributes['session_name'] = ucwords($value);

    }

    public function excos(){
        return $this->hasMany('App\Excos', 'exco_id', 'unit_id');
    }
}
