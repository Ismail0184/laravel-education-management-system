<?php

namespace App\Models\Talimat;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daypart extends Model
{
    use HasFactory;

    public $table = 'daypart';
    protected $primaryKey = 'id';
      
    protected $fillable = [
        'name',
        'user_id',
    ];
    
    public function classroutine() {
        return $this->hasOne(Classroutine::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
