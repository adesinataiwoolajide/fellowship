<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class Messages extends Model
{
    
    use SoftDeletes;
    use LogsActivity;
    protected $table = 'messages';
    protected $primaryKey = 'message_id';
    protected $fillable = [
        'title', 'preacher', 'bible_verses', 'content', 'message_link', 'program_category_id'
    ];

    protected static $logAttributes = ['title', 'preacher', 'program_category_id'];

    public function getProgramCategoryIdAttribute($value){
        return ($value);
    }
    public function setProgramCategoryIdAttribute($value){
        return $this->attributes['program_category_id'] = ($value);

    }
    public function getMessageLinkAttribute($value){
        return ($value);
    }

    public function setMessageLinkAttribute($value){
        return $this->attributes['message_link'] = ($value);

    }

    public function getContentAttribute($value){
        return ucwords($value);
    }

    public function setContentAttribute($value){
        return $this->attributes['content'] = ucwords($value);

    }

    public function getBibleVersesAttribute($value){
        return ucwords($value);
    }

    public function setBibleVersesAttribute($value){
        return $this->attributes['bible_verses'] = ucwords($value);

    }

    public function getPreacherAttribute($value){
        return ucwords($value);
    }

    public function setPreacherAttribute($value){
        return $this->attributes['preacher'] = ucwords($value);

    }
    public function getTitleAttribute($value){
        return ucwords($value);
    }

    public function setTitleAttribute($value){
        return $this->attributes['title'] = ucwords($value);

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
        return $this->belongsTo('App\ProgramCatrgories', 'message_id', 'program_category_id');
    }
}
