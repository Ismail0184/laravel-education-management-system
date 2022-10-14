<?php

namespace App\Models\Talimat;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mumtahin extends Model
{
    use HasFactory;
   
    public $table = 'mumtahin';
    protected $primaryKey = 'id';
      
    protected $fillable = [
        
        'teacher_id',
        'classes_id',
        'subject_id',
        'examname_id',
        'nesab',
        'last_date',
        'user_id',
    ];

   public function teacher() {
        return $this->belongsTo(Teacher::class);
    }

    public function classes() {
        return $this->belongsTo(Classes::class);
    }
    public function subject() {
        return $this->belongsTo(Subject::class);
    }
    public function examname() {
        return $this->belongsTo(Examname::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
