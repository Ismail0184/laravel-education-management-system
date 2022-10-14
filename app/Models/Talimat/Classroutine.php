<?php

namespace App\Models\Talimat;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroutine extends Model
{
    use HasFactory;
   
    public $table = 'classroutine';
    protected $primaryKey = 'id';
      
    protected $fillable = [
        'classes_id',
        'subject_id',
        'dayname_id',
        'ghanta_id',
        'teacher_id',
        'user_id',
    ];

    public function dayname() {
        return $this->belongsTo(Dayname::class);
    }

    public function ghanta() {
        return $this->belongsTo(Ghanta::class);
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

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
