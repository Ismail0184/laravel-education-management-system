<?php

namespace App\Models;
use App\Models\Ghanta;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Madrasha extends Model
{
    use HasFactory;

    public $table = 'madrasha';
    protected $primaryKey = 'id';
      
    protected $fillable = [
        'name',
        'address',
        'mobile',
        'email',
        'website',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
