<?php

namespace App\Models\Account;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    use HasFactory;

    public $table = 'month';
    protected $primaryKey = 'id';
      
    protected $fillable = [
        'name',
        'days',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
