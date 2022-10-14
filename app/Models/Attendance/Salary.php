<?php

namespace App\Models\Attendance;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\Admission;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
   
    public $table = 'salary';
    protected $primaryKey = 'id';
      
    protected $fillable = [
        'teacher_id',
        'sdate',
        'days',
        'payable_days',
        'basic',
        'house_rent',
        'transport',
        'medical',
        'loan',
        'charge',
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
