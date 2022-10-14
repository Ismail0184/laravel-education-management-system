<?php

namespace App\Models\Talimat;
use App\Models\Users\User;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
   
    public $table = 'result';
    protected $primaryKey = 'id';
      
    protected $fillable = [
        'mark',
        'fail',
        'grace_mark',
        'subject_id',
        'classes_id',
        'student_id',
        'examname_id',
        'user_id',
    ];
    
    public function classes() {
        return $this->belongsTo(Classes::class);
    }
    public function subject() {
        return $this->belongsTo(Subject::class);
    }
    public function student() {
        return $this->belongsTo(Admission::class,'student_id');
    }
    public function examname() {
        return $this->belongsTo(Examname::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
