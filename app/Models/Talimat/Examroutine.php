<?php

namespace App\Models\Talimat;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examroutine extends Model
{
    use HasFactory;
   
    public $table = 'examroutine';
    protected $primaryKey = 'id';
    protected $dates = ['exam_date'];
      
    protected $fillable = [
        
        'exam_date',
        'classes_id',
        'subject_id',
        'dayname_id',
        'daypart_id',
        'examname_id',
        'user_id',
    ];

    public function dayname() {
        return $this->belongsTo(Dayname::class);
    }

    public function daypart() {
        return $this->belongsTo(Daypart::class);
    }
    public function subject() {
        return $this->belongsTo(Subject::class);
    }

    public function classes() {
        return $this->belongsTo(Classes::class);
    }

    public function examname() {
        return $this->belongsTo(Examname::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
