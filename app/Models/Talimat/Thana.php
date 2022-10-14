<?php

namespace App\Models\Talimat;
use App\Models\Users\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thana extends Model
{
    use HasFactory;

    public $table = 'thana';
    protected $primaryKey = 'id';
      
    protected $fillable = [
        'name',
        'district_id',
        'user_id',
    ];

    public function district() {
        return $this->belongsTo(District::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    
    public function union() {
        return $this->hasOne(Union::class);
    }
}
