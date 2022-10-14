<?php

namespace App\Models\Talimat;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
   
    public $table = 'room';
    protected $primaryKey = 'id';
      
    protected $fillable = [
        'name',
        'building_id',
        'branch_id',
        'classes_id',
        'teacher_id',
        'user_id'
    ];

    public function building() {
        return $this->belongsTo(Building::class);
    }
    public function branch() {
        return $this->belongsTo(Branch::class);
    }
    public function classes() {
        return $this->belongsTo(Classes::class);
    }
    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }

}
