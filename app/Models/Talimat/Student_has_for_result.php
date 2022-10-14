<?php

namespace App\Models\Talimat;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_has_for_result extends Model
{
    use HasFactory;

    public $table = 'student_has_for_result';
    protected $primaryKey = 'id';
      
    protected $fillable = [
        'admission_id',
        'user_id',
    ];

    public function admission() {
        return $this->belongsTo(Admission::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }

}
