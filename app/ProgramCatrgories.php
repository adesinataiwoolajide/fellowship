<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class ProgramCatrgories extends Model
{
    use SoftDeletes;
    use LogsActivity;
    protected $table = 'program_categories';
    protected $primaryKey = 'program_category_id';
    protected $fillable = [
        'program_category_name',
    ];

    protected static $logAttributes = ['program_category_name'];

    public function getProgramCategoryNameAttribute($value){
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

    public function setProgramCategoryNameAttribute($value){
        return $this->attributes['program_category_name'] = ucwords($value);

    }

    public function program(){
        return $this->hasMany('App\Programs','program_id');
    }

    public function message(){
        return $this->hasMany('App\Messages','message_id');
    }

}
