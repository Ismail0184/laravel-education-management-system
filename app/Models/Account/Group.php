<?php

namespace App\Models\Account;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public $table = 'group';
    protected $primaryKey = 'id';
      
    protected $fillable = [
        'name',
        'maingroup',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
