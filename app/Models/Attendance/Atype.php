<?php

namespace App\Models\Attendance;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atype extends Model
{
    use HasFactory;

    public $table = 'atype';
    protected $primaryKey = 'id';
      
    protected $fillable = [
        'name',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
