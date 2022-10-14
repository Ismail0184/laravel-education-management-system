<?php

namespace App\Models\Account;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;

    public $table = 'year';
    protected $primaryKey = 'id';
      
    protected $fillable = [
        'year',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
