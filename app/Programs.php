<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class Programs extends Model
{
    use SoftDeletes;
    use LogsActivity;
    protected $table = 'programs';
    protected $primaryKey = 'program_id';
    protected $fillable = [
        'program_name', 'ministers', 'program_category_id', 'program_date', 'start_time', 'end_time'
    ];

    protected static $logAttributes = ['program_name', 'ministers', 'program_category_name', 'program_date'];

    public function setStartTimeAttribute($value){
        return $this->attributes['start_time'] = ($value);

    }
    public function getStartTimeAttribute($value){
        return ($value);
    }
    public function setEndTimeAttribute($value){
        return $this->attributes['end_time'] = ($value);

    }
    public function getEndTimeAttribute($value){
        return ($value);
    }
    public function setProgramDateAttribute($value){
        return $this->attributes['program_date'] = ucwords($value);

    }
    public function getProgramDateAttribute($value){
        return ucwords($value);
    }
    public function setMinistersAttribute($value){
        return $this->attributes['ministers'] = ucwords($value);

    }
    public function getMinistersAttribute($value){
        return ucwords($value);
    }

    public function setProgramNameAttribute($value){
        return $this->attributes['program_name'] = ucwords($value);

    }
    public function getProgramNameAttribute($value){
        return ucwords($value);
    }
    public function getProgramCategoryIdAttribute($value){
        return ($value);
    }
    public function setProgramCategoryIdAttribute($value){
        return $this->attributes['program_category_id'] = ($value);

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

    public function category(){
        return $this->belongsTo('App\ProgramCatrgories', 'program_id', 'program_category_id');
    }

    


}
