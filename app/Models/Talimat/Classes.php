<?php

namespace App\Models\Talimat;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    public $table = 'classes';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'total_mark',
        'mumtaj',
        'jjiddan',
        'jayeed',
        'mokbul',
        'division_id',
        'user_id',
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
        public function subject() {
        return $this->hasOne(Subject::class);
    }

    public function result() {
        return $this->hasOne(Result::class);
    }
    public function admissionfee() {
        return $this->hasOne(Admissionfee::class);
    }
    public function examfee() {
        return $this->hasOne(Examfee::class);
    }

    public function classroutine() {
        return $this->hasOne(Classroutine::class);
    }

    public function division() {
        return $this->belongsTo(Division::class);
    }
}
