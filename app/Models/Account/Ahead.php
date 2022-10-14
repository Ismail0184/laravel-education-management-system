<?php

namespace App\Models\Account;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ahead extends Model
{
    use HasFactory;

    public $table = 'ahead';
    protected $primaryKey = 'id';
      
    protected $fillable = [
        'name',
        'group_id',
        'user_id',
    ];

    public function group() {
        return $this->belongsTo(Group::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    
}
