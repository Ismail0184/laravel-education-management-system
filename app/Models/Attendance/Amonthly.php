<?php

namespace App\Models\Attendance;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amonthly extends Model
{
    use HasFactory;
   
    public $table = 'amonthly';
    protected $primaryKey = 'id';
    
    protected $dates = ['adate'];
      
    protected $fillable = [
        'teacher_id',
        'adate',
        'presence',
        'absence',
        'weekend',
        'leave',
        'holiday',
        'month_id',
        'year_id',
        'user_id',
    ];
    
    public function teacher() {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    public function month() {
        return $this->belongsTo(Month::class, 'month_id');
    }
    public function year() {
        return $this->belongsTo(Year::class, 'year_id');
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
