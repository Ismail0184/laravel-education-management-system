<?php

namespace App\Models\Talimat;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exambenchside extends Model
{
    use HasFactory;

    public $table = 'exambenchside';
    protected $primaryKey = 'id';
      
    protected $fillable = [
        'name',
        'user_id',
    ];

    public function siteplan() {
        return $this->hasOne(Siteplan::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
