<?php

namespace App\Models\Talimat;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    public $table = 'division';
    protected $primaryKey = 'id';
      
    protected $fillable = [
        'name',
        'user_id',
    ];

    public function classes() {
        return $this->hasOne(Classes::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
