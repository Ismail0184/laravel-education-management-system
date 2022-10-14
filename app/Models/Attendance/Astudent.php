<?php

namespace App\Models\Attendance;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Astudent extends Model
{
    use HasFactory;
   
    public $table = 'astudent';
    protected $primaryKey = 'id';

    protected $dates = ['adate'];
      
    protected $fillable = [
        'admission_id',
        'atype_id',
        'amethod_id',
        'adate',
        'time_in',
        'time_out',
        'note',
        'user_id',
    ];
    
    public function student() {
        return $this->belongsTo(Admission::class, 'admission_id');
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
