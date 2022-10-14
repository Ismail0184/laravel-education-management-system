<?php

namespace App\Models\Talimat;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negran extends Model
{
    use HasFactory;
   
    public $table = 'negran';
    protected $primaryKey = 'id';
      
    protected $fillable = [
        
        'teacher_id',
        'classes_id',
        'branch_id',
        'room_id',
        'user_id',
    ];

   public function teacher() {
        return $this->belongsTo(Teacher::class);
    }

    public function classes() {
        return $this->belongsTo(Classes::class);
    }
    public function branch() {
        return $this->belongsTo(Branch::class);
    }
    public function room() {
        return $this->belongsTo(Room::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
