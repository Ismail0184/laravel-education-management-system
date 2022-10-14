<?php

namespace App\Models\Talimat;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    
    public $table = 'subject';
    protected $primaryKey = 'id';
      
    protected $fillable = [
        'name',
        'total_mark',
        'fail_mark',
        'grace_mark',
        'classes_id',
        'user_id'
    ];

    public function classes() {
        return $this->belongsTo(Classes::class,'classes_id');
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
