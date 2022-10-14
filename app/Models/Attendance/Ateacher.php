<?php

namespace App\Models\Attendance;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ateacher extends Model
{
    use HasFactory;
   
    public $table = 'ateacher';
    protected $primaryKey = 'id';

    protected $dates = ['adate'];
      
    protected $fillable = [
        'teacher_id',
        'atype_id',
        'amethod_id',
        'adate',
        'time_in',
        'time_out',
        'note',
        'user_id',
    ];
    
    public function teacher() {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    public function amethod() {
        return $this->belongsTo(Amethod::class, 'amethod_id');
    }
    public function atype() {
        return $this->belongsTo(Atype::class, 'atype_id');
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
