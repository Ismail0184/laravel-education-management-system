<?php

namespace App\Models\Talimat;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Union extends Model
{
    use HasFactory;

    public $table = 'union';
    protected $primaryKey = 'id';
      
    protected $fillable = [
        'name',
        'thana_id',
        'user_id',
    ];

    public function thana() {
        return $this->belongsTo(Thana::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    
}
